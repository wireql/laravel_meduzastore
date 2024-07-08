<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CodeCheckRequest;
use App\Http\Requests\CodeStoreRequest;
use App\Models\AuthCode;
use App\Models\User;
use App\Services\Auth\UserAuthService;
use App\Services\RecaptchaService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CodeController extends Controller
{
    public function store(CodeStoreRequest $request, RecaptchaService $recaptchaService, UserAuthService $userAuthService) {

        if(!$recaptchaService->validate($request['g-recaptcha-response'])['success']) {
            return response()->json([
                'message' => 'Ошибка при проверке капчи. Повторите попытку.'
            ], 400);
        }

        $userAuthService->generateUserAuthCode(
            $request['email'],
        );

        Session::put('email', $request['email']);

        return response()->json([
            'message' => 'Код был отправлен на указанную вами почту.'
        ], 201);

    }

    public function check(CodeCheckRequest $request, UserAuthService $userAuthService) {

        $user_email = Session::get('email');

        try {

            $user = $userAuthService->validateUserAuthCode(
                $user_email,
                $request['code']
            );

            $userAuthService->login($user);

            $request->session()->flush();
            $request->session()->regenerate();

            return response()->json([
                'message' => 'Вы успешно авторизовались.'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], $e->getCode());
        }


    }
}
