<!-- begin:: base -->
@extends('admin/base')
<!-- end:: base -->

<!-- begin:: css local -->
@section('css')
@endsection
<!-- end:: css local -->

<!-- begin:: content -->
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- begin:: breadcumb -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ $title }}</h4>
                    <div class="page-title-right">
                        {{ Breadcrumbs::render('admin.profil') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: breadcumb -->
        <!-- begin:: body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#foto" role="tab">
                                    <i class="fa fa-image"></i>
                                    Foto
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#akun" role="tab">
                                    <i class="fa fa-user"></i>
                                    Akun
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#keamanan" role="tab">
                                    <i class="fa fa-user-lock"></i>
                                    Keamanan
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <!-- begin:: foto -->
                            <div class="tab-pane active" id="foto" role="tabpanel">
                                <form id="form-foto" action="{{ route('admin.profil.save_picture') }}" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 align-self-center">
                                            <input type="file" name="i_foto" id="i_foto" />
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ ($user->foto === null) ? '//placehold.co/150' : asset_upload('picture/'.$user->foto) }}" class="img-fluid mx-auto d-block" id="lihat-gambar" alt="Profil" width="200" />
                                            <br>
                                            <div class="text-center">
                                                <button type="submit" id="save-foto" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end:: foto -->
                            <!-- begin:: akun -->
                            <div class="tab-pane" id="akun" role="tabpanel">
                                <form id="form-akun" action="{{ route('admin.profil.save_account') }}" method="POST">
                                    <div class="row mb-3">
                                        <label for="i_nama" class="col-sm-2 col-form-label">Nama&nbsp;*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="i_nama" id="i_nama" value="{{ $user->nama }}" placeholder="Masukkan nama Anda" />
                                            <span class="errorInput"></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="i_email" class="col-sm-2 col-form-label">E-Mail&nbsp;*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="i_email" id="i_email" value="{{ $user->email }}" placeholder="Masukkan e-mail Anda" />
                                            <span class="errorInput"></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="i_username" class="col-sm-2 col-form-label">Username&nbsp;*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="i_username" id="i_username" value="{{ $user->username }}" placeholder="Masukkan username Anda" />
                                            <span class="errorInput"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" id="save-akun" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end:: akun -->
                            <!-- begin:: keamanan -->
                            <div class="tab-pane" id="keamanan" role="tabpanel">
                                <form id="form-keamanan" action="{{ route('admin.profil.save_security') }}" method="POST">
                                    <div class="row mb-3">
                                        <label for="i_nama" class="col-sm-2 col-form-label">Password Lama&nbsp;*</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="i_pass_lama" id="i_pass_lama" placeholder="Masukkan password lama Anda" />
                                            <span class="errorInput"></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="i_email" class="col-sm-2 col-form-label">Password
                                            Baru&nbsp;*</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="i_pass_baru" id="i_pass_baru" placeholder="Masukkan password baru Anda" />
                                            <span class="errorInput"></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="i_username" class="col-sm-2 col-form-label">Ulangin Password
                                            Baru&nbsp;*</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="i_pass_baru_lagi" id="i_pass_baru_lagi" placeholder="Masukkan kembali password Anda" />
                                            <span class="errorInput"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" id="save-keamanan" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end:: keamanan -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: body -->
    </div>
</div>
@endsection
<!-- end:: content -->

<!-- begin:: js local -->
@section('js')
<script type="text/javascript" src="{{ asset_admin('my_assets/parsley/2.9.2/parsley.js') }}"></script>

<script>
    let untukChangePicture = function() {
        $("#i_foto").change(function() {
            cekLokasiFoto(this);
        });
    }();

    let untukSimpanFoto = function() {
        $(document).on('submit', '#form-foto', function(e) {
            e.preventDefault();
            $('#i_foto').attr('required', 'required');

            if ($('#form-foto').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        $('#save-foto').attr('disabled', 'disabled');
                        $('#save-foto').html('<i class="fa fa-spinner"></i>&nbsp;Menunggu...');
                    },
                    success: function(response) {
                        swal(response.title, response.text, response.type, response.button).then((value) => {
                            location.reload();
                        });
                    }
                });
            }
        });
    }();

    let untukSimpanAkun = function() {
        $(document).on('submit', '#form-akun', function(e) {
            e.preventDefault();
            $('#i_nama').attr('required', 'required');
            $('#i_email').attr('required', 'required');
            $('#i_username').attr('required', 'required');

            if ($('#form-akun').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        $('#save-akun').attr('disabled', 'disabled');
                        $('#save-akun').html('<i class="fa fa-spinner"></i>&nbsp;Menunggu...');
                    },
                    success: function(response) {
                        swal(response.title, response.text, response.type, response.button).then((value) => {
                            location.reload();
                        });
                    }
                });
            }
        });
    }();

    let untukSimpanKeamanan = function() {
        $(document).on('submit', '#form-keamanan', function(e) {
            e.preventDefault();
            $('#i_pass_lama').attr('required', 'required');
            $('#i_pass_baru').attr('required', 'required');
            $('#i_pass_baru_lagi').attr('required', 'required');

            if ($('#form-keamanan').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        $('#save-keamanan').attr('disabled', 'disabled');
                        $('#save-keamanan').html(
                            '<i class="fa fa-spinner"></i>&nbsp;Menunggu...');
                    },
                    success: function(response) {
                        swal(response.title, response.text, response.type, response.button).then((value) => {
                            location.reload();
                        });
                    }
                });
            }
        });
    }();

    // untuk baca lokasi gambar
    function cekLokasiFoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function(e) {
                $('#lihat-gambar').attr('src', e.target.result);
            }
        }
    }
</script>
@endsection
<!-- end:: js local -->