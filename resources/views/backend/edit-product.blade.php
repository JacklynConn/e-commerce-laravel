@extends('backend.master')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y pt-0">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"></span>Update Product</h4>
        <div class="col-xl-12">
            {{-- file input --}}
            <form action="/admin/edit-product-submit" method="post" enctype="multipart/form-data">
                @csrf

             
                
                <div class="card">

                    {{-- @if (Session::has('message'))
                    <p style="color: rgb(34, 223, 34);">{{Session::get('message')}}</p>                    
                    @endif --}}
                    <div class="card-body row">
                        <div class="mb-3 col-6">
                            {{-- id --}}
                            <input type="hidden" name="id" value="{{$EditProduct[0]->id}}" id="">

                            {{-- name --}}
                            <label for="formFile" class="form-label">Name</label>
                            <input value="{{$EditProduct[0]->name}}" type="text" class="form-control" name="name" id="" placeholder="Enter name product">
                        </div>
                            {{-- Quantity --}}
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Quantity</label>
                                <input value="{{$EditProduct[0]->qty}}" type="number" name="qty" class="form-control" placeholder="0">
                            </div>
                            {{-- regular_price --}}
                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">Regular Price</label>
                                <input value="{{$EditProduct[0]->regular_price}}" type="number" name="regular_price" class="form-control" placeholder="0" id="">
                            </div>
                            {{-- sale_price --}}
                            <div class="mb-3 col-6">
                                <label for="forFile" class="form-label">Sale Price</label>
                                <input value="{{$EditProduct[0]->sale_price}}" type="number" name="sale_price" class="form-control" placeholder="0" id="">
                            </div>
                            {{-- Category --}}
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Category</label>
                              
                                <select name="category" class="form-control" >

                                @foreach ($ListCategory as $itemCategory)
                                    @if ($itemCategory->id == $EditProduct[0]->category_id)
                                        <option selected value="{{$itemCategory->id }}">{{$itemCategory->name}}</option>
                                    @else
                                    <option  value="{{$itemCategory->id }}">{{$itemCategory->name}}</option>
                                    @endif                                            
                                 @endforeach


                                </select>
                            </div>
                         

                            {{-- size --}}
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Available Size
                                    (<span class="text-danger">
                                        {{$EditProduct[0]->size}}</span>)</label>

                                <select   name="size[]" class="form-control color" multiple="multiple">

                                @foreach ($EditProduct as $item)
                                @if ( $item->size==true)
                               
                                <option   selected value="{{$item->size}}">{{$item->size}}</option>
                                   
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <opti6on value="XL">XL</option> 
                               
                                @else
                                <option value="{{$item->size}}">{{$item->size}}</option>
                                @endif    
                               
                                @endforeach
                                </select>
                            </div>

                             {{-- file --}}
                             <div class="mb-3 col-6">
                                <label for="formFile" class="form-label text-danger" >Recommend images size 200 x 90</label>
                                
                              <div class="row">
                              <div class="col-6">
                                <input   value="{{$EditProduct[0]->thumbnail}}" type="file" class="form-control " name="thumbnail" id=""  >
                              </div>
                              <div class="col-6">
                                <img src="../uploads/{{$EditProduct[0]->thumbnail}}" alt="" width="100%" height="100%">
                              </div>
                              </div>
                                {{-- <input type="hidden" name="tmp" value="{{$EditProduct[0]->thumbnail}}"> --}}
                                
                            </div>
                            
                            {{-- color --}}
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Available Color</label>
                                <select required name="color[]" class="form-control color" multiple="multiple">
                                    @foreach ($EditProduct as $item)
                                    @if ($item->color == true)
                                    <option  selected value="{{$item->color}}">{{$item->color}}</option>
                                    <option value="Red">Red</option>
                                    <option value="Black">Black</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Grey">Grey</option>
                                    <option value="Yellow">Yellow</option>
                                    @else
                                    <option value="{{$item->color}}">{{$item->color}}</option>
                                    @endif
                                   
                                    @endforeach
                                    
                                </select>
                            </div>

                             

                            {{-- description --}}
                            <div class="mb-3 col-12">
                                <label for="formFile" class="form-label">Description</label>
                                <textarea name="description" class="form-control" placeholder="Message..." cols="30" rows="10">{{$EditProduct[0]->description}}</textarea>
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="btn btn-warning" value="Update Post">
                            </div>
                       
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection