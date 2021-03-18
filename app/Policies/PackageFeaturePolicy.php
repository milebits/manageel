<?php

namespace App\Policies;

use App\Models\PackageFeature;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackageFeaturePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->hasPermission(class: PackageFeature::class, action: 'store');
    }

    /**
     * @param User $user
     * @param PackageFeature $feature
     * @return bool
     */
    public function update(User $user, PackageFeature $feature): bool
    {
        return $user->hasPermission(class: $feature->getMorphClass(), action: 'update');
    }

    /**
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission(class: PackageFeature::class, action: 'viewAny');
    }

    /**
     * @param User $user
     * @param PackageFeature $feature
     * @return bool
     */
    public function view(User $user, PackageFeature $feature): bool
    {
        return $user->hasPermission(class: $feature->getMorphClass(), action: 'view');
    }

    /**
     * @param User $user
     * @param PackageFeature $feature
     * @return bool
     */
    public function delete(User $user, PackageFeature $feature): bool
    {
        return $user->hasPermission(class: $feature->getMorphClass(), action: 'delete');
    }

    /**
     * @param User $user
     * @param PackageFeature $feature
     * @return bool
     */
    public function forceDelete(User $user, PackageFeature $feature): bool
    {
        return $user->hasPermission(class: $feature->getMorphClass(), action: 'forceDelete');
    }
}
