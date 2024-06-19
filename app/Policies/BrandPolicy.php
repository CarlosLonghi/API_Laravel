<?php

namespace App\Policies;

use App\Models\Brand;
use App\Models\User;
use App\RoleEnum;
use Illuminate\Auth\Access\Response;

class BrandPolicy
{
    /**
     * Determine whether the user can view any models.
     * Only admins can see brands
     */
    public function viewAny(User $user): bool
    {
        return $user->role_id == RoleEnum::ADMIN;
    }

    /**
     * Determine whether the user can view the model.
     * Only admins can view brand
     */
    public function view(User $user, Brand $brand): bool
    {
        return $user->role_id == RoleEnum::ADMIN;
    }

    /**
     * Determine whether the user can create models.
     * Only admins can create brands
     */
    public function create(User $user): bool
    {
        return $user->role_id == RoleEnum::ADMIN;
    }

    /**
     * Determine whether the user can update the model.
     * Only admins can update brands
     */
    public function update(User $user, Brand $brand): bool
    {
        return $user->role_id == RoleEnum::ADMIN;
    }

    /**
     * Determine whether the user can delete the model.
     * Only admins can delete brands
     */
    public function delete(User $user, Brand $brand): bool
    {
        return $user->role_id == RoleEnum::ADMIN;
    }

    /**
     * Determine whether the user can restore the model.
     * Only admins can restore brands
     */
    public function restore(User $user, Brand $brand): bool
    {
        return $user->role_id == RoleEnum::ADMIN;
    }

    /**
     * Determine whether the user can permanently delete the model.
     * Only admins can permanently delete brands
     */
    public function forceDelete(User $user, Brand $brand): bool
    {
        return $user->role_id == RoleEnum::ADMIN;
    }
}
