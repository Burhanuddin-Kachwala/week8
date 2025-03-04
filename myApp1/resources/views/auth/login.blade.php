<x:layout>
    <x-slot:heading>
        Login Form
    </x-slot:heading>
    <form action="/login" method="POST" class="max-w-lg mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <x-form-title for="email">Email</x-form-title>
            <x-form-input type="email" name="email" id="email" required placeholder='example@example.com' :value="old('email')"></x-form-input>
            <x-form-error name='email'></x-form-error>
        </div>
        <div class="mb-4">
            <x-form-title for="password">Password</x-form-title>
            <x-form-input type="password" name="password" id="password" required placeholder='********'></x-form-input>
            <x-form-error name='password'></x-form-error>
        </div>
        <div class="flex items-center justify-between">
            <x-form-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</x-form-button>
            <x-form-button type="reset" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Reset</x-form-button>
        </div>
    </form>
</x:layout>
