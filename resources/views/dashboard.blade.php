<x-app-layout>
    <x-slot name="header">
        <div class="relative flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
                    Добро пожаловать в СТО "Умелые Ручки"!
                </h2>
                <p>с безупречной репутацией</p>
            </div>
            <div class="text-right">
                <p>г. Нижневартовск, центральный район</p>
                <p>8-800-555-35-55</p>
            </div>
        </div>
    </x-slot>

    <!-- Add Logout Button -->
    <div class="absolute top-0 right-0 mt-4 mr-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 px-4 py-2 rounded text-white">Выйти</button>
        </form>
    </div>

    <!-- Main Image Section -->
    <section class="relative">
        <img src="{{ asset('images/main-photo.jpg') }}" alt="Main Photo" class="w-full h-[calc(100vh-8rem)] object-cover">
        <div class="absolute inset-0 flex flex-col justify-between items-center bg-black bg-opacity-50">
            <h2 class="text-5xl font-bold text-white mt-8">Автосервис "Умелые Ручки"</h2>
            <div class="mb-8 space-x-4">
                <a href="{{ route('applications.create') }}" class="bg-red-500 px-6 py-3 rounded text-lg">Оставить заявку</a>
                <a href="{{ route('prices') }}" class="bg-gray-800 px-6 py-3 rounded text-lg">Прайс</a>
            </div>
        </div>
    </section>
</x-app-layout>
