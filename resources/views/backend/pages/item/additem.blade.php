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
<form action="{{Route('item.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row row-sm">
    <div class="col-sm-6">

      <div class="form-group">
        <label for="item_code">Sub Category</label>
         <select name="item_code" id="item_code" class="form-control">
          <option value="0">---Select SubCategory---</option> 
           @foreach ($subcats as $subcat)
            <option value="{{ $subcat->id}}">{{$subcat->subcatName}}</option>    
           @endforeach
         </select>

        <span class="text-danger">
          @error('item_code')
             {{ $message }}
          @enderror
        </span>
      </div>

      <div class="form-group">
        <label for="name">Item Name</label>
         <input type="text" name="name" id="name" placeholder="Enter SubCategory Product Name" class="form-control" value="{{ old('name')}}">
         <span class="text-danger">
           @error('name')
              {{ $message }}
           @enderror
         </span>
      </div>

      <div class="form-group">
        <label for="des">Item Description</label>
         <textarea name="des" id="des"  placeholder="Enter Item Description" class="form-control">{{ old('des')}}</textarea>
         <span class="text-danger">
          @error('des')
         {{ $message }}
         @enderror
         </span>
      </div>
    </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label for="pic">Item Image</label>
           <input type="file" name="pic" id="pic"  class="form-control">
          <span class="text-danger">
            @error('pic')
            {{ $message }}
            @enderror
          </span>
        </div>


        <div class="form-group">
          <label for="gallery">Item Image</label>
           <input type="file" name="gallery[]" id="gallery" class="form-control" multiple>
          <span class="text-danger">
            @error('gallery')
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
