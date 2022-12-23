<?php

namespace App\Http\Livewire\Deals;

use App\Models\Deal;
use App\Models\Funnel;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    public Deal $deal;       
    public $editModeEnabled = false;    
    public $selectedTab;
    public $selectedFunnelId;    
    public $selectedStage;

    public $successStageIndex = 254;
    public $failStageIndex = 255;

    protected $rules = [        
        'deal.title' => ['required', 'max:255'],        
        'deal.amount' => ['required', 'min:0', 'max:99999999.99'],
        'deal.staff_id' => ['required', 'exists:'.Staff::class.',id'],
    ];
    protected $listeners = [        
        'tabSelected',
        'editModeToggle',
        'refreshParent' => '$refresh',
    ];

    public function getFunnelProperty()
    {
        return Funnel::find($this->selectedFunnelId);
    }
    
    public function mount(Deal $deal)
    {
        $this->selectedTab = 'tasks';
        $this->selectedFunnelId = $this->deal->funnel->id;        
        $this->deal = $deal;                               
    }

    public function render()
    {
        $customFields = DB::table('deals_custom_fields')->where('deal_id', $this->deal->id)->get();

        return view('livewire.deals.show', [
            'funnels' => Funnel::all(),
            'customFields' => $customFields,
            'employees' => Staff::all(),
        ]);
    }    

    public function tabSelected($tabName)
    {        
        $this->selectedTab = $tabName;        
    }

    public function stageSelected($stage)
    {
        $this->selectedStage = $stage;
    }

    public function editModeToggle()
    {
        if ($this->editModeEnabled) {
            $this->selectedStage = $this->deal->stage;
        }
                
        if ($this->deal->isDirty()) {
            $this->deal->fill($this->deal->getOriginal());
        }        
        $this->selectedFunnelId = $this->deal->funnel->id;

        $this->editModeEnabled = !$this->editModeEnabled;
    }

    public function saveChanges()
    {                
        $this->validate();

        $this->deal->funnel_id = $this->selectedFunnelId;
        $this->setDealStage();        
        $this->deal->save();
                
        $this->editModeEnabled = !$this->editModeEnabled;
    }

    private function setDealStage()
    {
        if ($this->selectedStage == $this->successStageIndex || 
        $this->selectedStage == $this->failStageIndex) {
            $this->setDealStageIfTerminal();
        } else {            
            $this->setDealStageIfNotTerminal();
        }
    }

    private function setDealStageIfTerminal()
    {        
        $this->deal->success = $this->selectedStage == $this->successStageIndex;        
        $this->deal->closed_at = now();        
    }

    private function setDealStageIfNotTerminal()
    {
        $this->deal->stage = $this->selectedStage;
        $this->deal->closed_at = null;
        $this->deal->success = false;
    }
}
