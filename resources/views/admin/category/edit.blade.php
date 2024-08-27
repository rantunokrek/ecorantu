@extends('admin.admin_layouts')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Categorry</a>
          <a class="breadcrumb-item" href="index.html">Edit</a>
        
        </nav>
  
        <div class="sl-pagebody">
      
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Page here</h6>
              
                <div class="form-layout">
                  <div class="row mg-b-25">
                    <div class="col-lg-3">
                       <form action="{{ route('update.category') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $category->id }}" name="id">
                        <div class="form-group">
                          <label class="form-control-label">Category name: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="category_name" value="{{ $category->category_name }}" placeholder="Enter firstname">
                          
                        </div>
                        @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                            
                        @enderror
                        <div class="form-layout-footer">
                          <button class="btn btn-info mg-r-5">Update</button>
                          <button class="btn btn-secondary">Cancel</button>
                        </div><!-- form-layout-footer -->
                    
                    </div><!-- col-4 -->
              
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="number" name="status" value="{{ $category->status }}">
                      </div>
                    </div><!-- col-4 -->
                  </form>
               
                </div><!-- form-layout -->
              </div><!-- card -->
  
        </div><!-- sl-pagebody -->
      </div><!-- sl-mainpanel -->
@endsection();