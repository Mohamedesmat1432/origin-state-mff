<x-guest-layout>
    <x-slot name="title">
        {{ __('site.forget_password') }}
    </x-slot>

    <x-authentication-card>
        {{-- <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot> --}}

        <div class="mb-4 text-sm text-gray-600">
            {{ __('site.forget_password_message') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('site.email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-auth-indigo-button>
                    {{ __('site.email_password_reset_link') }}
                </x-auth-indigo-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
