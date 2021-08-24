<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-input id="user_bio" class="block mt-1 w-full" type="hidden" name="user_bio" required autocomplete="user_bio" :value="old('user_bio')" value="I'm too lazy to describe about it." />
            </div>
            <div class="mt-4">
                <x-jet-input id="user_phone_number" class="block mt-1 w-full" type="hidden" name="user_phone_number" required autocomplete="user_phone_number" :value="old('user_phone_number')" value="000 000 000" />
            </div>
            <div class="mt-4">
                <x-jet-input id="user_gender" class="block mt-1 w-full" type="hidden" name="user_gender" required autocomplete="user_gender" :value="old('user_gender')" value="Unknown" />
            </div>
            <div class="mt-4">
                <x-jet-input id="user_profile_image" class="block mt-1 w-full" type="hidden" name="user_profile_image" required autocomplete="user_profile_image" :value="old('user_profile_image')" value="users_profile_images/default_profile_image.png" />
            </div>
            <div class="mt-4">
                <x-jet-input id="user_post" class="block mt-1 w-full" type="hidden" name="user_post" required autocomplete="user_post" :value="old('user_post')" value="0" />
            </div>
            <div class="mt-4">
                <x-jet-input id="user_follower" class="block mt-1 w-full" type="hidden" name="user_follower" required autocomplete="user_follower" :value="old('user_follower')" value="0" />
            </div>
            <div class="mt-4">
                <x-jet-input id="user_following" class="block mt-1 w-full" type="hidden" name="user_following" required autocomplete="user_following" :value="old('user_following')" value="0" />
            </div>
            <div class="mt-4">
                <x-jet-input id="is_user_active" class="block mt-1 w-full" type="hidden" name="is_user_active" required autocomplete="is_user_active" :value="old('is_user_active')" value="1" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
