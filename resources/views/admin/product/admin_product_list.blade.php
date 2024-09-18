@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">


                 
  @extends('admin.admin_dashboard')

  @section('admin')
      <div class="page-content">
  
  
  
          <nav class="page-breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Product</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product List</li>
              </ol>
          </nav>
  
  
  
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                          <h6 class="card-title">Product List</h6>
                          <a href="{{ route('admin.add.product') }}" class="btn btn-primary">Add Product</a>
                      </div>
                  </div>
              </div>
          </div>
  
  
  
  
  
      </div>
  @endsection
  
               
     



</div>

@endsection