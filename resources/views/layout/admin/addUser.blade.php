@extends('layout/admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add User</h1>
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
        <form method="post">
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
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Email </label>
                    <input type="text" name="email" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Phone </label>
                    <input type="text" name="phone" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="adress" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Age </label>
                    <input type="text" name="age" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control select2">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</section>
@endsection