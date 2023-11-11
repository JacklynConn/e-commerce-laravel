@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y-mt-0">
      <h4 class="fw-bold py-3 mb-0"><span class="text-muted fw-light"></span>List Service Type</h4>

      <!-- Striped Rows -->
      <div class="card">
        {{-- {{$CountPost}} --}}
        {{-- <h5 class="card-header">Striped rows</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Icon Code</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($ListService as $ListServiceitem)
                    <tr>
                        <td>{{$ListServiceitem->name}}</td>
                        <td>{{$ListServiceitem->icon_code}}</td>
                        <td>{{$ListServiceitem->status}}</td>
                        <td>
                            <a href="edit-service/{{$ListServiceitem->id}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="remove-service/{{$ListServiceitem->id}}" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Striped Rows -->
      <hr class="my-5" />
    </div>
    <!-- / Content -->
  </div>
</div>

@endsection
