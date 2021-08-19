<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */

    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_bio' => ['required', 'string', 'max:255'],
            "user_phone_number" => ['required', 'max:255'],
            "user_gender" => ['required', 'max:255'],
            "user_profile_image" => ['required', 'string', 'max:255'],
            "user_post" => ['required', 'int', 'max:255'],
            "user_follower" => ['required', 'int', 'max:255'],
            "user_following" => ['required', 'int', 'max:255'],
            "is_user_active" => ['required', 'int', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'user_bio' => $input['user_bio'],
            "user_phone_number" => $input['user_phone_number'],
            "user_gender" => $input['user_gender'],
            "user_profile_image" => $input['user_profile_image'],
            "user_post" => $input['user_post'],
            "user_follower" => $input['user_follower'],
            "user_following" => $input['user_following'],
            "is_user_active" => $input['is_user_active'],
            'password' => Hash::make($input['password']),
        ]);
    }
}