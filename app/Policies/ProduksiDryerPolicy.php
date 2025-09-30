<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ProduksiDryer;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProduksiDryerPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ProduksiDryer');
    }

    public function view(AuthUser $authUser, ProduksiDryer $produksiDryer): bool
    {
        return $authUser->can('View:ProduksiDryer');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ProduksiDryer');
    }

    public function update(AuthUser $authUser, ProduksiDryer $produksiDryer): bool
    {
        return $authUser->can('Update:ProduksiDryer');
    }

    public function delete(AuthUser $authUser, ProduksiDryer $produksiDryer): bool
    {
        return $authUser->can('Delete:ProduksiDryer');
    }

    public function restore(AuthUser $authUser, ProduksiDryer $produksiDryer): bool
    {
        return $authUser->can('Restore:ProduksiDryer');
    }

    public function forceDelete(AuthUser $authUser, ProduksiDryer $produksiDryer): bool
    {
        return $authUser->can('ForceDelete:ProduksiDryer');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ProduksiDryer');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ProduksiDryer');
    }

    public function replicate(AuthUser $authUser, ProduksiDryer $produksiDryer): bool
    {
        return $authUser->can('Replicate:ProduksiDryer');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ProduksiDryer');
    }

}