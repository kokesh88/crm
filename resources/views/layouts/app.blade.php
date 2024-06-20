<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' | СТО "Умелые Ручки"' : 'СТО "Умелые Ручки"' }}</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-900 text-white">
<!-- Header -->
<header class="bg-gray-800 p-4 flex justify-between items-center">
    <div>
        <h1 class="text-xl font-bold">СТО "Умелые Ручки"</h1>
        <p>с безупречной репутацией</p>
    </div>
    <div class="flex space-x-4 items-center">
        <div class="text-sm">
            <p>г. Нижневартовск,⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀ </p>
            <p>8-800-555-35-35</p>
        </div>
        @if (Auth::user())
            <div class="flex items-center space-x-4">
                <div class="text-sm">
                    <p>Роль: {{ Auth::user()->roles->pluck('name')->implode(', ') }}</p>
                </div>
                @if (Auth::user()->hasRole('client'))
                    <a href="{{ route('client.applications.index') }}" class="bg-red-500 px-4 py-2 rounded-md text-white">Мои заявки</a>
                @endif
                @if (Auth::user()->hasRole('master'))
                    <a href="{{ route('master.applications.index') }}" class="bg-red-500 px-4 py-2 rounded-md text-white">Просмотр заявок</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 px-4 py-2 rounded-md text-white">Выйти</button>
                </form>
            </div>
        @endif
    </div>
</header>

<!-- Navigation -->
<nav class="bg-gray-700 p-4">
    <ul class="flex justify-center space-x-4">
        <li><a href="/dashboard" class="hover:text-red-500">Главная</a></li>
        <li><a href="/about" class="hover:text-red-500">О нас</a></li>
        <li><a href="/prices" class="hover:text-red-500">Цены</a></li>
        <li><a href="/work" class="hover:text-red-500">Наши работы</a></li>
        <li><a href="/partners" class="hover:text-red-500">Партнеры</a></li>
        <li><a href="/contact" class="hover:text-red-500">Контакты</a></li>
    </ul>
</nav>

<!-- Main Content -->
<main class="mt-0">
    {{ $slot }}
</main>

@livewireScripts
</body>
</html>
