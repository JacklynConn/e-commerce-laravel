@extends('backend.master')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y pt-0">
            <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"></span>Update Service</h4>
            <div class="col-xl-12">
                {{-- file input --}}

                <form action="/edit-service-submit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">

                        @if (Session::has('message'))
                            <p style="color: rgb(34, 223, 34);">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body row">
                            <div class="mb-3 col-6">
                                {{-- id --}}
                                <input value="{{ $EditService[0]->id }}" type="hidden" name="id" class="form-control"
                                    placeholder="0" id="">

                                {{-- name --}}
                                <label for="formFile" class="form-label">Name</label>
                                <input value="{{ $EditService[0]->name }}" type="text" class="form-control"
                                    name="name" id="" placeholder="Enter name product">
                            </div>
                            {{-- Quantity --}}
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Quantity</label>
                                <input value="{{ $EditService[0]->icon_code }}" type="text" name="icon_code"
                                    class="form-control" placeholder="0">
                            </div>
                            {{-- regular_price --}}
                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">Status</label>
                                <input value="{{ $EditService[0]->status }}" type="number" name="status"
                                    class="form-control" placeholder="0" id="">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-warning" value="Update Post">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
