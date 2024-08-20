@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Lansia')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Lansia</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Lansia</li>
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
                                            action="{{ route('lansia.update', [$lansia->id]) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Lansia</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="nama">Nama <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="nama" name="nama"
                                                            class="form-control" placeholder="Nama Lengkap"
                                                            value="{{ old('nama', isset($lansia) ? $lansia->nama : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('nama'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('nama') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="email">Email <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="email" name="email"
                                                            class="form-control" placeholder="Email Valid"
                                                            value="{{ old('email', isset($lansia) ? $lansia->user->email : '') }}"
                                                            autocomplete="off" data-inputmask="'alias': 'email'" required>

                                                        @if ($errors->has('email'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('email') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="telegram_username">Telegram
                                                        Username <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="telegram_username"
                                                            name="telegram_username" class="form-control"
                                                            placeholder="Telegram Username Valid"
                                                            value="{{ old('telegram_username', isset($lansia) ? $lansia->telegram_username : '') }}"
                                                            required>

                                                        @if ($errors->has('telegram_username'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('telegram_username') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="nik">NIK <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="nik" name="nik"
                                                            class="form-control" placeholder="NIK"
                                                            value="{{ old('nik', isset($lansia) ? $lansia->nik : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('nik'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('nik') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Jenis Kelamin <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="jenis_kelamin" id="jenis_kelamin"
                                                            class="form-control select2" required>
                                                            <option
                                                                value="{{ old('jenis_kelamin', isset($lansia) ? $lansia->jenis_kelamin : '') }}"
                                                                disabled selected>
                                                                @if ($lansia->jenis_kelamin == 'laki-laki')
                                                                    <span>Laki-laki</span>
                                                                @else
                                                                    <span>Perempuan</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Laki-laki</option>
                                                            <option value="2">Perempuan</option>
                                                        </select>

                                                        @if ($errors->has('jenis_kelamin'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('jenis_kelamin') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="no_hp">NO HP <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="no_hp" name="no_hp"
                                                            class="form-control" placeholder="NO HP"
                                                            value="{{ old('no_hp', isset($lansia) ? $lansia->no_hp : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('no_hp'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('no_hp') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="tempat_lahir">Tempat Lahir
                                                        <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="tempat_lahir" name="tempat_lahir"
                                                            class="form-control" placeholder="Tempat Lahir"
                                                            value="{{ old('tempat_lahir', isset($lansia) ? $lansia->tempat_lahir : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('tempat_lahir'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('tempat_lahir') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="tanggal_lahir">Tanggal
                                                        Lahir <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                                            class="form-control" placeholder="Tanggal Lahir"
                                                            value="{{ old('tanggal_lahir', isset($lansia) ? $lansia->tanggal_lahir : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('tanggal_lahir'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('tanggal_lahir') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="foto">Foto <code
                                                            style="color:green;">optional</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <div class="custom-file">
                                                            <input type="file"
                                                                accept="image/png, image/svg, image/jpeg"
                                                                class="custom-file-input" id="foto" name="foto">
                                                            <label class="custom-file-label" for="foto"
                                                                aria-describedby="foto">{{ isset($lansia->foto) ? basename($lansia->foto) : 'Pilih Foto' }}</label>
                                                        </div>

                                                        <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                mengunggah 1 file</small><small> dan yang dapat digunakan
                                                                JPEG, SVG, PNG & resolusi harus 100x100, Maksimal ukuran
                                                                file hanya 10
                                                                MegaBytes</small></p>

                                                        @if ($errors->has('foto'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('foto') }}</p>
                                                        @endif

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions text-right">
                                                <a href="{{ route('lansia.index') }}" style="width:120px;"
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
