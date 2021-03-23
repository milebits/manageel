<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Laravel\Fortify\Fortify;
use function response;

class ForgotPasswordController extends Controller
{
    /**
     * @param Request $request
     * @return bool|JsonResponse
     */
    public function store(Request $request): JsonResponse|bool
    {
        $request->validate([Fortify::email() => 'required|email']);
        $status = $this->broker()->sendResetLink($request->only(Fortify::email()));
        return $request->wantsJson()
            ? response()->json([
                "success" => $status == Password::RESET_LINK_SENT,
                "status" => $status
            ])
            : true;
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return PasswordBroker
     */
    protected function broker(): PasswordBroker
    {
        return Password::broker(config('fortify.passwords'));
    }
}
