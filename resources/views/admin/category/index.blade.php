@extends('admin.admin_layouts')
@section('category') active @endsection
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Starlight</a>
          <a class="breadcrumb-item" href="index.html">Pages</a>
          <span class="breadcrumb-item active">Blank Page</span>
        </nav>
  
        <div class="sl-pagebody">
      
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">You Can Add Category Here</h6>
                @if(Session::has('success'))
                <div class="alert alert-success success alert-dismissible fade show" role="alert">
                  <strong>{{ session(('success')) }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

                @if(session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{ session(('delete')) }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                <div class="form-layout">
                  <div class="row mg-b-25">
                    <div class="col-lg-3">
                       <form action="{{ route('store.category') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label class="form-control-label">Category name: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="category_name" value="John Paul" placeholder="Enter firstname">
                        </div>
  
                        <div class="form-layout-footer">
                          <button class="btn btn-info mg-r-5">Category Add</button>
                          <button class="btn btn-secondary">Cancel</button>
                        </div><!-- form-layout-footer -->
                       </form>
                    </div><!-- col-4 -->
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="lastname" value="1" placeholder="Enter lastname">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <h6 class="card-body-title">All CategorY</h6>
                        <div class="table-responsive">
                            <table class="table mg-b-0">
                              <thead>
                                <tr>
                               
                                  <th>List</th>
                                  <th>Category name</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  @php
                                  $i = 1;
                                  @endphp
                                  @foreach ($categories as $category)
                                  <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>{{ $category->category_name }}</td>
                                  <td>
                                  @if($category->status == 1)
                                  <a href="{{ url('admin/categories/inactive'.$category->id) }}" class="btn btn-sm btn-success">Active</a>
                                  @else 
                                  <a href="{{ url('admin/categories/active'.$category->id) }}" class="btn btn-sm btn-danger">Inactive</a>
                                  @endif
                                  </td>
                                  <td>
                                    
                                    <a href="{{ url('admin/categories/edit/'.$category->id) }}" class="btn btn-sm btn-success">Edit</a>
                                   
                                    <a href="{{ url('admin/categories/delete'.$category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                   
                                    </td>
                                  @endforeach
                                </tr>
                       
                              </tbody>
                            </table>
                          </div>
      
                  </div><!-- row -->
      
               
                </div><!-- form-layout -->
              </div><!-- card -->
  
        </div><!-- sl-pagebody -->
      </div><!-- sl-mainpanel -->
@endsection();