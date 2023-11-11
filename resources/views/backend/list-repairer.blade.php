@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 ">
      <h4 class=" py-3 "><span class="text-muted fw-light"></span> Product</h4>
       <p >Total List<button  style="background-color: #ffffff00; outline:none;border:none;">

        {{-- <p style="color: blue">( {{$countProduct}} )</p>   --}}
      </button></p>


      <!-- Striped Rows -->
      <div class="card">
        


        {{-- <h5 class="card-header">Striped rows</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Author</th>
                <th>Name</th>
                <th>Quatity</th>
                <th>Thumbnail</th>
                <th>Regular price</th>
                <th>Sale price</th>
                <th>Category</th>
                <th>Color</th>
                <th>Size</th>
             
                <th>viewer</th>
                <th>description</th>
                <th>created at</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($ListRepairer as  $ListRepaireritem)
                <tr>
                    <td><p>{{$ListRepaireritem->servicetype_id}}</p></td>
                    <td><p>{{$ListRepaireritem->name}}</p></td>
                    <td><p>{{$ListRepaireritem->sex}}</p></td>
                    <td>
                      {{-- <img width="50px" height="70px" style="border: 1px solid black;" src="../uploads/{{$ListRepaireritem->$imag}}" alt="khor"> --}}
                    </td>
                    <td><p>{{$ListRepaireritem->age}}</p></td>
                    <td><p>{{$ListRepaireritem->phone}}</p></td>
                    <td><p>{{$ListRepaireritem->like_id}}</p></td>
                    <td><p>{{$ListRepaireritem->facebook}}</p></td>
                    <td><p>{{$ListRepaireritem->status}}</p></td>
                    <td><p>{{$ListRepaireritem->email}}</p></td>
                    {{-- <td style=" vertical-align: middle;"><p style=" width:140px; overflow: hidden;  white-space: nowrap;    text-overflow: ellipsis;">{{$ListRepaireritem->detail}}</p></td> --}}

                    <td><p>{{$ListRepaireritem->created_at}}</p></td>
                    <td>
                        <a href="/admin/view-product={{$ListRepaireritem->id}}" class="btn btn-warning btn-sm">View</a>
                        <a href="/admin/edit-product={{$ListRepaireritem->id}}" class="btn btn-success btn-sm">Edit</a>
                        <a href="/admin/remove-product={{$ListRepaireritem->id}}" class="btn btn-danger btn-sm">remove</a>
                    </td>
                </tr>
                @endforeach
             
            </tbody>
          </table>

         
        </div>
        
      </div><br>
      {{-- pagination --}}
      {{-- <div style="display: flex; justify-content:center;align-item:center;" class="col-12 d-flex ">
        <ul class="pagination " style="gap: 10px;">
      
          <li  class="page-item {{$currentPage<=1 ? 'disabled' : ''}} ">
            <a class="page-link" href="/admin/list-product?page={{$currentPage-1}}" ><i style="font-size: 20px;"  class='bx bx-chevrons-left'></i></a>
          </li>
         
          @for ($i= 1; $i <= $TotalPage ; $i++)

          <li   >
            <a class="btn {{$currentPage==0 ? $currentPage=1 : $currentPage==$i  }}  page-link btn-{{$currentPage ==$i ? 'primary' : 'secondary'}}  "  href="/admin/list-product?page={{$i}}">{{$i}}<span class="sr-only"></span></a></li>
         
          @endfor
                
          <li  class="page-item {{$currentPage==$TotalPage ? 'disabled' : ''}} ">
            <a class="page-link" href="/admin/list-product?page={{$currentPage+1}}" ><i style="font-size: 20px;"  class='bx bx-chevrons-right'></i></a>
          </li>
          
         
        </ul>
      </div> --}}
      <!--/ Striped Rows -->
      <hr class="my-5" />
    </div>
    <!-- / Content -->
  </div>
</div>

@endsection