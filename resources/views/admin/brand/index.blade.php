@extends('admin.admin_layouts')
@section('brand') active @endsection
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Brand</a>
          <a class="breadcrumb-item" href="index.html">Pages</a>
          <span class="breadcrumb-item active">Brand Page</span>
        </nav>
  
        <div class="sl-pagebody">
      
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">You Your Brand</h6>
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
                       <form action="{{ route('store.brand') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label class="form-control-label">brand name: <span class="tx-danger">*</span></label>
                          <input class="form-control" @error('brand_name') is-invalid @enderror type="text" name="brand_name" value="" placeholder="enter brand name">
                        </div>
                        @error('brand_name')
                        <span class="text-danger">{{ $message }}</span>
                            
                        @enderror
  
                        <div class="form-layout-footer">
                          <button class="btn btn-info mg-r-5">Brand Add</button>
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
                        <h6 class="card-body-title">All Brads</h6>
                        <div class="table-responsive">
                            <table class="table mg-b-0">
                              <thead>
                                <tr>
                               
                                  <th>List</th>
                                  <th>Brand name</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  @php
                                  $i = 1;
                                  @endphp
                                  @foreach ($brands as $brand)
                                  <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>{{ $brand->brand_name }}</td>
                                  <td>
                                  @if($brand->status == 1)
                                  <a href="{{ url('admin/brands/inactive'.$brand->id) }}" class="btn btn-sm btn-success">Active</a>
                                  @else 
                                  <a href="{{ url('admin/brands/active'.$brand->id) }}" class="btn btn-sm btn-danger">Inactive</a>
                                  @endif
                                  </td>
                                  <td>
                                    
                                    <a href="{{ url('admin/brand/edit/'.$brand->id) }}" class="btn btn-sm btn-success">Edit</a>
                                   
                                    <a href="{{ url('admin/brand/delete'.$brand->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                   
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