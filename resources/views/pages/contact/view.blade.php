<!-- begin:: base -->
@extends('pages/base')
<!-- end:: base -->

<!-- begin:: css local -->
@section('css')
@endsection
<!-- end:: css local -->

<!-- begin:: content -->
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5">
        <!-- begin:: breadcrumb -->
        <div class="mb-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3>{{ $title }}</h4>
                    <div class="fs-6">
                        <nav aria-label="breadcrumb">
                            {{ Breadcrumbs::render(Route::currentRouteName()) }}
                        </nav>
                    </div>
            </div>
        </div>
        <!-- end:: breadcrumb -->

        <!-- begin:: content -->
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-12">
                <p>
                    {{ __('contact.text_1') }}
                </p>

                <form id="form-contact" action="{{ route('contact.save') }}" method="post">
                    <div class="mb-3 field-input">
                        <label for="nama" class="form-label">{{ __('contact.label_1') }}&nbsp;*</label>
                        <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="{{ __('contact.input_1') }}">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="mb-3 field-input">
                        <label for="email" class="form-label">{{ __('contact.label_2') }}&nbsp;*</label>
                        <input type="text" class="form-control form-control-sm" name="email" id="email" placeholder="{{ __('contact.input_2') }}">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="mb-3 field-input">
                        <label for="judul" class="form-label">{{ __('contact.label_3') }}&nbsp;*</label>
                        <input type="text" class="form-control form-control-sm" name="judul" id="judul" placeholder="{{ __('contact.input_3') }}">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="mb-3 field-input">
                        <label for="pesan" class="form-label">{{ __('contact.label_4') }}&nbsp;*</label>
                        <textarea class="form-control form-control-sm" name="pesan" id="pesan" placeholder="{{ __('contact.input_4') }}"></textarea>
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" id="submit" class="btn btn-primary">{{ __('contact.button') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- end:: content -->

<!-- begin:: js local -->
@section('js')
<script>
    let untukSubmit = function() {
        $(document).on('submit', '#form-contact', function(e) {
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
                    $('#submit').attr('disabled', 'disabled');
                    $('#submit').html('Menunggu...');
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
                            $('#form-contact').find('input, textarea, select').removeClass('is-valid');
                            $('#form-contact').find('input, textarea, select').removeClass('is-invalid');

                            $('#form-contact').parsley().destroy();
                            $('#form-contact').parsley().reset();
                            $('#form-contact')[0].reset();
                        });
                    } else {
                        $.each(response.errors, function(key, value) {
                            if (key) {
                                if (($('#' + key).prop('tagName') === 'INPUT' || $('#' + key).prop('tagName') === 'TEXTAREA')) {
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

                    $('#submit').removeAttr('disabled');
                    $('#submit').html('Submit');
                }
            });
        });

        $(document).on('keyup', '#form-contact input', function(e) {
            e.preventDefault();

            if ($(this).val() == '') {
                $(this).removeClass('is-valid').addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid').addClass('is-valid');
            }
        });

        $(document).on('keyup', '#form-contact textarea', function(e) {
            e.preventDefault();

            if ($(this).val() == '') {
                $(this).removeClass('is-valid').addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid').addClass('is-valid');
            }
        });
    }();
</script>
@endsection
<!-- end:: js local -->