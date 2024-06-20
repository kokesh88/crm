<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            Мои заявки
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 text-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if($applications->isEmpty())
                    <p class="text-gray-400">Нет заявок для отображения.</p>
                @else
                    <table class="min-w-full bg-gray-900 text-white">
                        <thead>
                        <tr>
                            <th class="py-2 border-b border-gray-600">ID</th>
                            <th class="py-2 border-b border-gray-600">Название</th>
                            <th class="py-2 border-b border-gray-600">Описание</th>
                            <th class="py-2 border-b border-gray-600">Статус</th>
                            <th class="py-2 border-b border-gray-600">Дата создания</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <td class="py-2 border-b border-gray-600">{{ $application->id }}</td>
                                <td class="py-2 border-b border-gray-600">{{ $application->title }}</td>
                                <td class="py-2 border-b border-gray-600">{{ $application->description }}</td>
                                <td class="py-2 border-b border-gray-600">{{ $application->status }}</td>
                                <td class="py-2 border-b border-gray-600">{{ $application->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
