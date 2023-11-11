@extends('backend.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Remove Category Name</h4>
            <div class="col-xl-12">
                <!-- File input -->

                <form action="/remove-service-submit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card" >
                        <h5 class="card-header">Category</h5>
                      
                        <div class="card-body">
                            <div class="mb-3 " style="display: flex;  flex-direction: column;">

                                <h3 class="text-danger">{{$RemoveService[0]->name}}</h3>

                                <input type="hidden" value="{{$RemoveService[0]->id}}" name="id">
                                <input type="hidden" value="{{$RemoveService[0]->name}}" name="name">
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="btn btn-danger" value="Yes">
                                <a href="/list-service" class="btn btn-primary">No</a>
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

   
    
@endsection