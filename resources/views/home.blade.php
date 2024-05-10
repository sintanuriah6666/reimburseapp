@extends('layouts.app')

@section('title', 'Home')

@section('breadcrumb')
    @php
        $breadcrumb = [
            [
                'title' => 'Home',
                'active' => true,
                'url' => ''
            ],
        ];
    @endphp

    @foreach ($breadcrumb as $item)
        <li class="breadcrumb-item {{ $item['active'] ? 'active' : '' }}"><a href="{{$item['url']}}">{{ $item['title'] }}</a></li>
    @endforeach
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Halo, selamat datang {{ Auth::user()->jabatan }}<i class="ri-user-heart-line"></i></h3>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h5>Semangat dalam berkarya, tetap disiplin dan bersemangat!</h5>
                        <i class="ri-emotion-line" style="font-size: 3rem;"></i>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <p class="text-center">Today is {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY') }} at {{ \Carbon\Carbon::now()->isoFormat('HH:mm:ss') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
