@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl  ">
      <h4 class="fw-bold py-3 "><span class="text-muted fw-light"></span>Log Activity</h4>
     <div class="d-flex " style="display: flex; justify-content:center;">
     
      <div class="search" style="height:40px;display:flex;justify-content: center; align-item:center;">
        <form action="/admin/log-activity/1/search" class="d-flex" id="search_box">
          <input type="text" value= "{{$searchValue}}" id="search_input" placeholder="Search Author Name"  aria-label="Search"  class="form-control me-2" name="q">
      
          <button type="submit"  class="btn btn-outline-success">Search</button>
      </form>
    </div>
     </div>
      
    

        {{-- <p style="color: blue">( {{$ActivityCount}} )</p> --}}
        

      
      </button></p>
      <!-- Striped Rows -->
      <div class="card">
        {{-- {{$CountPost}} --}}
        {{-- <h5 class="card-header">Striped rows</h5> --}}
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>author</th>
                <th>Post Type</th>
                <th>Product Name</th>
                <th>Status</th>
                <th>Created At</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0"> 
{{-- 
              @if (empty($searchValue) )
             
               <tr>
                <td colspan="5"><p  style="text-align: center; color:red;"> Please search again , You forgot enter author's name  </p></td>
                
               </tr>
                @foreach ( $Activity as  $ActivityItem)
                <tr>
                  
                  <td>{{$ActivityItem->author}}</td>
                  <td>{{$ActivityItem->postType}}</td>
                  <td>{{$ActivityItem->product_name}}</td> 
                  <td>{{$ActivityItem->status}}</td>
                  <td>{{$ActivityItem->created_at}}</td>
                </tr>
                @endforeach

                @elseif ($searchValue==='{{$Activity[0]->author}}' )
                @foreach ( $Activity as  $ActivityItem)
 
              <tr>
 
                <td>{{$ActivityItem->author}}</td>
                <td>{{$ActivityItem->postType}}</td>
                <td>{{$ActivityItem->product_name}}</td> 
                <td>{{$ActivityItem->status}}</td>
                <td>{{$ActivityItem->created_at}}</td>
              </tr>
              @endforeach

              @elseif ($searchValue!='{{$Activity[0]->author}}'  )
              <tr>
                <td colspan="5"><h2  style="text-align: center; color:red;"> Search not found </h2></td>
                
               </tr>

          
              
              @endif
             --}}

             
             @forelse ($Activity as  $ActivityItem )
             <tr>
               
              <td>{{$ActivityItem->author}}</td>
              <td>{{$ActivityItem->postType}}</td>
              <td>{{$ActivityItem->product_name}}</td> 
              <td>{{$ActivityItem->status}}</td>
              <td>{{$ActivityItem->created_at}}</td>
            </tr>
             @empty
             <tr><td colspan="5" align="center" class="text-danger"  >Result not found.</td></tr>
             @endforelse
 

            </tbody>
          </table>
        </div>
      </div><br>

    
      <!--/ Striped Rows -->
      <hr class="my-5" />
    </div>
    <!-- / Content -->
  </div>
</div>

@endsection
