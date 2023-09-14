<x-admin-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset_admin('libs/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset_admin('libs/choices.js/public/assets/styles/choices.min.css') }}" />
    @endpush
    <!-- end:: css local -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-transparent border-bottom align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ $title }}</h4>
                </div>
                <div class="card-body">
                    <form id="form-add-upd" class="form" action="{{ route('admin.project.save') }}" method="POST" enctype="multipart/form-data">
                        <!-- begin:: id -->
                        <input type="hidden" name="id_project" id="id_project" />
                        <!-- end:: id -->

                        <div class="mb-3 row field-input">
                            <label for="judul" class="col-sm-3 col-form-label">Judul&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul" />
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="id_based" class="col-sm-3 col-form-label">Based&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <select name="id_based" id="id_based" class="form-select select2">
                                    <option value="">Pilih based</option>
                                    @foreach($based as $row)
                                    <option value="{{ $row->id_based }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="project_stack" class="col-sm-3 col-form-label">Stack&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <select name="project_stack[]" id="project_stack" class="form-control" multiple="multiple">
                                    <option value="">Pilih stack</option>
                                </select>
                                <span class="invalid-feedback d-block"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="gambar" class="col-sm-3 col-form-label">Gambar&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <input type="file" name="gambar" id="gambar" class="form-control" />
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="project_picture" class="col-sm-3 col-form-label">Gambar Detail&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <input type="file" name="project_picture[]" id="project_picture" class="form-control" multiple />
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3"></label>
                            <div class="col-lg-9">
                                <div class="mt-1 text-center">
                                    <div class="preview-image row"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <a href="{{ route('admin.project.index') }}" id="cancel" class="btn btn-warning btn-sm">
                                <i class="fa fa-times"></i>&nbsp;Batal
                            </a>
                            <button type="submit" id="save" class="btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- begin:: js local -->
    @push('js')
    <script type="text/javascript" src="{{ asset_admin('my_assets/parsley/2.9.2/parsley.js') }}"></script>
    <script type="text/javascript" src="{{ asset_admin('libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset_admin('libs/select2/js/select2.full.min.js') }}"></script>

    <script>
        let untukMultipleSelectStack = function() {
            $.get("{{ route('admin.stack.get_all') }}", function(response) {
                new Choices('#project_stack', {
                    removeItemButton: true,
                    removeItems: true,
                    duplicateItems: false,
                    choices: response
                });
            }, 'json');
        }();

        let untukSelectBased = function() {
            $("#id_based").select2({
                placeholder: "Pilih based",
                width: '100%',
                allowClear: true,
            });
        }();

        let untukSimpanData = function() {
            $(document).on('submit', '#form-add-upd', function(e) {
                e.preventDefault();

                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#save').attr('disabled', 'disabled');
                        $('#save').html('<i class="fa fa-spinner fa-spin"></i>&nbsp;Menunggu...');
                    },
                    success: function(response) {
                        if (response.type === 'success') {
                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                icon: response.type,
                                confirmButtonText: response.button,
                                customClass: {
                                    confirmButton: `btn btn-sm btn-${response.class}`,
                                },
                                buttonsStyling: false,
                            }).then((value) => {
                                location.href = "{{ route('admin.project.index') }}";
                            });
                        } else {
                            $.each(response.errors, function(key, value) {
                                if (key) {
                                    if (($('#' + key).prop('tagName') === 'INPUT' || $('#' + key).prop('tagName') === 'TEXTAREA')) {
                                        $('#' + key).addClass('is-invalid');
                                        $('#' + key).parents('.field-input').find('.invalid-feedback').html(value);
                                    } else if ($('#' + key).prop('tagName') === 'SELECT') {
                                        $('#' + key).addClass('is-invalid');
                                        $('#' + key).parents('.field-input').find('.invalid-feedback').html(value);
                                    }
                                }
                            });

                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                icon: response.type,
                                confirmButtonText: response.button,
                                customClass: {
                                    confirmButton: `btn btn-sm btn-${response.class}`,
                                },
                                buttonsStyling: false,
                            });
                        }

                        $('#save').removeAttr('disabled');
                        $('#save').html('<i class="fa fa-save"></i>&nbsp;Simpan');
                    }
                });
            });

            $(document).on('keyup', '#form-add-upd input', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('change', '#form-add-upd select', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('keyup', '#form-add-upd textarea', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('change', '#form-add-upd input[type="file"]', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });
        }();

        let untukPreviewDetailGambar = function() {
            $('#project_picture').on('change', function() {
                multiImgPreview(this, 'div.preview-image');
            });
        }();

        let untukRemoveDetailGambar = function() {
            $(document).on('click', '.btn-remove', function(e) {
                e.preventDefault();
                $(this).parent().remove();

                var id = $(this).data('id');
                var dt = new DataTransfer();
                var input = document.getElementById('project_picture');
                var {
                    files
                } = input;

                for (let i = 0; i < files.length; i++) {
                    var file = files[i];
                    if (id !== i) {
                        dt.items.add(file)
                    }
                }

                input.files = dt.files
            });
        }();

        function multiImgPreview(input, element) {
            if (input.files && input.files[0]) {
                var filesAmount = input.files.length;
                var a = 0;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.readAsDataURL(input.files[i]);
                    reader.onload = function(e) {
                        var html = `<div class="col-lg-3"><button type="button" data-id="` + a++ + `" class="btn btn-danger btn-remove mb-1"><span>&times;</span></button><img class="img-fluid" src="` + e.target.result + `"></div>`;
                        $('.preview-image').append(html);
                    }
                }
            }
        }
    </script>
    @endpush
    <!-- end:: js local -->
</x-admin-layout>