@extends('layout/admin/index')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List News</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Home</a></li>
                    <li class="breadcrumb-item active">News</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            if (isset($_SESSION['thongbao'])) { ?>
                                <div class="form-group alert alert-primary">
                                    <?= $_SESSION['thongbao'] ?>
                                    <?php unset($_SESSION['thongbao']); ?>
                                </div>
                            <?php }
                            ?>
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <!-- Your table header -->
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Name</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Description</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Picture</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Title</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Category</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Country</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Author</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Date</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Edit</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Delete</th>

                                        </tr>
                                    </thead>
                                </thead>
                                <tbody>
                                    @foreach($news as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>
                                            {{$post->name}}
                                        </td>
                                        <td>
                                            {{$post->title}}
                                        </td>
                                        <td>
                                            <img src="{{asset('images/'.$post->picture)}}" width="100" height="100">
                                        </td>
                                        <td>
                                            {{$post->description}}
                                        </td>
                                        <td>
                                            {{$post->categoriesname}}
                                        </td>
                                        <td>
                                            {{$post->countryname}}
                                        </td>
                                        <td>
                                            {{$post->author}}
                                        </td>
                                        <td>
                                            {{$post->date}}
                                        </td>
                                        <td style="text-align: center;">
                                            <span class="badge bg-primary">
                                                <a href="{{url('layout/admin/editNews/'.$post->id)}}">
                                                    <ion-icon name="create-outline"><i class="fa fa-plus-circle" aria-hidden="true"></i></ion-icon>
                                                </a>
                                            </span>
                                        </td>
                                        <td style="text-align: center;">
                                            <span class="badge bg-danger">
                                                <a href="{{url('layout/admin/deleteNews/'.$post->id)}}">
                                                    <ion-icon name="trash-outline"><i class="fa fa-minus-circle" aria-hidden="true"></i></ion-icon>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Pagination Links -->
                            {{ $news->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>

@endsection