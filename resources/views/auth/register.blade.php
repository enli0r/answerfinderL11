<x-app-layout>
    <div class="auth-form w-[500px] sm:w-[80%] p-8 border mx-auto mt-10 mb-10">

        <h1 class="text-[28px] font-bold text-sky-700 text-center mb-2">Sign up</h1>
        <p class="text-gray-500 text-center text-sm mb-4 sm:text-xs">We hope you get the answer you are looking for.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
    
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('login') }}" class="text-black underline text-sm hover:text-blue-600"><span class="sm:hidden">Already have an account? </span>Login here.</a>
    
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    
</x-app-layout>
