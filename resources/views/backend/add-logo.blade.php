@extends('backend.master')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Add Website Logo</h4>
            <div class="col-xl-12">
                <!-- File input -->
                <form action="/admin/add-logo-submit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card" >
                        <h5 class="card-header">Thumbnail</h5>
                        @if(Session::has('message'))
                        <p style="color: rgb(34, 223, 34);  position: fixed;left: 45%;top:30%;">{{Session::get('message')}}</p>
                        @endif
                        <div class="card-body">
                            <div class="mb-3 " style="display: flex;  flex-direction: column;">
                                <label for="formFile" class="form-label text-danger">Recommend image size 200 x 90 pixels.</label>
                                <img width="200" height="90" src="{{url('assets/images/noimg.jpg')}}" alt="" id="show_img">
                                <input class="form-control" type="file" name="thumbnail" id="image" />
                            </div>
{{-- 
                             <div class="mb-3">
                                <label for="formFile" class="form-label">Name</label>
                                <input class="form-control" type="text" name="thumbnail" />
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Regular Price</label>
                                <input class="form-control" type="number" name="thumbnail" />
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Sale Price</label>
                                <input class="form-control" type="number" name="thumbnail" />
                            </div> --}}


                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Add Post">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
