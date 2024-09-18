@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Product Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Category List</li>
        </ol>
    </nav>


    <div class="row">

        <div class="col-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product Category Name</h4>
    
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
    
                        <div class="mb-3">
                            <label for="category" class="form-label">Product Category</label>
                            <input type="text" id="category" class="form-control" name="category_name">
                        </div>
    
                        
                        <div class="mb-3">
                            <label for="category" class="form-label">Product Photo</label>
                            <input type="file" name="photo" class="form-control" id = "image" autocomplete="of">
                        </div>

                        <div class="mb-3">
                            <img id="showImage" class="wd-150 rounded" height="150px"
                             src="" alt="profile">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Add Category">    

                    </form>
                </div>
            </div>
        </div>
    </div>




</div>
@endsection

<