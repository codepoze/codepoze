<x-admin-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset_admin('libs/toastr/build/toastr.min.css') }}">
    @endpush
    <!-- end:: css local -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link mb-2 {{ (Request::segment(3) === 'unread' ? 'active' : '') }}" href="{{ route('notification.index', 'unread') }}">
                                    <i class="fa fa-times"></i>&nbsp;
                                    Unread
                                </a>
                                <a class="nav-link mb-2 {{ (Request::segment(3) === 'read' ? 'active' : '') }}" href="{{ route('notification.index', 'read') }}">
                                    <i class="fa fa-check"></i>&nbsp;
                                    Read
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                <!-- begin:: unread -->
                                <div class="tab-pane fade {{ (Request::segment(3) === 'unread' ? 'show active' : '') }}" role="tabpanel" aria-labelledby="v-pills-foto-tab">
                                    @if($notifikasi->count() > 0)
                                    <div class="d-flex justify-content-between py-2">
                                        <div class="d-flex">
                                            <div class="my-auto">
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="check_all_read" name="check_all_read">
                                                    <label class="form-check-label" for="">Centang semua</label>
                                                </div>
                                            </div>
                                            <div class="show-button">
                                            </div>
                                        </div>
                                        <h4 class="card-title">{{ $title }} Unread</h4>
                                    </div>
                                    <ul class="list-group">
                                        @foreach($notifikasi as $row)
                                        <li class="list-group-item list-group-item-success d-flex align-items-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input check_one message-unread" id="" name="" value="{{ $row->id_notification }}">
                                            </div>
                                            <a href="{{ route($row->route, my_encrypt($row->id)) }}"><span>{{ $row->text }}</span></a>
                                            <span class="badge bg-success rounded-pill ms-auto">{{ $row->created_at->diffForHumans() }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                    {{ $notifikasi->onEachSide(0)->links('partials.custom') }}
                                    @else
                                    <div class="alert alert-info" role="alert">
                                        <h4 class="alert-heading">Info</h4>
                                        <div class="alert-body">
                                            Belum ada notifikasi
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <!-- end:: unread -->
                                <!-- begin:: read -->
                                <div class="tab-pane fade {{ (Request::segment(3) === 'read' ? 'show active' : '') }}" role="tabpanel" aria-labelledby="v-pills-akun-tab">
                                    @if($notifikasi->count() > 0)
                                    <div class="d-flex justify-content-between py-2">
                                        <div class="d-flex">
                                            <div class="my-auto">
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="check_all" name="check_all">
                                                    <label class="form-check-label" for="">Centang semua</label>
                                                </div>
                                            </div>
                                            <div class="show-button">
                                            </div>
                                        </div>
                                        <h4 class="card-title">{{ $title }} Read</h4>
                                    </div>
                                    <ul class="list-group">
                                        @foreach($notifikasi as $row)
                                        <li class="list-group-item list-group-item-secondary d-flex align-items-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input check_one message-delete" id="" name="" value="{{ $row->id_notification }}">
                                            </div>
                                            <a href="{{ route($row->route, my_encrypt($row->id)) }}"><span>{{ $row->text }}</span></a>
                                            <span class="badge bg-success rounded-pill ms-auto">{{ $row->created_at->diffForHumans() }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                    {{ $notifikasi->onEachSide(0)->links('partials.custom') }}
                                    @else
                                    <div class="alert alert-info" role="alert">
                                        <h4 class="alert-heading">Info</h4>
                                        <div class="alert-body">
                                            Belum ada notifikasi
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <!-- end:: read -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- begin:: js local -->
    @push('js')
    <script type="text/javascript" src="{{ asset_admin('libs/toastr/build/toastr.min.js') }}"></script>

    <script>
        let untukCheckAllRead = function() {
            $(document).on('change', '#check_all_read', function(e) {
                var all = $(this);
                $('.check_one').each(function() {
                    var detail = $(this);
                    if (all.is(':checked')) {
                        detail.prop('checked', true);
                        $('.show-button').html(`
                        <button class="btn btn-success btn-sm" id="btn-read"><i class="fa fa-check"></i>&nbsp;<span class="align-middle">Read</span></button>&nbsp;
                        <button class="btn btn-danger btn-sm" id="btn-delete"><i class="fa fa-trash"></i>&nbsp;<span class="align-middle">Delete</span></button>
                    `);
                    } else {
                        detail.prop('checked', false);
                        $('.show-button').html(``);
                    }
                });
            });
        }();

        let untukCheckOneRead = function() {
            $(document).on('change', '.message-unread', function(e) {
                var detail = $(this);
                if (detail.is(':checked')) {
                    $('.show-button').html(`
                    <button class="btn btn-success btn-sm" id="btn-read"><i class="fa fa-check"></i>&nbsp;<span class="align-middle">Read</span></button>&nbsp;
                    <button class="btn btn-danger btn-sm" id="btn-delete"><i class="fa fa-trash"></i>&nbsp;<span class="align-middle">Delete</span></button>
                `);
                } else {
                    $('.show-button').html(``);
                }
            });
        }();

        let untukCheckAllDelete = function() {
            $(document).on('change', '#check_all', function(e) {
                var all = $(this);
                $('.check_one').each(function() {
                    var detail = $(this);
                    if (all.is(':checked')) {
                        detail.prop('checked', true);
                        $('.show-button').html(`<button class="btn btn-danger btn-sm" id="btn-delete"><i class="fa fa-trash"></i>&nbsp;<span class="align-middle">Delete</span></button>`);
                    } else {
                        detail.prop('checked', false);
                        $('.show-button').html(``);
                    }
                });
            });
        }();

        let untukCheckOneDelete = function() {
            $(document).on('change', '.message-delete', function(e) {
                var detail = $(this);
                if (detail.is(':checked')) {
                    $('.show-button').html(`<button class="btn btn-danger btn-sm" id="btn-delete"><i class="fa fa-trash"></i>&nbsp;<span class="align-middle">Delete</span></button>`);
                } else {
                    $('.show-button').html(``);
                }
            });
        }();

        let untukRead = function() {
            $(document).on('click', '#btn-read', function(e) {
                e.preventDefault();
                var id = [];

                $('.check_one:checked').each(function() {
                    id.push($(this).val());
                });

                if (id.length > 0) {
                    $.ajax({
                        url: "{{ route('notification.read_all') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status) {
                                toastr.success(response.text, response.title);
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                toastr.error(response.message, 'Error');
                            }
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Tidak ada data yang dipilih",
                        text: "Silahkan pilih data yang akan di read",
                        icon: "warning",
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-sm btn-warning",
                        },
                        buttonsStyling: false,
                    });
                }
            });
        }();

        let untukDelete = function() {
            $(document).on('click', '#btn-delete', function(e) {
                e.preventDefault();
                var id = [];

                $('.check_one:checked').each(function() {
                    id.push($(this).val());
                });

                if (id.length > 0) {
                    $.ajax({
                        url: "{{ route('notification.delete_all') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.status) {
                                toastr.success(response.text, response.title);
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                toastr.error(response.message, 'Error');
                            }
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Tidak ada data yang dipilih",
                        text: "Silahkan pilih data yang akan dihapus",
                        icon: "warning",
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: `btn btn-sm btn-warning`,
                        },
                        buttonsStyling: false,
                    });
                }
            });
        }();
    </script>
    @endpush
    <!-- end:: js local -->
</x-admin-layout>