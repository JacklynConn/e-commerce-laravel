@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl  ">
      <h4 class="fw-bold py-3 "><span class="text-muted fw-light"></span>Log Activity</h4>
     <div class="d-flex " style="display: flex; justify-content:center;">
     
      <div class="search" style="height:40px;display:flex;justify-content: center; align-item:center;">

        <form action="/admin/log-activity/1/search" class="d-flex" id="search_box">
          <input type="text"  id="search_input" placeholder="Search Author Name"  aria-label="Search"  class="form-control me-2" name="q">
      
          <button   class="btn btn-outline-success">Search</button>
      </form>
    </div>
     </div>
      
      <p >Total List<button  style="background-color: #ffffff00; outline:none;border:none;">

        <p style="color: blue">( {{$ActivityCount}} )</p>
        

      
      </button></p>
      <!-- Striped Rows -->
      <div class="card">
        {{-- {{$CountPost}} --}}
        {{-- <h5 class="card-header">Striped rows</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Author</th>
                <th>Post Type</th>
                <th>Service Name</th>
                <th>Status</th>
                <th>Created At</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ( $ListActivity as  $item)
                    <tr>
                        <td>{{$item->author}}</td>
                        <td>{{$item->postType}}</td>
                        <td>{{$item->service_name}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div><br>
      <div style="display: flex; justify-content:center;align-item:center;" class="col-12 d-flex ">
        <ul class="pagination" style="gap: 10px;">

          <li  class="page-item {{$page==1 ? 'disabled' : ''}} ">
            <a class="page-link text-primary" href="/admin/log-activity/{{$page-1}}" ><i style="font-size: 20px;"  class='bx bx-chevrons-left'></i></a>
          </li>

          @for ($i = 1 ; $i <= $TotalPage ; $i++)
          <li><a class="page-link btn btn-{{$page==$i ? 'primary' : 'secondary'}}" href="/admin/log-activity/{{$i}}">{{$i}}</a></li>
          @endfor

                
          <li  class="page-item {{$page==$TotalPage ? 'disabled' : ''}} ">
            <a class="page-link text-primary" href="/admin/log-activity/{{$page+1}}" ><i style="font-size: 20px;"  class='bx bx-chevrons-right'></i></a>
          </li>
         
        </ul>
      </div>
    
      <!--/ Striped Rows -->
      <hr class="my-5" />
    </div>
    <!-- / Content -->
  </div>
</div>

@endsection
