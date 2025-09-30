<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ProduksiDryerDetailVeneer;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProduksiDryerDetailVeneerPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ProduksiDryerDetailVeneer');
    }

    public function view(AuthUser $authUser, ProduksiDryerDetailVeneer $produksiDryerDetailVeneer): bool
    {
        return $authUser->can('View:ProduksiDryerDetailVeneer');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ProduksiDryerDetailVeneer');
    }

    public function update(AuthUser $authUser, ProduksiDryerDetailVeneer $produksiDryerDetailVeneer): bool
    {
        return $authUser->can('Update:ProduksiDryerDetailVeneer');
    }

    public function delete(AuthUser $authUser, ProduksiDryerDetailVeneer $produksiDryerDetailVeneer): bool
    {
        return $authUser->can('Delete:ProduksiDryerDetailVeneer');
    }

    public function restore(AuthUser $authUser, ProduksiDryerDetailVeneer $produksiDryerDetailVeneer): bool
    {
        return $authUser->can('Restore:ProduksiDryerDetailVeneer');
    }

    public function forceDelete(AuthUser $authUser, ProduksiDryerDetailVeneer $produksiDryerDetailVeneer): bool
    {
        return $authUser->can('ForceDelete:ProduksiDryerDetailVeneer');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ProduksiDryerDetailVeneer');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ProduksiDryerDetailVeneer');
    }

    public function replicate(AuthUser $authUser, ProduksiDryerDetailVeneer $produksiDryerDetailVeneer): bool
    {
        return $authUser->can('Replicate:ProduksiDryerDetailVeneer');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ProduksiDryerDetailVeneer');
    }

}