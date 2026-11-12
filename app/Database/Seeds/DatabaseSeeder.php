<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('BarangAdjusmentStokSeeder');
        $this->call('BarangHargaSeeder');
        $this->call('BarangImageSeeder');
        $this->call('BarangKategoriSeeder');
        $this->call('BarangSeeder');
        $this->call('CustomerSeeder');
        $this->call('FilePickerSeeder');
        $this->call('GudangSeeder');
        $this->call('IdentitasSeeder');
        $this->call('JenisHargaSeeder');
        $this->call('KategoriSeeder');
        $this->call('MenuKategoriSeeder');
        $this->call('MenuRoleSeeder');
        $this->call('MenuSeeder');
        $this->call('ModulePermissionSeeder');
        $this->call('ModuleSeeder');
        $this->call('ModuleStatusSeeder');
        $this->call('PelangganSeeder');
        $this->call('PembelianBayarSeeder');
        $this->call('PembelianDetailSeeder');
        $this->call('PembelianFileSeeder');
        $this->call('PembelianReturDetailSeeder');
        $this->call('PembelianReturSeeder');
        $this->call('PembelianSeeder');
        $this->call('PenjualanBayarSeeder');
        $this->call('PenjualanDetailSeeder');
        $this->call('PenjualanReturDetailSeeder');
        $this->call('PenjualanReturDokumenSeeder');
        $this->call('PenjualanReturSeeder');
        $this->call('PenjualanSeeder');
        $this->call('RoleModulePermissionSeeder');
        $this->call('RoleSeeder');
        $this->call('SatuanUnitSeeder');
        $this->call('SettingSeeder');
        $this->call('SettingUserSeeder');
        $this->call('SupplierSeeder');
        $this->call('TransferBarangDetailSeeder');
        $this->call('TransferBarangSeeder');
        $this->call('UserLoginActivitySeeder');
        $this->call('UserRoleSeeder');
        $this->call('UserSeeder');
        $this->call('WilayahKabupatenSeeder');
        $this->call('WilayahKecamatanSeeder');
        $this->call('WilayahKelurahanSeeder');
        $this->call('WilayahPropinsiSeeder');
        $this->call('PengeluaranSeeder');
        $this->call('ResetDatabaseAccessSeeder');
    }
}
