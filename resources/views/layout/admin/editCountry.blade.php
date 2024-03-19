@extends('layout/admin/index')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sửa chuyên mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Chuyên mục</a></li>
                    <li class="breadcrumb-item active">Admin</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <form method="post" action="{{url('/layout/admin/updateCountry')}}" >
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Country</label>
                    <input type="text" name="name" value="{{$country->name}}" class="form-control" placeholder="Country">
                </div>
                <button type="submit" class="btn btn-primary">Hoàn thành</button>
                <input type="hidden" name="id" value="{{$country->id}}">
            </div>
        </form>
    </div>
</section>
@endsection