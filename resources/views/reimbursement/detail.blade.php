@extends('layouts.app')

@section('title', __('Detail Reimbursement'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('reimbursement.index') }}">{{ __('Reimbursements') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Detail') }}</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Detail Reimbursement</h5>
            <a href="{{ route('reimbursement.index') }}" class="btn btn-m btn-warning"><i class="ri-arrow-left-circle-line"></i> Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <div class="mb-3">
            <label for="nama_reimbursement" class="form-label">Nama Reimbursement</label>
            <input type="text" class="form-control" id="nama_reimbursement" name="nama_reimbursement" value="{{ $reimbursement->nama_reimbursement }}" readonly>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Detail Reimbursement</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" readonly>{{ $reimbursement->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="created_at" class="form-label">Di Ajukan</label>
            <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $reimbursement->created_at }}" readonly>
        </div>
        <div class="mb-3">
            <label for="created_at" class="form-label">Status saat ini</label>
            <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $reimbursement->status }}" readonly>
        </div>
        <div class="mb-3">
            <label for="file_pendukung" class="form-label">File Pendukung</label>
            <div>
                @if($reimbursement->file_pendukung)
                    <a href="{{ asset('storage/'. $reimbursement->file_pendukung) }}" target="_blank" class="btn btn-sm btn-primary"><i class="ri-file-2-line"></i> Lihat File</a>
                @else
                    <span class="badge bg-danger">No File</span>
                @endif
            </div>
        </div>
        <div class="mb-3">
        @if(auth()->user()->jabatan == 'direktur')
        @if($reimbursement->status == 'pending')
            <a href="{{ route('reimbursement.approved', ['id' => $reimbursement->id]) }}" class="btn btn-m btn-success">Disetujui</a>
            <a href="{{ route('reimbursement.rejected', ['id' => $reimbursement->id]) }}" class="btn btn-m btn-danger">Ditolak</a>
        @endif
        @elseif(auth()->user()->jabatan == 'finance')
            @if($reimbursement->status == 'confirmed')
                <a href="{{ route('reimbursement.paid', ['id' => $reimbursement->id]) }}" class="btn btn-m btn-success">Setujui dan lakukan pembayaran</a>
                <a href="{{ route('reimbursement.rejected', ['id' => $reimbursement->id]) }}" class="btn btn-m btn-danger">Tidak disetujui</a>
            @endif
        @endif
    </div>

    </div>
</div>
@endsection
