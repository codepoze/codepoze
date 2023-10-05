<x-pages-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    @endpush
    <!-- end:: css local -->

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
                        {{ __('testimonies.text_1') }}
                    </p>

                    <form id="form-testimonies" action="{{ route('testimonies.save') }}" method="post">
                        <div class="mb-3">
                            <label class="form-label">{{ __('testimonies.label_1') }}&nbsp;*</label>
                            <div class="row">
                                <div class="col field-input">
                                    <input type="text" name="first_name" id="first_name" class="form-control form-control-sm" placeholder="{{ __('testimonies.input_11') }}" />
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="col field-input">
                                    <input type="text" name="last_name" id="last_name" class="form-control form-control-sm" placeholder="{{ __('testimonies.input_12') }}" />
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 field-input">
                            <label for="email" class="form-label">{{ __('testimonies.label_2') }}&nbsp;*</label>
                            <input type="text" class="form-control form-control-sm" name="email" id="email" placeholder="{{ __('testimonies.input_2') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="mb-3 field-input">
                            <label for="phone" class="form-label">{{ __('testimonies.label_3') }}&nbsp;*</label>
                            <input type="text" class="form-control form-control-sm" name="phone" id="phone" placeholder="{{ __('testimonies.input_3') }}">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="mb-3 field-input">
                            <label for="message" class="form-label">{{ __('testimonies.label_4') }}&nbsp;*</label>
                            <textarea class="form-control form-control-sm" name="message" id="message" placeholder="{{ __('testimonies.input_4') }}"></textarea>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="mb-3 field-input">
                            <label class="form-label">{{ __('testimonies.label_5') }}&nbsp;*</label>
                            <br />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="yes" value="1">
                                <label class="form-check-label" for="yes">{{ __('testimonies.input_51') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="no" value="0">
                                <label class="form-check-label" for="no">{{ __('testimonies.input_52') }}</label>
                            </div>
                            <input type="radio" name="status" id="status" style="display: none;">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" id="submit" class="btn btn-primary">{{ __('testimonies.button') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- begin:: js local -->
    @push('js')
    <script>
        let untukSubmit = function() {
            $(document).on('submit', '#form-testimonies', function(e) {
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
                        $('#submit').html("{{ __('testimonies.loading') }}");
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
                                window.open("{{ route('home') }}", '_self');
                            });
                        } else {
                            $.each(response.errors, function(key, value) {
                                if (key) {
                                    if (($('#' + key).prop('tagName') === 'INPUT' || $('#' + key).prop('tagName') === 'TEXTAREA')) {
                                        $('#' + key).addClass('is-invalid');
                                        $('#' + key).parents('.field-input').find('.invalid-feedback').html(value);
                                    } else if ($('#' + key).prop("checked") !== true) {
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
                        $('#submit').html("{{ __('testimonies.button') }}");
                    }
                });
            });

            $(document).on('keyup', '#form-testimonies input', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('keyup', '#form-testimonies textarea', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });

            $(document).on('change', '#form-testimonies input[type=radio]', function(e) {
                e.preventDefault();

                if ($(this).val() == '') {
                    $('#status').removeClass('is-valid').addClass('is-invalid');
                } else {
                    $('#status').removeClass('is-invalid').addClass('is-valid');
                }
            });
        }();
    </script>
    @endpush
    <!-- end:: js local -->
</x-pages-layout>