@extends('layout/admin/index')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add News</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">News</a></li>
                    <li class="breadcrumb-item active">Admin</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <form method="post" enctype="multipart/form-data" action="{{url('layout/admin/updateNews')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" required="required" name="name" value="{{$news->name}}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="date" value="{{$news->date}}" id="date">
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" required="required" name="author" value="{{$news->author}}" class="form-control" placeholder="Author">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="content" rows="10" cols="80">{{$news->content}}</textarea>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" required="required" name="title" value="{{$news->title}}" class="form-control" placeholder="Description of News">
                </div>
                <div class="form-group">
                    <label>Picture</label>
                    <!-- Display current picture -->
                    @if($news->picture)
                    <img src="{{asset('images/'.$news->picture)}}" width="100" height="100" alt="Current Picture">
                    @endif
                    <!-- File input for uploading a new picture -->
                    <input type="file" name="picture">

                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" required="required" name="description" value="{{$news->description}}" class="form-control" placeholder="Description of Picture">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="categoriesname" class="form-control select2">
                        @foreach($categories as $category)
                        <option value="{{$category->name}}" {{$category->name == $news->categoriesname ? 'selected' : ''}}>
                            {{$category->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <select name="countryname" class="form-control select2">
                        @foreach($countries as $country)
                        <option value="{{$country->name}}" {{$country->name == $news->countryname ? 'selected' : ''}}>
                            {{$country->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <input type="hidden" name="id" value="{{$news->id}}">
            </div>
        </form>
    </div>
</section>

@endsection