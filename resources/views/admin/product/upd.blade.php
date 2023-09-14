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
                    <form id="form-add-upd" class="form" action="{{ route('admin.product.save') }}" method="POST" enctype="multipart/form-data">
                        <!-- begin:: id -->
                        <input type="hidden" name="id_product" id="id_product" value="{{ $product->id_product }}" />
                        <!-- end:: id -->

                        <div class="mb-3 row field-input">
                            <label for="judul" class="col-sm-3 col-form-label">Judul&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <input type="text" name="judul" id="judul" class="form-control" value="{{ $product->judul }}" placeholder="Masukkan judul" />
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="id_type" class="col-sm-3 col-form-label">Type&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <select name="id_type" id="id_type" class="form-select select2">
                                    <option value="">Pilih type</option>
                                    @foreach($type as $row)
                                    <option value="{{ $row->id_type }}" {{ ($row->id_type == $product->id_type ? 'selected' : '') }}>{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="id_based" class="col-sm-3 col-form-label">Based&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <select name="id_based" id="id_based" class="form-select select2">
                                    <option value="">Pilih based</option>
                                    @foreach($based as $row)
                                    <option value="{{ $row->id_based }}" {{ ($row->id_based == $product->id_based ? 'selected' : '') }}>{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="id_price" class="col-sm-3 col-form-label">Price&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <select name="id_price" id="id_price" class="form-select select2">
                                    <option value="">Pilih price</option>
                                    @foreach($price as $row)
                                    <option value="{{ $row->id_price }}" {{ ($row->id_price == $product->id_price ? 'selected' : '') }}>{{ ucfirst($row->jenis) }} | {{ rupiah($row->nilai_normal) }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <textarea id="deskripsi" name="deskripsi">{{ $product->deskripsi }}</textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="link_demo" class="col-sm-3 col-form-label">Link Demo</label>
                            <div class="col-md-9 my-auto">
                                <input type="text" name="link_demo" id="link_demo" class="form-control" value="{{ $product->link_demo }}" placeholder="Masukkan link demo" />
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="link_github" class="col-sm-3 col-form-label">Link Github</label>
                            <div class="col-md-9 my-auto">
                                <input type="text" name="link_github" id="link_github" class="form-control" value="{{ $product->link_github }}" placeholder="Masukkan link github" />
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="product_stack" class="col-sm-3 col-form-label">Stack&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <select name="product_stack[]" id="product_stack" class="form-control" multiple="multiple">
                                    <option value="">Pilih stack</option>
                                </select>
                                <span class="invalid-feedback d-block"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="gambar" class="col-sm-3 col-form-label">Gambar&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <div class="row">
                                    <div class="col-lg-3 pt-3 pb-3">
                                        <img src="{{ ($product->gambar === null ? '//placehold.co/150' : asset_upload('picture/'.$product->gambar)) }}" class="img-fluid pb-3" width="300" />
                                    </div>
                                </div>
                                <input type="file" name="gambar" id="gambar" class="form-control" disabled="disabled" />
                                <label style="padding-top: 10px"><input type="checkbox" name="change_picture" id="change_picture" />&nbsp;Ubah Foto!</label>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="mb-3 row field-input">
                            <label for="product_picture" class="col-sm-3 col-form-label">Gambar Detail&nbsp;*</label>
                            <div class="col-md-9 my-auto">
                                <input type="file" name="product_picture[]" id="product_picture" class="form-control" multiple />
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
                            <a href="{{ route('admin.product.index') }}" id="cancel" class="btn btn-warning btn-sm">
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
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>
        let StackChoice;

        CKEDITOR.replace('deskripsi', {
            language: 'en',
        });

        let untukMultipleSelectStack = function() {
            $.get("{{ route('admin.stack.get_all') }}", function(response) {
                StackChoice = new Choices('#product_stack', {
                    removeItemButton: true,
                    removeItems: true,
                    duplicateItems: false,
                    choices: response
                });
            }, 'json');

            $.get("{{ route('admin.product.get_stack_detail', $product->id_product) }}", function(response) {
                StackChoice.setChoiceByValue(response);
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
                                location.href = "{{ route('admin.product.index') }}";
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

        let untukUbahGambar = function() {
            $(document).on('click', '#change_picture', function() {
                var ini = $(this);
                if (ini.is(':checked')) {
                    $("input[name*='gambar']").removeAttr('disabled');
                    $("input[name*='gambar']").attr('id', 'gambar');
                } else {
                    $("input[name*='gambar']").attr('disabled', 'disabled');
                    $("input[name*='gambar']").removeAttr('id');
                    $("input[name*='gambar']").removeAttr('required');
                    ini.parent().parent().find('#error').empty();
                }
            });
        }();

        let untukDetailGambar = function() {
            $.get("{{ route('admin.product.get_picture_detail', $product->id_product) }}", function(response) {
                $.each(response, function(i, item) {
                    var checkGambar = (item.picture === null ? '//placehold.co/150' : `{{ asset_upload('picture/` + item.picture + `') }}`);
                    var html = `<div class="col-lg-3 pt-3 pb-3"><button type="button" data-id="` + item.id_product_picture + `" class="btn btn-danger btn-delete mb-1"><span>&times;</span></button><img class="img-fluid" src="` + checkGambar + `"></div>`;
                    $('.preview-image').append(html);
                });
            }, 'json');
        }();

        let untukPreviewDetailGambar = function() {
            $('#product_picture').on('change', function() {
                multiImgPreview(this, 'div.preview-image');
            });
        }();

        let untukRemoveDetailGambar = function() {
            $(document).on('click', '.btn-remove', function(e) {
                e.preventDefault();
                $(this).parent().remove();

                var id = $(this).data('id');
                var dt = new DataTransfer();
                var input = document.getElementById('product_picture');
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

        let untukDeleteDetailGambar = function() {
            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();

                var ini = $(this);
                var id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: "{{ route('admin.product.del_picture_detail') }}",
                    dataType: 'json',
                    data: {
                        id: ini.data('id'),
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        ini.attr('disabled', 'disabled');
                        ini.html('<i class="fa fa-spinner"></i>');
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
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
                        var html = `<div class="col-lg-3 pt-3 pb-3"><button type="button" data-id="` + a++ + `" class="btn btn-danger btn-remove mb-1"><span>&times;</span></button><img class="img-fluid" src="` + e.target.result + `"></div>`;
                        $('.preview-image').append(html);
                    }
                }
            }
        }
    </script>
    @endpush
    <!-- end:: js local -->
</x-admin-layout>