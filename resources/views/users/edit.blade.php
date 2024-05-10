@extends('layouts.app')

@section('title', __('Users'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ __('Users') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Detail') }}</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Edit User</h5>
            <a href="{{ route('user.index') }}" class="btn btn-m btn-warning"><i class="ri-arrow-left-circle-line"></i> Kembali</a>
        </div>
    </div>

    <div class="card-body">
    <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post" autocomplete="off">

            @csrf
            <div class="mb-3">
                <label for="name-field" class="form-label">Name</label>
                <input type="text" id="name-field" name="name" value="{{ $user->name }}" class="form-control" placeholder="Enter Name" required />
                <div class="invalid-feedback">Please enter a name.</div>
            </div>

            <div class="mb-3">
                <label for="email-field" class="form-label">Email</label>
                <input type="email" id="email-field" name="email" value="{{ $user->email }}" class="form-control" placeholder="Enter Email" required />
                <div class="invalid-feedback">Please enter an email.</div>
            </div>

            <div class="mb-3">
                <label for="jabatan-field" class="form-label">Jabatan</label>
                <select id="jabatan-field" name="jabatan" class="form-select" required>
                    <option value="">Select Jabatan</option>
                    <option value="finance" {{ $user->jabatan === 'finance' ? 'selected' : '' }}>Finance</option>
                    <option value="staff" {{ $user->jabatan === 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
                <div class="invalid-feedback">Please select a jabatan.</div>
            </div>

            <div class="mb-3">
                <label for="password-field" class="form-label">Password</label>
                <input type="password" id="password-field" name="password" class="form-control" placeholder="Enter Password" required />
                <div class="invalid-feedback">Please enter a password.</div>
            </div>

            <div class="mb-3">
                <label for="nip-field" class="form-label">NIP</label>
                <input type="text" id="nip-field" name="nip" value="{{ $user->nip }}" class="form-control" placeholder="Enter NIP" required />
                <div class="invalid-feedback">Please enter a NIP.</div>
            </div>

            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="add-btn">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
