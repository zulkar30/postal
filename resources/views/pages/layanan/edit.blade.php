@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Layanan')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Layanan</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Layanan</li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- forms --}}
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Form Input</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                anda menekan tombol submit.</p>
                                        </div>

                                        <form class="form form-horizontal"
                                            action="{{ route('layanan.update', [$layanan->id]) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Layanan</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="lansia_id">Nama Lansia
                                                        <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="lansia_id" id="lansia_id"
                                                            class="form-control select2">
                                                            <option
                                                                value="{{ old('lansia_id', isset($layanan) ? $layanan->lansia_id : '') }}"
                                                                disabled selected>{{ $layanan->lansia->nama }}</option>
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
                                                            value="{{ old('berat_badan', isset($layanan) ? $layanan->berat_badan : '') }}"
                                                            autocomplete="off" required>

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
                                                            value="{{ old('tinggi_badan', isset($layanan) ? $layanan->tinggi_badan : '') }}"
                                                            autocomplete="off" required>

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
                                                            value="{{ old('tekanan_darah', isset($layanan) ? $layanan->tekanan_darah : '') }}"
                                                            autocomplete="off" required>

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
                                                            value="{{ old('keluhan', isset($layanan) ? $layanan->keluhan : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('keluhan'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('keluhan') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Nama Petugas</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input name="petugas_id" id="petugas_id" type="hidden"
                                                            value="{{ isset($layanan) ? $layanan->petugas_id : $loggedInUser->petugas->id ?? '' }}">
                                                        <input type="text" class="form-control"
                                                            value="{{ isset($layanan) ? $layanan->petugas->nama : $loggedInUser->petugas->nama ?? '' }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions text-right">
                                                <a href="{{ route('layanan.index') }}" style="width:120px;"
                                                    class="btn bg-blue-grey text-white mr-1"
                                                    onclick="return confirm('Are you sure want to close this page? , Any changes you make will not be saved.')">
                                                    <i class="ft-x"></i> Batal
                                                </a>
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

        </div>
    </div>
    <!-- END: Content-->

@endsection


@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script>
        jQuery(document).ready(function($) {
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

        $(function() {
            $(":input").inputmask();
        });
    </script>
@endpush
