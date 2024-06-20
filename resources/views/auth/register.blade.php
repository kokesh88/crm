<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-900">
        <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold text-center text-white mb-6">Регистрация</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="full_name" class="block text-sm font-medium text-white">ФИО</label>
                    <input
                        name="full_name"
                        type="text"
                        class="mt-1 block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('full_name') is-invalid @enderror"
                        id="full_name"
                        value="{{ old('full_name') }}"
                        required>
                    @error('full_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone_number" class="block text-sm font-medium text-white">Номер телефона</label>
                    <input
                        name="phone_number"
                        type="tel"
                        class="mt-1 block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('phone_number') is-invalid @enderror"
                        id="phone_number"
                        value="{{ old('phone_number') }}"
                        required>
                    @error('phone_number')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-white">Email</label>
                    <input
                        name="email"
                        type="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') is-invalid @enderror"
                        id="email"
                        value="{{ old('email') }}"
                        aria-describedby="emailHelp"
                        required>
                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-white">Пароль</label>
                    <input
                        name="password"
                        type="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') is-invalid @enderror"
                        id="password"
                        required>
                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-white">Подтвердите пароль</label>
                    <input
                        name="password_confirmation"
                        type="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation"
                        required>
                    @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-white">Роль</label>
                    <select name="role" id="role" class="mt-1 block w-full px-3 py-2 border border-gray-600 rounded-md shadow-sm bg-gray-700 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('role') is-invalid @enderror" required>
                        <option value="client">Клиент</option>
                        <option value="master">Мастер</option>
                        <option value="admin">Админ</option>
                    </select>
                    @error('role')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
