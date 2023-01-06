<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        {{-- añadir enlace para ir a pagina registro --}}
        <div class="mb-4 font-medium text-sm text-right text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}">
                Sign up
            </a>
        </div>
        

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" checked />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 mb-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
        <hr>
        <p class="text-center text-xl mt-2">or</p>
        <div class=" p-4 rounded-lg mt-3">
            <a class="bg-gray-200 w-full flex items-center justify-between rounded-lg px-4 py-2 text-gray-500 font-semibold hover:bg-gray-400 hover:text-white" href="{{ route('login.google') }}">
                <img src="https://img.icons8.com/color/48/000000/google-logo.png" class="inline-block" alt="google" class="h-8">
                <p class="text-xl">Sign in with google</p>    
            </a>
        </div>
        
        
    </x-jet-authentication-card>
</x-guest-layout>
