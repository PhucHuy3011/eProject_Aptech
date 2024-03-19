@extends('layout/admin/index')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thêm bài viết</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
                    <li class="breadcrumb-item active">Admin</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <form method="post" enctype="multipart/form-data" action="{{url('layout/admin/saveNews')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" required="required" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="date" id="date">
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" required="required" name="author" class="form-control" placeholder="Author">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="content" rows="10" cols="80"></textarea>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" required="required" name="title" class="form-control" placeholder="Description of News">
                </div>
                <div class="form-group">
                    <label>Picture</label>
                    <input type="file" name="picture" >
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" required="required" name="description" class="form-control" placeholder="Description of Picture">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="categoriesname" class="form-control select2">
                        @foreach($categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <select name="countryname" class="form-control select2">
                        @foreach($countries as $country)
                        <option value="{{$country->name}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</section>
@endsection