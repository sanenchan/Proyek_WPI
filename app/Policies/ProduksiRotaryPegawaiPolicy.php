<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ProduksiRotaryPegawai;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProduksiRotaryPegawaiPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ProduksiRotaryPegawai');
    }

    public function view(AuthUser $authUser, ProduksiRotaryPegawai $produksiRotaryPegawai): bool
    {
        return $authUser->can('View:ProduksiRotaryPegawai');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ProduksiRotaryPegawai');
    }

    public function update(AuthUser $authUser, ProduksiRotaryPegawai $produksiRotaryPegawai): bool
    {
        return $authUser->can('Update:ProduksiRotaryPegawai');
    }

    public function delete(AuthUser $authUser, ProduksiRotaryPegawai $produksiRotaryPegawai): bool
    {
        return $authUser->can('Delete:ProduksiRotaryPegawai');
    }

    public function restore(AuthUser $authUser, ProduksiRotaryPegawai $produksiRotaryPegawai): bool
    {
        return $authUser->can('Restore:ProduksiRotaryPegawai');
    }

    public function forceDelete(AuthUser $authUser, ProduksiRotaryPegawai $produksiRotaryPegawai): bool
    {
        return $authUser->can('ForceDelete:ProduksiRotaryPegawai');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ProduksiRotaryPegawai');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ProduksiRotaryPegawai');
    }

    public function replicate(AuthUser $authUser, ProduksiRotaryPegawai $produksiRotaryPegawai): bool
    {
        return $authUser->can('Replicate:ProduksiRotaryPegawai');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ProduksiRotaryPegawai');
    }

}