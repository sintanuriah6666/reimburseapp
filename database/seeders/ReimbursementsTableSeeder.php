<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReimbursementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pengajuan oleh STAFF untuk pembelian charger
        DB::table('reimbursements')->insert([
            'user_id' => 3, // ID user dengan jabatan STAFF
            'tanggal' => Carbon::now(),
            'nama_reimbursement' => 'Pembelian Charger',
            'deskripsi' => 'Pembelian charger untuk keperluan kantor',
            'file_pendukung' => '3/nota.png',
            'status' => 'pending',
            'created_at' => Carbon::now(),

        ]);
    }
}
