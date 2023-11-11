@extends('backend.master')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y pt-0">
            <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"></span>Add Product</h4>
            <div class="col-xl-12">
                {{-- file input --}}
                <form action="/add-repairer-submit" method="post" enctype="multipart/form-data">
                    @csrf



                    <div class="card">

                        @if (Session::has('message'))
                            <p style="color: rgb(34, 223, 34);">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body row">

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id=""
                                    placeholder="Enter name product">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Service</label>
                                <select name="sericetype_id" class="form-control">
                                    @foreach ($ListService as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{--  --}}
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Sex</label>
                                <select name="sex" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            {{--  --}}
                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">Age</label>
                                <input type="number" name="age" class="form-control" placeholder="Enter numbers"
                                    id="">
                            </div>
                            {{--  --}}
                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">Phone</label>
                                <input type="number" name="phone" class="form-control"placeholder="Enter numbers" id="">
                            </div>
                            {{--  --}}

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Like</label>
                                <select name="like_id" class="form-control">
                                    {{-- @foreach ($ListService as $item)

                                    <option value="{{$item->id}}">
                                        {{$item->name }}
                                       </option>
                                @endforeach --}}
                                </select>
                            </div>

                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">Facebook</label>
                                <input type="number" name="facebook" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div>
                            {{--  --}}

                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">Status</label>
                                <input type="number" name="status" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">Image</label>
                                <input type="number" name="Image" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">email</label>
                                <input type="number" name="email" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">address</label>
                                <input type="number" name="address" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">detail</label>
                                <input type="number" name="detail" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">lat</label>
                                <input type="number" name="lat" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">lng</label>
                                <input type="number" name="lng" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">username</label>
                                <input type="number" name="usernanme" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">password</label>
                                <input type="number" name="password" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">Is Delete</label>
                                <input type="number" name="is_delete" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div>


                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Add Post">
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
