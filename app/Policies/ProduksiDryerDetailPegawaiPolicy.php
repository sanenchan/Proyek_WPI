<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ProduksiDryerDetailPegawai;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProduksiDryerDetailPegawaiPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ProduksiDryerDetailPegawai');
    }

    public function view(AuthUser $authUser, ProduksiDryerDetailPegawai $produksiDryerDetailPegawai): bool
    {
        return $authUser->can('View:ProduksiDryerDetailPegawai');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ProduksiDryerDetailPegawai');
    }

    public function update(AuthUser $authUser, ProduksiDryerDetailPegawai $produksiDryerDetailPegawai): bool
    {
        return $authUser->can('Update:ProduksiDryerDetailPegawai');
    }

    public function delete(AuthUser $authUser, ProduksiDryerDetailPegawai $produksiDryerDetailPegawai): bool
    {
        return $authUser->can('Delete:ProduksiDryerDetailPegawai');
    }

    public function restore(AuthUser $authUser, ProduksiDryerDetailPegawai $produksiDryerDetailPegawai): bool
    {
        return $authUser->can('Restore:ProduksiDryerDetailPegawai');
    }

    public function forceDelete(AuthUser $authUser, ProduksiDryerDetailPegawai $produksiDryerDetailPegawai): bool
    {
        return $authUser->can('ForceDelete:ProduksiDryerDetailPegawai');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ProduksiDryerDetailPegawai');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ProduksiDryerDetailPegawai');
    }

    public function replicate(AuthUser $authUser, ProduksiDryerDetailPegawai $produksiDryerDetailPegawai): bool
    {
        return $authUser->can('Replicate:ProduksiDryerDetailPegawai');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ProduksiDryerDetailPegawai');
    }

}