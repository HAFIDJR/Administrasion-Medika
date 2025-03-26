<?php

namespace App\Policies;

use App\Models\RawatInap;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RawatInapPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RawatInap $rawatInap): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RawatInap $rawatInap): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RawatInap $rawatInap): bool
    {
        return $user->id === $rawatInap->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RawatInap $rawatInap): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RawatInap $rawatInap): bool
    {
        return false;
    }
}
