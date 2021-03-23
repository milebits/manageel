<?php


namespace App\Actions\Fortify;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ConfirmUserPassword
{
    /**
     * @param User $user
     * @param string $password
     * @return bool
     */
    public function confirm(User $user, string $password): bool
    {
        return !is_null($user) && Hash::check($password, $user->password);
    }
}
