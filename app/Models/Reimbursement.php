<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reimbursement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'tanggal',
        'nama_reimbursement',
        'deskripsi',
        'file_pendukung',
        'status',
        'keterangan_rejected',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
