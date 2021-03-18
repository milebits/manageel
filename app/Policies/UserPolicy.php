<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission(class: 'viewAny', action: User::class);
    }

    /**
     * @param User $user
     * @param User $person
     * @return bool
     */
    public function view(User $user, User $person): bool
    {
        return $user->hasPermission(class: $person->getMorphClass(), action: 'view');
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->hasPermission(class: User::class, action: 'create');
    }

    /**
     * @param User $user
     * @param User $person
     * @return bool
     */
    public function update(User $user, User $person): bool
    {
        return $user->hasPermission(class: $person->getMorphClass(), action: 'update');
    }

    /**
     * @param User $user
     * @param User $person
     * @return bool
     */
    public function delete(User $user, User $person): bool
    {
        return $user->hasPermission(class: $person->getMorphClass(), action: 'delete');
    }

    /**
     * @param User $user
     * @param User $person
     * @return bool
     */
    public function forceDelete(User $user, User $person): bool
    {
        return $user->hasPermission(class: $person->getMorphClass(), action: 'forceDelete');
    }
}
