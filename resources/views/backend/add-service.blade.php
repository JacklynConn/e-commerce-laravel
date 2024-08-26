@extends('backend.master')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-0 mb-3"><span class="text-muted fw-light"></span>Add Service</h4>
            <div class="col-xl-12">
                <!-- File input -->
                <form action="/add-service-submit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (Session::has('message'))
                            <p class="text-danger text-center">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Name</label>
                                    <input class="form-control" type="text" name="name" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Icon Code</label>
                                    <input class="form-control" type="text" name="icon_code" />
                                </div>
                                {{-- <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Status</label>
                                    <input class="form-control" type="number" name="status" />
                                </div> --}}
                            
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Add Service">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
