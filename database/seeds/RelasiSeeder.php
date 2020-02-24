<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;
class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //menghapus semua sample data
    	DB::table('dosens')->delete();
    	DB::table('mahasiswas')->delete();
    	DB::table('walis')->delete();
    	DB::table('hobis')->delete();
    	DB::table('mahasiswa_hobi')->delete();

        $dosen = Dosen::create([
        	'nama' => 'Abdul Mustafa',
        	'nipd' => '1234567890'
        ]);
        $this->command->info('Data Dosen Berhasil dibuat');

        $mamat = Mahasiswa::create([
        	'nama' => 'Mamat Karbit',
        	'nim' => '101010101',
        	'id_dosen' => $dosen->id
        ]);

        $feri = Mahasiswa::create([
        	'nama' => 'Feri Ambyar Supriadi',
        	'nim' => '1010130',
        	'id_dosen' => $dosen->id
        ]);

        $dadang = Mahasiswa::create([
        	'nama' => 'Dadang',
        	'nim' => '10101324',
        	'id_dosen' => $dosen->id
        ]);
        $this->command->info('Data Mahasiswa Berhasil Dibuat');

        //wali
        $ahmad = Wali::create([
        	'nama' => 'Ahmad',
        	'id_mahasiswa' => $dadang->id
        ]);

        $dudung = Wali::create([
        	'nama' => 'Dudung',
        	'id_mahasiswa' => $mamat->id
        ]);

        $basit = Wali::create([
        	'nama' => 'Basit',
        	'id_mahasiswa' => $feri->id
        ]);
        $this->command->info('Data Wali Berhasil Dibuat');

        //wali
        $mancing = Hobi::create([
        	'hobi' => 'Mancing Keributan'
        ]);

        $gaming = Hobi::create([
        	'hobi' => 'Dota 2'
        ]);

        $mengaji = Hobi::create([
        	'hobi' => 'Mengaji One Day One Ayat'
        ]);

        //melampirkan hobi ke mahasiswa
        $mamat->hobi()->attach($mancing->id);
        $dadang->hobi()->attach($mengaji->id);
         $dadang->hobi()->attach($gaming->id);
        $feri->hobi()->attach($gaming->id);


    }
}
