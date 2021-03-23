<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\API\LoginRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $this->findUser($data['identifier']);
        if (!$this->checkUser($user, $data['password'])) return $this->fail();
        return $this->success($request, $data['device_name']);
    }

    /**
     * @param string $identifier
     * @return User|Model
     */
    public function findUser(string $identifier): User|Model
    {
        return User::query()->where('email', $identifier)
            ->orWhere('username', $identifier)
            ->orWhere('phone', $identifier)->first();
    }

    /**
     * @param User|null $user
     * @param string $password
     * @return bool
     */
    public function checkUser(?User $user, string $password): bool
    {
        return !is_null($user) && Hash::check($password, $user->getAttribute('password'));
    }

    /**
     * @param Request $request
     * @param string $device_name
     * @return JsonResponse
     */
    public function success(Request $request, string $device_name = 'Application'): JsonResponse
    {
        $user = $request->user();
        $user->tokens()->each(fn($token) => $token->delete());
        $token = $user->createToken($device_name)->plainTextToken;

        return response()->json([
            'user' => $request->user(),
            'token' => $token,
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function fail(): JsonResponse
    {
        return response()->json([
            'user' => null, 'token' => null
        ]);
    }
}
