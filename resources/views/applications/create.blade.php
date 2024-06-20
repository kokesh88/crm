<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            Оставить заявку
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 text-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('applications.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="car_brand" class="block text-sm font-medium text-gray-200">Марка авто</label>
                            <input type="text" name="car_brand" id="car_brand" class="mt-1 block w-full bg-gray-700 border border-gray-600 text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-200">Название</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full bg-gray-700 border border-gray-600 text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-200">Имя</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full bg-gray-700 border border-gray-600 text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-200">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full bg-gray-700 border border-gray-600 text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-200">Телефон</label>
                            <input type="text" name="phone" id="phone" class="mt-1 block w-full bg-gray-700 border border-gray-600 text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-200">Описание</label>
                            <textarea name="description" id="description" class="mt-1 block w-full bg-gray-700 border border-gray-600 text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" rows="4" required></textarea>
                        </div>
                        <div>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
