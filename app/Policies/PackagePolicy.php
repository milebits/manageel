<?php

namespace App\Policies;

use App\Models\Package;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackagePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->hasPermission(class: Package::class, action: 'store');
    }

    /**
     * @param User $user
     * @param Package $package
     * @return bool
     */
    public function update(User $user, Package $package): bool
    {
        return $user->hasPermission(class: $package->getMorphClass(), action: 'update');
    }

    /**
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission(class: Package::class, action: 'viewAny');
    }

    /**
     * @param User $user
     * @param Package $package
     * @return bool
     */
    public function view(User $user, Package $package): bool
    {
        return $user->hasPermission(class: $package->getMorphClass(), action: 'view');
    }

    /**
     * @param User $user
     * @param Package $package
     * @return bool
     */
    public function delete(User $user, Package $package): bool
    {
        return $user->hasPermission(class: $package->getMorphClass(), action: 'delete');
    }

    /**
     * @param User $user
     * @param Package $package
     * @return bool
     */
    public function forceDelete(User $user, Package $package): bool
    {
        return $user->hasPermission(class: $package->getMorphClass(), action: 'forceDelete');
    }
}
