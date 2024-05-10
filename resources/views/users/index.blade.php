@extends('layouts.app')

@section('title', __('Users'))

@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('Users') }}</li>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <a href="{{ route('user.store') }}" class="btn btn-success add-btn">
                                    <i class="ri-add-line align-bottom me-1"></i> Add
                                </a>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Akun dibuat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->nip }}</td>
                                    <td>{{ $user->jabatan }}</td>
                                    <td>{{ $user->created_at->format('d M, Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                        <div class="edit">
                                                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-success">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger remove-item-btn">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
