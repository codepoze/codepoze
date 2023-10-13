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
                    <table class="table" id="tabel-visitor-dt"></table>
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
            table = $('#tabel-visitor-dt').DataTable({
                serverSide: true,
                responsive: true,
                processing: true,
                lengthMenu: [5, 10, 25, 50],
                pageLength: 10,
                language: {
                    emptyTable: "Tak ada data yang tersedia pada tabel ini.",
                    processing: "Data sedang diproses...",
                },
                ajax: "{{ route('admin.visitor.get_data_dt') }}",
                columns: [{
                        title: 'No.',
                        data: 'DT_RowIndex',
                        class: 'text-center'
                    },
                    {
                        title: 'IP',
                        data: 'ip',
                        class: 'text-center'
                    },
                    {
                        title: 'City',
                        data: 'city',
                        class: 'text-center'
                    },
                    {
                        title: 'Region',
                        data: 'region',
                        class: 'text-center'
                    },
                    {
                        title: 'Country',
                        data: 'country',
                        class: 'text-center'
                    },
                    {
                        title: 'Loc',
                        data: 'loc',
                        class: 'text-center'
                    },
                    {
                        title: 'Org',
                        data: 'org',
                        class: 'text-center'
                    },
                    {
                        title: 'Timezone',
                        data: 'timezone',
                        class: 'text-center'
                    },
                    {
                        title: 'Created At',
                        data: 'created_at',
                        class: 'text-center'
                    }
                ],
            });
        }();
    </script>
    @endpush
    <!-- end:: js local -->
</x-admin-layout>