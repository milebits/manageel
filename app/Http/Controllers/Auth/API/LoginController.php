<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\API\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(LoginRequest $request): string|array
    {
        $data = collect($request->validated());

        $user = User::query()->where('email', $data->get('identifier'))
            ->orWhere('username', $data->get('identifier'))
            ->orWhere('phone', $data->get('identifier'))->first();

        if (is_null($user)) return $this->fail();
        if (!Hash::check($data->get('password'), $user->password)) return $this->fail();

        $user->tokens()->each(fn($token) => $token->delete());
        $token = $user->createToken($data->get('device_name'))->plainTextToken;

        return compact('user', 'token');
    }

    public function fail(): string
    {
        return back()->withErrors(['session' => 'Identifier or password is incorrect']);
    }
}
