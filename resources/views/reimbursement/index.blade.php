@extends('layouts.app')

@section('title', __('Reimbursement'))

@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('Reimbursement') }}</li>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                        @if(auth()->user()->jabatan === 'staff')
                            <div>
                                <a href="{{ route('reimbursement.create') }}" class="btn btn-success add-btn">
                                    <i class="ri-add-line align-bottom me-1"></i> Add
                                </a>
                            </div>
                            @endif
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
                                    <th>Nama Karyawan</th>
                                    <th>Tanggal</th>
                                    <th>Nama Reimbursement</th>
                                    <th>File Pendukung</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($reimbursements as $key => $reimbursement)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $reimbursement->user->name }}</td>
                                    <td>{{ $reimbursement->tanggal }}</td>
                                    <td>{{ $reimbursement->nama_reimbursement }}</td>
                                    <td>
                                        @if($reimbursement->file_pendukung)
                                            <a href="{{ asset('storage/'. $reimbursement->file_pendukung) }}" target="_blank" class="btn btn-sm btn-primary"><i class="ri-file-2-line"></i></a>
                                        @else
                                            <span class="badge bg-danger">No File</span>
                                        @endif
                                    </td>
                                    @if($reimbursement->status == 'pending')
                                        <td><span class="badge bg-warning">Waiting approve directur</span></td>
                                    @elseif($reimbursement->status == 'rejected')
                                        <td><span class="badge bg-danger">Rejected</span></td>
                                    @elseif($reimbursement->status == 'confirmed')
                                        <td><span class="badge bg-info">Waiting approve for payment</span></td>
                                    @elseif($reimbursement->status == 'paid')
                                        <td><span class="badge bg-success">Done paid</span></td>
                                    @endif

                                    <td>
                                        <div class="d-flex gap-2">
                                            @if(auth()->user()->jabatan === 'staff')
                                                @if($reimbursement->status == 'pending')
                                                <div class="delete">
                                                    <form action="{{ route('reimbursement.destroy', ['id' => $reimbursement->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </div>
                                                @else 
                                                <div class="edit">
                                                    <a href="{{ route('reimbursement.detail', ['id' => $reimbursement->id]) }}" class="btn btn-sm btn-success">Detail</a>
                                                </div>
                                                @endif
                                            @else
                                                <div class="edit">
                                                    <a href="{{ route('reimbursement.detail', ['id' => $reimbursement->id]) }}" class="btn btn-sm btn-success">Detail</a>
                                                </div>
                                            @endif
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
