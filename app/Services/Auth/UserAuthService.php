<?php

namespace App\Services\Auth;

use App\Models\AuthCode;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserAuthService {

    public function generateUserAuthCode($email) {
        
        $user = User::query()->where('email', '=', $email)->first();

        if(!$user) {
            $this->createUserAccount($email);
        }

        return AuthCode::create([
            'user_id' => $user->id,
            'code' => rand(1000, 9999),
            'expires_at' => Carbon::now()->addMinutes(1),
        ]);

    }

    public function createUserAccount($email) {

        return User::create([
            'email' => $email
        ]);

    }

    public function validateUserAuthCode($email, $code) {
        
        $auth_code = AuthCode::query()->with('user')->whereHas('user', function ($query) use ($email) {
            $query->where('email', '=', $email);    
        })->latest()->first();

        if(!$auth_code){
            throw new Exception("Пользователь не найден.", 404);
        }

        if($auth_code['code'] != $code) {
            throw new Exception("Неверный код.", 400);
        }

        if($auth_code['expires_at'] < Carbon::now()) {
            throw new Exception("Время действия кода истекло. Повторите попытку.", 408);
        }

        return User::query()->where('email', '=', $email)->first();

    }

    public function login($user) {
        return Auth::login($user, true);
    }

}