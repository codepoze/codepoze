<x-admin-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset_admin('my_assets/datatables/1.11.3/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset_admin('my_assets/datatables-responsive/2.2.9/css/responsive.dataTables.min.css') }}" />
    @endpush
    <!-- end:: css local -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-transparent border-bottom align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ $title }}</h4>
                </div>
                <div class="card-body">
                    <table class="table" id="tabel-testimony-dt"></table>
                </div>
            </div>
        </div>
    </div>

    <!-- begin:: js local -->
    @push('js')
    <script type="text/javascript" src="{{ asset_admin('my_assets/datatables/1.11.3/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset_admin('my_assets/datatables/1.11.3/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset_admin('my_assets/datatables-responsive/2.2.9/js/dataTables.responsive.min.js') }}"></script>

    <script>
        var table;

        let untukTabel = function() {
            table = $('#tabel-testimony-dt').DataTable({
                serverSide: true,
                responsive: true,
                processing: true,
                lengthMenu: [5, 10, 25, 50],
                pageLength: 10,
                language: {
                    emptyTable: "Tak ada data yang tersedia pada tabel ini.",
                    processing: "Data sedang diproses...",
                },
                ajax: "{{ route('admin.testimony.get_data_dt') }}",
                columns: [{
                        title: 'No.',
                        data: 'DT_RowIndex',
                        class: 'text-center'
                    },
                    {
                        title: 'First Name',
                        data: 'first_name',
                        class: 'text-center'
                    },
                    {
                        title: 'Last Name',
                        data: 'last_name',
                        class: 'text-center'
                    },
                    {
                        title: 'Email',
                        data: 'email',
                        class: 'text-center'
                    },
                    {
                        title: 'Phone',
                        data: 'phone',
                        class: 'text-center'
                    },
                    {
                        title: 'Message',
                        data: 'message',
                        class: 'text-center'
                    },
                    {
                        title: 'Status',
                        data: 'posting',
                        className: 'text-center',
                    },
                    {
                        title: 'Aksi',
                        data: 'action',
                        className: 'text-center',
                        responsivePriority: -1,
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        }();

        let untukPosting = function() {
            $(document).on('click', '#sts', function() {
                var ini = $(this);

                Swal.fire({
                    title: "Apakah Anda yakin ingin memposting data tersebut?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Iya, Ubah!',
                    customClass: {
                        confirmButton: 'btn btn-sm btn-success',
                        cancelButton: 'btn btn-sm btn-danger ms-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('admin.testimony.posting') }}",
                        dataType: 'json',
                        data: {
                            id: ini.data('id'),
                            password: result.value,
                        },
                        beforeSend: function() {
                            ini.attr('disabled', 'disabled');
                            ini.html('<i class="fa fa-spinner fa-spin"></i>&nbsp;Menunggu...');
                        },
                        success: function(response) {
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
                                table.ajax.reload();
                            });
                        }
                    });
                });
            });
        }();

        let untukHapusData = function() {
            $(document).on('click', '#del', function() {
                var ini = $(this);
                Swal.fire({
                    title: "Apakah Anda yakin ingin menghapusnya?",
                    text: "Data yang telah dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    confirmButtonClass: "btn btn-sm btn-primary",
                    cancelButtonClass: "btn btn-sm btn-danger ms-1",
                    buttonsStyling: !1,
                    showCloseButton: !0
                }).then((del) => {
                    if (del.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "{{ route('admin.testimony.del') }}",
                            dataType: 'json',
                            data: {
                                id: ini.data('id'),
                            },
                            beforeSend: function() {
                                ini.attr('disabled', 'disabled');
                                ini.html('<i class="fa fa-spinner fa-spin"></i>&nbsp;Menunggu...');
                            },
                            success: function(response) {
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
                                    table.ajax.reload();
                                });
                            }
                        });
                    } else {
                        return false;
                    }
                });
            });
        }();
    </script>
    @endpush
    <!-- end:: js local -->
</x-admin-layout>