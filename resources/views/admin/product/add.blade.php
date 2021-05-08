@extends('admin.admin_master')
@section('products')
show-sub active
@endsection
@section('add-product')
  active
@endsection
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Admin</a>
        <span class="breadcrumb-item active">Add Product</span>
    </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Add New Product</h6>
            <form action="{{route('store-products')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-layout">
                @if(session('success'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> {{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
             @endif
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_name" value="{{old('product_name')}}" placeholder="Enter Product Name">
                    @error('product_name')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_code" value="{{old('product_code')}}" placeholder="Enter Product Code">
                    @error('product_code')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_price" value="{{old('product_price')}}" placeholder="Enter Product Price">
                    @error('product_price')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="quantity" value="{{old('product_quantity')}}" placeholder="Enter Product Quantity">
                      @error('quantity')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" name="category_id" data-placeholder="Choose country">
                      <option label="Choose Category"></option>
                        @foreach ($categories as $category )
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                      <select class="form-control select2" name="brand_id" data-placeholder="Choose country">
                        <option label="Choose Barnd"></option>
                        @foreach ($brands as $brand )
                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                          @endforeach
                      </select>
                      @error('brand_id')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Sort Description <span class="tx-danger">*</span></label>
                      <textarea id="summernote" name="sort_description" ></textarea>
                    </div>
                    @error('sort_description')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div><!-- col-12 -->

                  <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Long Description <span class="tx-danger">*</span></label>
                      <textarea id="summernote2" name="long_description" ></textarea>
                    </div>
                    @error('long_description')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div><!-- col-12 -->

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Main Thumnail: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="img_one">
                    </div>
                    @error('img_one')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="img_two">
                    </div>
                    @error('img_two')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Image TThree: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="img_three">
                    </div>
                    @error('img_three')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div><!-- col-4 -->
  
              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5" style="margin-left: 15px">Submit Form</button>
              </div><!-- form-layout-footer -->
            </form>
            </div><!-- form-layout -->
          </div><!-- card -->
        </div>
      </div>
    </div>
</div> 
@endsection