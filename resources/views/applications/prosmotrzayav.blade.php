<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            Просмотр заявок
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full bg-white">
                        <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-200">Имя</th>
                            <th class="py-2 px-4 border-b border-gray-200">Email</th>
                            <th class="py-2 px-4 border-b border-gray-200">Телефон</th>
                            <th class="py-2 px-4 border-b border-gray-200">Сообщение</th>
                            <th class="py-2 px-4 border-b border-gray-200">Дата создания</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $application->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $application->email }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $application->phone }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $application->message }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $application->created_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
