<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-900">
        <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold text-center text-white mb-6">Вход в систему</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-white">Email</label>
                    <input
                        name="email"
                        type="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') is-invalid @enderror"
                        id="email"
                        aria-describedby="emailHelp"
                        required>
                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-white">Пароль</label>
                    <input name="password" type="password" class="mt-1 block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="password" required>
                </div>

                <div class="mb-4 flex items-center">
                    <input name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" id="remember_me">
                    <label class="ml-2 block text-sm text-white" for="remember_me">Запомнить меня</label>
                </div>

                <div class="flex flex-col space-y-4">
                    <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Войти</button>
                    <a href="{{ route('register') }}" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center">Регистрация</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
