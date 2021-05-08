@extends('admin.admin_master')
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Brand Update</span>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">
<div class="col-md-8 m-auto">
    <div class="card">
        <div class="card-header"></div>

            <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> {{session('succcess')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                             @endif
                <form action="{{route('update.brand')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$brand->id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Update Brand</label>
                        <input type="text" name="brand_name"class="form-control
                         @error('brand_name')is-invalid
                          @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brand->brand_name}}">
                    @error('brand_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
             </div>
          </div>
        </div>
    </div>
</div> 
@endsection