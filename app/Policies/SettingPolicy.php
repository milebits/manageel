<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->hasPermission(class: Setting::class, action: 'create');
    }

    /**
     * @param User $user
     * @param Setting $setting
     * @return bool
     */
    public function update(User $user, Setting $setting): bool
    {
        return $user->hasPermission(class: $setting->getMorphClass(), action: 'update');
    }

    /**
     * @param User $user
     * @param Setting $setting
     * @return bool
     */
    public function view(User $user, Setting $setting): bool
    {
        return $user->hasPermission(class: $setting->getMorphClass(), action: 'view');
    }

    /**
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission(class: Setting::class, action: 'viewAny');
    }

    /**
     * @param User $user
     * @param Setting $setting
     * @return bool
     */
    public function delete(User $user, Setting $setting): bool
    {
        return $user->hasPermission(class: $setting->getMorphClass(), action: 'delete');
    }

    /**
     * @param User $user
     * @param Setting $setting
     * @return bool
     */
    public function forceDelete(User $user, Setting $setting): bool
    {
        return $user->hasPermission(class: $setting->getMorphClass(), action: 'forceDelete');
    }
}
