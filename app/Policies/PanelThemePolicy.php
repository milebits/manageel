<?php

namespace App\Policies;

use App\Models\PanelTheme;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PanelThemePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->hasPermission(class: PanelTheme::class, action: 'store');
    }

    /**
     * @param User $user
     * @param PanelTheme $panelTheme
     * @return bool
     */
    public function update(User $user, PanelTheme $panelTheme): bool
    {
        return $user->hasPermission(class: $panelTheme->getMorphClass(), action: 'update');
    }

    /**
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission(class: PanelTheme::class, action: 'viewAny');
    }

    /**
     * @param User $user
     * @param PanelTheme $panelTheme
     * @return bool
     */
    public function view(User $user, PanelTheme $panelTheme): bool
    {
        return $user->hasPermission(class: $panelTheme->getMorphClass(), action: 'view');
    }

    /**
     * @param User $user
     * @param PanelTheme $panelTheme
     * @return bool
     */
    public function delete(User $user, PanelTheme $panelTheme): bool
    {
        return $user->hasPermission(class: $panelTheme->getMorphClass(), action: 'delete');
    }

    /**
     * @param User $user
     * @param PanelTheme $panelTheme
     * @return bool
     */
    public function forceDelete(User $user, PanelTheme $panelTheme): bool
    {
        return $user->hasPermission(class: $panelTheme->getMorphClass(), action: 'forceDelete');
    }
}
