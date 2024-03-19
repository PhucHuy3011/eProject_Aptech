   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{asset('admin')}}/plugins/daterangepicker/daterangepicker.css">
   <script>
       $(function() {
           $("#birthday").datepicker({
               dateFormat: 'dd/mm/yy'
           });
       });
   </script>
@extends('layout/admin/index')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active">Admin</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <form method="post" action="{{url('/admin/updateUser')}}">
            @csrf
            <div class="card-body">
                <?php
                if (isset($alert['success'])) { ?>
                    <div class="form-group alert alert-primary">
                        <?= $alert['success'] ?>
                    </div>
                <?php }
                ?>
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Email </label>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Phone </label>
                    <input type="text" name="phone" value="{{$user->phone}}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="{{$user->address}}" class="form-control" id="birthday" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Birthday </label>
                    <input type="date" name="birthday" value="{{$user->birthday}}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control select2">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <input type="hidden" name="id" value="{{$user->id}}">
            </div>
        </form>
    </div>
</section>
@endsection

   <!-- daterangepicker -->
   <script src="{{asset('admin')}}/plugins/moment/moment.min.js"></script>
   <script src="{{asset('admin')}}/plugins/daterangepicker/daterangepicker.js"></script>