@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Website Logo</h4>
       <p >Total List<button  style="background-color: #ffffff00; outline:none;border:none;">

        <p style="color: blue">( {{$countLogo}} )</p>

      
      </button></p>


      <!-- Striped Rows -->
      <div class="card">
        


        {{-- <h5 class="card-header">Striped rows</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Thumbnail</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($objLogo as $item)
                <tr>
                    <td>
                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <img src="../uploads/{{$item->thumbnail}}"width="170" height="90">
                    </td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a href="/admin/edit-logo/{{$item->id}}" class="btn btn-success btn-sm">Edit</a>
                        <a href="/admin/remove-logo/{{$item->id}}" class="btn btn-danger btn-sm">remove</a>
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