@extends('layouts.app')

@section('title', __('Reimbursement'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('reimbursement.index') }}">{{ __('Reimbursements') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Add') }}</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Add Reimbursement</h5>
            <a href="{{ route('reimbursement.index') }}" class="btn btn-m btn-warning"><i class="ri-arrow-left-circle-line"></i> Back</a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('reimbursement.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required />
                <div class="invalid-feedback">Please enter a date.</div>
            </div>

            <div class="mb-3">
                <label for="nama_reimbursement" class="form-label">Nama Reimbursement</label>
                <input type="text" id="nama_reimbursement" name="nama_reimbursement" class="form-control" placeholder="Enter Nama Reimbursement" required />
                <div class="invalid-feedback">Please enter a nama reimbursement.</div>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" required></textarea>
                <div class="invalid-feedback">Please enter a deskripsi.</div>
            </div>

            <div class="mb-3">
                <label for="file_pendukung" class="form-label">File Pendukung</label>
                <input type="file" id="file_pendukung" name="file_pendukung" class="form-control" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" />
                <div class="invalid-feedback">Please upload a file.</div>
            </div>

            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="add-btn">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
