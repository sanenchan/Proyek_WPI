<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ProduksiRotaryLahan;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProduksiRotaryLahanPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ProduksiRotaryLahan');
    }

    public function view(AuthUser $authUser, ProduksiRotaryLahan $produksiRotaryLahan): bool
    {
        return $authUser->can('View:ProduksiRotaryLahan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ProduksiRotaryLahan');
    }

    public function update(AuthUser $authUser, ProduksiRotaryLahan $produksiRotaryLahan): bool
    {
        return $authUser->can('Update:ProduksiRotaryLahan');
    }

    public function delete(AuthUser $authUser, ProduksiRotaryLahan $produksiRotaryLahan): bool
    {
        return $authUser->can('Delete:ProduksiRotaryLahan');
    }

    public function restore(AuthUser $authUser, ProduksiRotaryLahan $produksiRotaryLahan): bool
    {
        return $authUser->can('Restore:ProduksiRotaryLahan');
    }

    public function forceDelete(AuthUser $authUser, ProduksiRotaryLahan $produksiRotaryLahan): bool
    {
        return $authUser->can('ForceDelete:ProduksiRotaryLahan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ProduksiRotaryLahan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ProduksiRotaryLahan');
    }

    public function replicate(AuthUser $authUser, ProduksiRotaryLahan $produksiRotaryLahan): bool
    {
        return $authUser->can('Replicate:ProduksiRotaryLahan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ProduksiRotaryLahan');
    }

}