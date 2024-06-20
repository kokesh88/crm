<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            Все заявки
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
                            <th class="py-2 border-b border-gray-600">Имя</th>
                            <th class="py-2 border-b border-gray-600">Email</th>
                            <th class="py-2 border-b border-gray-600">Телефон</th>
                            <th class="py-2 border-b border-gray-600">Описание</th>
                            <th class="py-2 border-b border-gray-600">Статус</th>
                            <th class="py-2 border-b border-gray-600">Дата создания</th>
                            <th class="py-2 border-b border-gray-600">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <td class="py-2 border-b border-gray-600">{{ $application->id }}</td>
                                <td class="py-2 border-b border-gray-600">{{ $application->title }}</td>
                                <td class="py-2 border-b border-gray-600">{{ $application->name }}</td>
                                <td class="py-2 border-b border-gray-600">{{ $application->email }}</td>
                                <td class="py-2 border-b border-gray-600">{{ $application->phone }}</td>
                                <td class="py-2 border-b border-gray-600">{{ $application->description }}</td>
                                <td class="py-2 border-b border-gray-600">{{ $application->status }}</td>
                                <td class="py-2 border-b border-gray-600">{{ $application->created_at }}</td>
                                <td class="py-2 border-b border-gray-600">
                                    <form action="{{ route('applications.updateStatus', $application) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="in_progress">
                                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Принять в работу</button>
                                    </form>
                                    <form action="{{ route('applications.updateStatus', $application) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="completed">
                                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Отметить выполненной</button>
                                    </form>
                                    <form action="{{ route('master.applications.destroy', $application) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
