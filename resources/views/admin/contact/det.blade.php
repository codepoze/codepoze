<!-- begin:: base -->
@extends('admin/base')
<!-- end:: base -->

<!-- begin:: css local -->
@section('css')
@endsection
<!-- end:: css local -->

<!-- begin:: content -->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">{{ $title }}</h4>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-md-9 my-auto">
                        <input type="text" class="form-control-plaintext" value="{{ $contact->nama }}" readonly />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-md-9 my-auto">
                        <input type="text" class="form-control-plaintext" value="{{ $contact->email }}" readonly />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-md-9 my-auto">
                        <input type="text" class="form-control-plaintext" value="{{ $contact->judul }}" readonly />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Pesan</label>
                    <div class="col-md-9 my-auto">
                        {{ $contact->pesan }}
                    </div>
                </div>
                <div class="hstack gap-2 justify-content-end">
                    <a href="{{ route('admin.contact.contact') }}" id="back" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i>&nbsp;Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- end:: content -->

<!-- begin:: js local -->
@section('js')
@endsection
<!-- end:: js local -->