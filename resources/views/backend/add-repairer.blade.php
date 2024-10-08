@extends('backend.master')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y pt-0">
            <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"></span>CREATE FORM REPAIRER</h4>
            <div class="col-xl-12">
                {{-- file input --}}
                <form action="/add-repairer-submit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (Session::has('message'))
                            <p style="color: rgb(84, 34, 223);">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body row">

                            <div class="mb-3 col-4">
                                <label for="formFile" class="form-label">Repairer Name</label>
                                <input type="text" class="form-control" name="name" id="" placeholder="Enter name repairer">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="formFile" class="form-label">Sex</label>
                                <select name="sex" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">Age</label>
                                <input type="number" name="age" class="form-control" placeholder="Enter age" id="">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control"placeholder="Enter phone number"
                                    id="">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">email</label>
                                <input type="text" name="email" class="form-control"placeholder="Enter email" id="">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">address</label>
                                <input type="text" name="address" class="form-control"placeholder="Enter address" id="">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">username</label>
                                <input type="text" name="username" class="form-control"placeholder="Enter your name" id="">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">password</label>
                                <input type="password" name="password" class="form-control"placeholder="Enter password" id="">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">Confirm Password</label>
                                <input type="password" name="password" class="form-control"placeholder="Enter password" id="">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">Facebook</label>
                                <input type="text" name="facebook" class="form-control"placeholder="Enter facebook link"
                                    id="">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">Latitude</label>
                                <input type="number" name="lat" class="form-control"placeholder="Enter latitude"
                                    id="">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">Longitude</label>
                                <input type="number" name="lng" class="form-control"placeholder="Enter longitude"
                                    id="">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="formFile" class="form-label">Service Types</label>
                                <select name="servicetype_id" class="form-control">
                                    @foreach ($ListService as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-4">
                                <label for="formFile" class="form-label">Details</label>
                                <input type="text" name="details" class="form-control"placeholder="Enter details"
                                    id="">
                                    {{-- @foreach ($ListService as $item)

                                    <option value="{{$item->id}}">
                                        {{$item->name }}
                                       </option>
                                @endforeach --}}
                                </select>
                            </div>
   
                            {{-- <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">Status</label>
                                <input type="number" name="status" class="form-control"placeholder="0"
                                    id="">
                            </div> --}}

                            <div class="mb-3 col-4" style="display: flex;  flex-direction: column;">
                                <label for="formFile" class="form-label text-danger">Recommend image size 200 x 90 pixels.</label>
                                <img width="100" height="100" src="{{url('images/userprofile.jpg')}}" alt="" id="show_img">
                                <input class="form-control" type="file" name="image" id="image" />
                            </div>
                    
                            {{-- <div class="mb-3 col-4">
                                <label for="forFile" class="form-label">Is Delete</label>
                                <input type="number" name="is_delete" class="form-control"placeholder="Enter numbers"
                                    id="">
                            </div> --}}

                            <div class="mb-3" style="direction: rtl">
                                <input type="submit" class="btn btn-primary" value="Add Post">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
            // alert("jjje");
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show_img').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
