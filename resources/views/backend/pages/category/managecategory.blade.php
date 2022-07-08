@extends('backend.master_template.template')

@section('content')
<div class="br-pagetitle">
  <i class="icon ion-ios-home-outline"></i>
  <div>
    <h4>Category Page</h4>
    <p class="mg-b-0">Category Manage</p>
  </div>
</div>

   <!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="form-group">
             <label for="">Category Name</label>
             <input type="text" class="name form-control" placeholder="Enter Category Name">
             <span class="text-danger nameError"></span>
           </div>

           <div class="form-group">
            <label for="">Description</label>
            <textarea class="des form-control" id="" cols="30" rows="10"></textarea>
            <span class="text-danger desError"></span>
           </div>

           <div class="form-group">
            <label for="">Tags</label>
            <input type="text" class="tag form-control" placeholder="Enter Tags Name">
            <span class="text-danger tagError"></span>
           </div>

           <div class="form-group">
            <label for="">Status</label>
            <select class="status form-control">
                <option value="1">-----Select Status-----</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="addCategory btn btn-primary">Add Category</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Edit Category Modal -->
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="mmsg"></div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Category Name</label>
          <input type="text" id="name" class="name form-control" placeholder="Enter Category Name">
          <span class="text-danger nameError"></span>
        </div>

        <div class="form-group">
         <label for="">Description</label>
         <textarea class="form-control" id="des" cols="30" rows="10"></textarea>
         <span class="text-danger desError"></span>
        </div>

        <div class="form-group">
         <label for="">Tags</label>
         <input type="text" id="tag" class="form-control" placeholder="Enter Tags Name">
         <span class="text-danger tagError"></span>
        </div>

        <div class="form-group">
         <label for="">Status</label>
         <select class="status form-control">
             <option class="sts"></option>
             <option value="1">Active</option>
             <option value="2">Inactive</option>
         </select>
     </div>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update Category</button>
      </div>
    </div>
  </div>
</div>


<div class="br-pagebody">
  <div class="row row-sm">
    <div class="col-md-12">
      <button class="btn btn-sm btn-info" data-target="#addCategory" data-toggle="modal"><i class="fa fa-plus"></i>Add Category</button>
      <div class="msg mt-3"></div>
        <table class="table">
            <thead>
              <th>#SI</th>
              <th>Category Name</th>
              <th>Description</th>
              <th>Tags</th>
              <th>Status</th>
            </thead>

            <tbody class="tbody">
                
            </tbody>
        </table>
       
      </div>
    </div><!-- col-3 -->
</div><!-- br-pagebody -->
@endsection