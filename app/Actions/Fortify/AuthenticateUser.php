<?php


namespace App\Actions\Fortify;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AuthenticateUser
{
    /**
     * @param LoginRequest $request
     * @return User|null
     */
    public function authenticate(LoginRequest $request): ?User
    {
        $data = $request->validated();
        return $this->confirmPasswordBroker()->confirm(
            $user = $this->findUser($data['identifier']),
            $data['password']
        )
            ? $user
            : null;
    }

    /**
     * @param string $identifier
     * @return User|Model
     */
    public function findUser(string $identifier): User|Model
    {
        return User::where('email', $identifier)->orWhere('username', $identifier)->orWhere('phone', $identifier)->first();
    }

    #[Pure] public function confirmPasswordBroker(): ConfirmUserPassword
    {
        return new ConfirmUserPassword();
    }
}
