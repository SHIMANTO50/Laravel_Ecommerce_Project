@extends('backend.master_template.template')

@section('content')
<div class="br-pagetitle">
  <i class="icon ion-ios-home-outline"></i>
  <div>
    <h4>Blank Page</h4>
    <p class="mg-b-0">Page Description</p>
  </div>
</div>

<div class="br-pagebody">
<form action="{{Route('subcategoryinsert')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row row-sm">
    <div class="col-sm-6">

      <div class="form-group">
        <label for="catId">Select Category Name</label>
        <select  name="catId" id="catId" class="form-control">
          <option value="">---Select Category Name---</option>
          @foreach ($catname as $catname )
          <option value="{{$catname->id}}">{{$catname->name}}</option>
          @endforeach
        </select>

        <span class="text-danger">
          @error('catId')
             {{ $message }}
          @enderror
        </span>
      </div>

      <div class="form-group">
        <label for="subcatName">Subcategory Name</label>
         <input type="text" name="subcatName" id="subcatName" placeholder="Enter SubCategory Product Name" class="form-control" value="{{ old('subcatName')}}">
         <span class="text-danger">
           @error('subcatName')
              {{ $message }}
           @enderror
         </span>
      </div>

      <div class="form-group">
        <label for="des">Product Description</label>
         <textarea name="des" id="des"  placeholder="Enter Product Description" class="form-control">{{ old('des')}}</textarea>
         <span class="text-danger">
          @error('des')
         {{ $message }}
         @enderror
         </span>
      </div>
    </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label for="image">Sub Category Image</label>
           <input type="file" name="image" id="image"  class="form-control">
          <span class="text-danger">
            @error('image')
            {{ $message }}
            @enderror
          </span>
        </div>

        <div class="form-group">
          <label for="status">Product Category</label>
           <select name="status" id="status" class="form-control">
              <option value="">-----Select Status-----</option>
              <option value="1">Active</option>
              <option value="2">Inactive</option>
           </select>
          <span class="text-danger">
            @error('status')
            {{ $message }}
            @enderror
          </span>
        </div>

          <div class="form-group">
            <button class="form-control btn btn-info">Add Product</button>
          </div>
      </div>
    </div><!-- col-3 -->
</form>
</div><!-- br-pagebody -->
@endsection
