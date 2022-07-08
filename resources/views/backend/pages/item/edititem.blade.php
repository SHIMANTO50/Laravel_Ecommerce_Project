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
  <form action="{{Route('item.update',$items->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row row-sm">
      <div class="col-sm-8">
  
        <div class="form-group">
           <label for="item_code">Items Code</label>
            <input value="{{ $items->item_code}}" readonly type="text" name="item_code" id="item_code" placeholder="Enter Items Code" class="form-control">
  
          <span class="text-danger">
            @error('item_code')
               {{ $message }}
            @enderror
          </span>
        </div>
  
        <div class="form-group">
          <label for="name">Item Name</label>
           <input type="text" name="name" id="name" placeholder="Enter SubCategory Product Name" class="form-control" value="{{ $items->name}}">
           <span class="text-danger">
             @error('name')
                {{ $message }}
             @enderror
           </span>
        </div>
  
        <div class="form-group">
          <label for="des">Item Description</label>
           <textarea name="des" id="des"  placeholder="Enter Item Description" class="form-control">{{$items->des}} </textarea>
           <span class="text-danger">
            @error('des')
           {{ $message }}
           @enderror
           </span>
        </div>
      {{-- </div> --}}
  
        {{-- <div class="col-sm-6"> --}}
          <div class="form-group">
           
            <img class="mb-5" height="80" src="{{asset('backend/items/'.$items->pic)}}" alt="">
           <div>
            <label for="pic">Item Image</label>
           </div>
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
            <div class="col-md-4">
              @foreach ($gallery as $allpic)
              <form action="{{ Route('item.single.update',$allpic->id)}}" method="POST" enctype="multipart/form-data"></form>
              @csrf
                <div class="row">
                  <a href="{{ Route('item.image.delete',$allpic->id)}}" class="btn btn-sm btn-danger" style="height:25px"><i class="fas fa-times"></i></a>
                  <img height="100" src="{{asset('backend/items/gallery/'.$allpic->gallery)}}" alt="">
                  <input type="file" class="form-control" name="{{$allpic->id}}">
                  <button>Update</button>
                </div>
              @endforeach
        </div>
      </div><!-- col-3 -->
   </form>
  </div><!-- br-pagebody -->

@endsection
