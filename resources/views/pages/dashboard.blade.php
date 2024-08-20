@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- show error --}}
            @if ($errors->any())
                <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Dashboard</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Aktifitas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">

                @can('lay_kader')
                    <h3 class="content-header-title mb-1 d-inline-block">Manajemen Akses</h3>
                    <div class="row d-flex">
                        {{-- User --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('user.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Akun</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users . ' Akun' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <h3 class="content-header-title mb-1 d-inline-block">Master Data</h3>
                    <div class="row d-flex">
                        {{-- Akses --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('permission') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Akses</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $permissions . ' Akses' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        {{-- Peran --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('role') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Peran</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $roles . ' Peran' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endcan

                @can('lay_kader')
                    <h3 class="content-header-title mb-1 d-inline-block">Operasional Kader</h3>
                    <div class="row d-flex">

                        {{-- Dokter --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('petugas.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Dokter</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $petugases . ' Dokter' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Jadwal --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('jadwal.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Jadwal</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $jadwals . ' jadwal' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Lansia --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('lansia.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Lansia</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $lansias . ' Lansia' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Layanan --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('layanan.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Layanan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $layanans . ' Layanan' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endcan

                @can('lay_dokter')
                    <h3 class="content-header-title mb-1 d-inline-block">Operasional Dokter</h3>
                    <div class="row d-flex">

                        {{-- Dokter --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('petugas.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Dokter</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $petugases . ' Dokter' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Jadwal --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('jadwal.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Jadwal</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $jadwals . ' jadwal' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Lansia --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('lansia.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Lansia</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $lansias . ' Lansia' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Layanan --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('layanan.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Layanan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $jumlahlayananPetugas . ' Layanan' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endcan

                @can('lay_lansia')
                    <h3 class="content-header-title mb-1 d-inline-block">Operasional Lansia</h3>
                    <div class="row d-flex">

                        {{-- Jadwal --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('jadwal.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Jadwal</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $jadwals . ' jadwal' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- Layanan --}}
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('layanan.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Layanan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $jumlahlayananLansia . ' Layanan' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endcan

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css') }}">

    <style>
        .label {
            cursor: pointer;
        }

        .img-container img {
            max-width: 100%;
        }

        .img-thumbnail {
            width: 100px;
            height: auto;
        }

        @media (max-width: 500px) {
            .col-sm-2 {
                width: 30%;
            }

            .row.justify-content-center .col-sm-2 {
                margin: 0 auto;
            }
        }
    </style>
@endpush

@push('after-script')
    <script src="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js') }}" type="text/javascript">
    </script>

    <script>
        $('.default-table').DataTable({
            "order": [],
            "paging": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "pageLength": 10
        });

        // fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });

        $(document).ready(function() {
            $('[data-tooltip]').tooltip();
        });
    </script>
@endpush
