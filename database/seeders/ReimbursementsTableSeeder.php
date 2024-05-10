<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class ReimbursementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('nip', '1236')->first();
        $user_id = $user->id;
        DB::table('reimbursements')->insert([
            'user_id' => $user_id,
            'tanggal' => Carbon::now(),
            'nama_reimbursement' => 'Pembelian Charger',
            'deskripsi' => 'Pembelian charger untuk keperluan kantor',
            'file_pendukung' => '3/nota.png',
            'status' => 'pending',
            'created_at' => Carbon::now(),

        ]);
    }
}
