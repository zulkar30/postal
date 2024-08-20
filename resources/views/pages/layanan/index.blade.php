@extends('layouts.app')

{{-- set title --}}
@section('title', 'Layanan')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- error --}}
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
                    <h3 class="content-header-title mb-0 d-inline-block">Layanan</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">Layanan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            @can('layanan_create')
                <div class="content-body">
                    <section id="add-home">
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-header bg-success text-white">
                                        <a data-action="collapse">
                                            <h4 class="card-title text-white">Tambah Data</h4>
                                            <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="card-content collapse hide">
                                        <div class="card-body card-dashboard">

                                            <form class="form form-horizontal" action="{{ route('layanan.store') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-body">
                                                    <div class="form-section">
                                                        <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                            anda menekan tombol submit.</p>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="lansia_id">Nama Lansia
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="lansia_id" id="lansia_id"
                                                                class="form-control select2">
                                                                <option value="" disabled selected>Pilih Lansia</option>
                                                                @foreach ($lansia as $key => $lansia_item)
                                                                    <option value="{{ $lansia_item->id }}">
                                                                        {{ $lansia_item->nama }}</option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('lansia_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('lansia_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="berat_badan">Berat Badan
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="berat_badan" name="berat_badan"
                                                                class="form-control" placeholder="Berat Badan"
                                                                value="{{ old('berat_badan') }}" autocomplete="off" required>

                                                            @if ($errors->has('berat_badan'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('berat_badan') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="tinggi_badan">Tinggi Badan
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="tinggi_badan" name="tinggi_badan"
                                                                class="form-control" placeholder="Tinggi Badan"
                                                                value="{{ old('tinggi_badan') }}" autocomplete="off" required>

                                                            @if ($errors->has('tinggi_badan'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('tinggi_badan') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="tekanan_darah">Tekanan Darah
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="tekanan_darah" name="tekanan_darah"
                                                                class="form-control" placeholder="Tekanan Darah"
                                                                value="{{ old('tekanan_darah') }}" autocomplete="off" required>

                                                            @if ($errors->has('tekanan_darah'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('tekanan_darah') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="keluhan">Keluhan <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="keluhan" name="keluhan"
                                                                class="form-control" placeholder="Keluhan"
                                                                value="{{ old('keluhan') }}" autocomplete="off" required>

                                                            @if ($errors->has('keluhan'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('keluhan') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        @if (isset($loggedInUser->petugas_id))
                                                            <label class="col-md-3 label-control">Nama Dokter</label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input name="petugas_id" id="petugas_id" type="hidden"
                                                                    value="{{ $loggedInUser->petugas->id }}">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $loggedInUser->petugas->nama }}" readonly>
                                                            </div>
                                                        @else
                                                            <label class="col-md-3 label-control">Nama Kader</label>
                                                            <div class="col-md-9 mx-auto">
                                                                <input name="user_id" id="user_id" type="hidden"
                                                                    value="{{ $loggedInUser->id }}">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $loggedInUser->name }}" readonly>
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>

                                                <div class="form-actions text-right">
                                                    <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                        onclick="return confirm('Are you sure want to save this data ?')">
                                                        <i class="la la-check-square-o"></i> Submit
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            @endcan

            {{-- table card --}}
            @can('lay_kader')
                <div class="content-body">
                    <section id="table-home">
                        {{-- Filter Nama Lansia --}}
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="filter-lansia">Filter Lansia:</label>
                                    <select id="filter-lansia" class="form-control">
                                        <option value="">Pilih Lansia</option>
                                        @foreach ($lansia as $lansia_item)
                                            <option value="{{ $lansia_item->nama }}">{{ $lansia_item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Filter Bulan -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="filter-bulan">Filter Bulan:</label>
                                    <select id="filter-bulan" class="form-control">
                                        <option value="">Pilih Bulan</option>
                                        @foreach (range(1, 12) as $month)
                                            <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 10)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Layanan List Untuk Kader</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <div class="table-responsive">
                                                <div class="buttons-wrapper">
                                                    <!-- Buttons container will be appended here -->
                                                </div>
                                                <table
                                                    class="table table-striped table-bordered text-inputs-searching default-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Nama Lansia</th>
                                                            <th>Berat Badan</th>
                                                            <th>Tinggi Badan</th>
                                                            <th>Tekanan Darah</th>
                                                            <th>Keluhan</th>
                                                            <th>Kader/Dokter</th>
                                                            <th>Aksi Kader</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table-body">
                                                        @forelse($layanan as $key => $layanan_item)
                                                            <tr data-entry-id="{{ $layanan_item->id }}">
                                                                <td>{{ date('d/m/Y', strtotime($layanan_item->created_at)) ?? '' }}
                                                                </td>
                                                                <td>{{ $layanan_item->lansia->nama ?? '' }}</td>
                                                                <td>{{ $layanan_item->berat_badan . ' KG' ?? '' }}</td>
                                                                <td>{{ $layanan_item->tinggi_badan . ' CM' ?? '' }}</td>
                                                                <td>{{ $layanan_item->tekanan_darah . ' mmHg' ?? '' }}</td>
                                                                <td>{{ $layanan_item->keluhan ?? '' }}</td>
                                                                <td>{{ $layanan_item->petugas->nama ?? $layanan_item->user->name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @can('layanan_edit')
                                                                        <a href="{{ route('layanan.edit', $layanan_item->id) }}"
                                                                            class="badge badge-warning"
                                                                            data-tooltip="Tooltip on top" title="Edit">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z">
                                                                                </path>
                                                                            </svg>
                                                                        </a>
                                                                    @endcan
                                                                    @can('layanan_delete')
                                                                        <a href="#" class="badge badge-danger"
                                                                            data-tooltip="Tooltip on top" title="Hapus"
                                                                            onclick="deletelayanan({{ $layanan_item->id }})">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                                                                </path>
                                                                                <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                                            </svg>
                                                                        </a>
                                                                    @endcan
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            {{-- not found --}}
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Nama Lansia</th>
                                                            <th>Berat Badan</th>
                                                            <th>Tinggi Badan</th>
                                                            <th>Tekanan Darah</th>
                                                            <th>Keluhan</th>
                                                            <th>Kader/Dokter</th>
                                                            <th>Aksi Kader</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endcan

            @can('lay_dokter')
                <div class="content-body">
                    <section id="table-home">
                        {{-- Filter Nama Lansia --}}
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="filter-lansia">Filter Lansia:</label>
                                    <select id="filter-lansia" class="form-control">
                                        <option value="">Pilih Lansia</option>
                                        @foreach ($lansia as $lansia_item)
                                            <option value="{{ $lansia_item->nama }}">{{ $lansia_item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Filter Bulan -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="filter-bulan">Filter Bulan:</label>
                                    <select id="filter-bulan" class="form-control">
                                        <option value="">Pilih Bulan</option>
                                        @foreach (range(1, 12) as $month)
                                            <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 10)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Layanan List Untuk Dokter</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">

                                            <div class="table-responsive">
                                                <div class="buttons-wrapper">
                                                    <!-- Buttons container will be appended here -->
                                                </div>
                                                <table
                                                    class="table table-striped table-bordered text-inputs-searching default-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Nama Lansia</th>
                                                            <th>Berat Badan</th>
                                                            <th>Tinggi Badan</th>
                                                            <th>Tekanan Darah</th>
                                                            <th>Keluhan</th>
                                                            <th>Kader/Dokter</th>
                                                            <th>Aksi Dokter</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($layanan as $key => $layanan_item)
                                                            <tr data-entry-id="{{ $layanan_item->id }}">
                                                                <td>{{ date('d/m/Y', strtotime($layanan_item->created_at)) ?? '' }}
                                                                </td>
                                                                <td>{{ $layanan_item->lansia->nama ?? '' }}</td>
                                                                <td>{{ $layanan_item->berat_badan . ' KG' ?? '' }}</td>
                                                                <td>{{ $layanan_item->tinggi_badan . ' CM' ?? '' }}</td>
                                                                <td>{{ $layanan_item->tekanan_darah . ' mmHg' ?? '' }}
                                                                </td>
                                                                <td>{{ $layanan_item->keluhan ?? '' }}</td>
                                                                <td>{{ $layanan_item->petugas->nama ?? '' }}</td>
                                                                <td class="text-center">
                                                                    @can('layanan_edit')
                                                                        <a href="{{ route('layanan.edit', $layanan_item->id) }}"
                                                                            class="badge badge-warning"
                                                                            data-tooltip="Tooltip on top" title="Edit"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z">
                                                                                </path>
                                                                            </svg></a>
                                                                    @endcan
                                                                    @can('layanan_delete')
                                                                        <a href="#" class="badge badge-danger"
                                                                            data-tooltip="Tooltip on top" title="Hapus"
                                                                            onclick="deletelayanan({{ $layanan_item->id }})"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                                                                </path>
                                                                                <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                                            </svg></a>
                                                                    @endcan
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            {{-- not found --}}
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Nama Lansia</th>
                                                            <th>Berat Badan</th>
                                                            <th>Tinggi Badan</th>
                                                            <th>Tekanan Darah</th>
                                                            <th>Keluhan</th>
                                                            <th>Kader/Dokter</th>
                                                            <th>Aksi Dokter</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endcan

            @can('lay_lansia')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Filter Bulan -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="filter-bulan">Filter Bulan:</label>
                                    <select id="filter-bulan" class="form-control">
                                        <option value="">Pilih Bulan</option>
                                        @foreach (range(1, 12) as $month)
                                            <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 10)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Layanan List Untuk Lansia</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">

                                            <div class="table-responsive">
                                                <table
                                                    class="table table-striped table-bordered text-inputs-searching default-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Nama Lansia</th>
                                                            <th>Berat Badan</th>
                                                            <th>Tinggi Badan</th>
                                                            <th>Tekanan Darah</th>
                                                            <th>Keluhan</th>
                                                            <th>Kader/Dokter</th>
                                                            <th>Aksi Lansia</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($layananLansia as $key => $layananLansia_item)
                                                            <tr data-entry-id="{{ $layananLansia_item->id }}">
                                                                <td>{{ date('d/m/Y', strtotime($layananLansia_item->created_at)) ?? '' }}
                                                                </td>
                                                                <td>{{ $layananLansia_item->lansia->nama ?? '' }}</td>
                                                                <td>{{ $layananLansia_item->berat_badan . ' KG' ?? '' }}</td>
                                                                <td>{{ $layananLansia_item->tinggi_badan . ' CM' ?? '' }}</td>
                                                                <td>{{ $layananLansia_item->tekanan_darah . ' mmHg' ?? '' }}
                                                                </td>
                                                                <td>{{ $layananLansia_item->keluhan ?? '' }}</td>
                                                                <td>{{ $layananLansia_item->petugas->nama ?? $layananLansia_item->user->name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @can('layanan_show')
                                                                        <a href="#"
                                                                            onclick="printLayanan({{ $layananLansia_item->id }})"
                                                                            title="Print" class="badge badge-warning"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M19 7h-1V2H6v5H5c-1.654 0-3 1.346-3 3v7c0 1.103.897 2 2 2h2v3h12v-3h2c1.103 0 2-.897 2-2v-7c0-1.654-1.346-3-3-3zM8 4h8v3H8V4zm8 16H8v-4h8v4zm4-3h-2v-3H6v3H4v-7c0-.551.449-1 1-1h14c.552 0 1 .449 1 1v7z">
                                                                                </path>
                                                                                <path d="M14 10h4v2h-4z"></path>
                                                                            </svg>
                                                                        </a>
                                                                    @endcan
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            {{-- not found --}}
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Nama Lansia</th>
                                                            <th>Berat Badan</th>
                                                            <th>Tinggi Badan</th>
                                                            <th>Tekanan Darah</th>
                                                            <th>Keluhan</th>
                                                            <th>Kader/Dokter</th>
                                                            <th>Aksi Lansia</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endcan

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
    </style>
@endpush

@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script src="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js') }}" type="text/javascript">
    </script>

    <script>
        jQuery(document).ready(function($) {
            $('#mymodal').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });

            $('.select-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })

            $('.deselect-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })
        });

        $(document).ready(function() {
            // Cek jika DataTable sudah diinisialisasi
            if ($.fn.DataTable.isDataTable('.default-table')) {
                $('.default-table').DataTable().destroy();
            }

            // Inisialisasi ulang DataTable
            var dataTable = $('.default-table').DataTable({
                "order": [],
                "paging": true,
                "lengthMenu": [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],
                "pageLength": 10
            });

            // Inisialisasi DataTable Buttons
            new $.fn.dataTable.Buttons(dataTable, {
                buttons: [{
                        extend: 'colvis',
                        text: 'Visibility'
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title: 'Rekap Hasil Pemeriksaan Lansia',
                        exportOptions: {
                            columns: ':visible:not(:last-child)',
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        title: 'Rekap Hasil Pemeriksaan Lansia',
                        exportOptions: {
                            columns: ':visible:not(:last-child)',
                        }
                    }
                ],
                exportData: {
                    stripHtml: false
                }
            }).container().appendTo($('.buttons-wrapper'));

            // Filter data berdasarkan lansia
            $('#filter-lansia').on('change', function() {
                var selectedLansia = $(this).val();
                dataTable.column(1).search(selectedLansia).draw();
            });

            // Filter data berdasarkan bulan
            $('#filter-bulan').on('change', function() {
                var selectedMonth = $(this).val();
                var searchValue = selectedMonth ? `/0?${selectedMonth}/` : '';

                // Pastikan DataTable mencari berdasarkan bulan yang sesuai di kolom tanggal
                dataTable.column(0).search(searchValue, true, false).draw();
            });
        });




        $(function() {
            $(":input").inputmask();
        });

        // fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });

        function deletelayanan(layananId) {
            if (confirm('Anda yakin ingin menghapus layanan ini?')) {
                var form = document.createElement('form');
                form.action = '{{ route('layanan.destroy', '__id') }}'.replace('__id', layananId);
                form.method = 'POST';
                form.style.display = 'none';

                var tokenInput = document.createElement('input');
                tokenInput.type = 'hidden';
                tokenInput.name = '_token';
                tokenInput.value = '{{ csrf_token() }}';

                var methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';

                form.appendChild(tokenInput);
                form.appendChild(methodInput);
                document.body.appendChild(form);

                form.submit();
            }
        }

        function printLayanan(id) {
            window.open("{{ url('layanan/print') }}/" + id, '_blank');
        }
    </script>

    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="btn close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa spin"></i>
                </div>
            </div>
        </div>
    </div>
@endpush
