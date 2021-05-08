@extends('admin.admin_master')
@section('brand')
  active
@endsection
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Admin</a>
        <span class="breadcrumb-item active">Brand</span>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-8">
      
              <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Basic Responsive DataTable</h6>
                @if(session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> {{session('delete')}}</strong>
                    <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
             @endif
             
             @if(session('catupdated'))
             <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong> {{session('catupdated')}}</strong>
                 <button type="button" class="close" data-dismiss="alert"
                 aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             </div>
          @endif
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">SI</th>
                        <th class="wd-15p">Category name</th>
                        <th class="wd-20p">Status</th>
                        <th class="wd-25p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                    @endphp
                        @foreach ($brands as $row )
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$row->brand_name}}</td>
                        <td>
                            @if($row->status==1)
                            <span class="badge badge-success">Acitve</span>
                            @else()
                            <span class="badge badge-danger">Acitve</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('admin/brands/edit/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="{{url('admin/brands/delete/'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                            @if($row->status==1)
                            <a href="{{url('admin/brands/inactive/'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>
                            @else
                            <a href="{{url('admin/brands/active/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                            @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">Add Brand</div>

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
                <form action="{{route('store.brand')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Add Brenad</label>
                        <input type="text" name="brand_name"class="form-control
                         @error('brand_name')is-invalid
                          @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brnad">

                    @error('brand_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
             </div>
          </div>
        </div>
    </div>
</div> 
@endsection