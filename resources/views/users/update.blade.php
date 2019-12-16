<section class="content-header">
    <h1>
        Users
        <small>Master</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Master</a>
        <li><a href="{{url('/users')}}"><i class="fa fa-users"></i>Users</a>
        <li class="active"><i class="fa fa-plus"></i>Update</a>
    </ol>
</section>

<!-- main content -->
<section>
<!-- default box -->
        <section class="content">

            <section class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update</h3>
                </div>
                <div class="box-body">
                    {{Form::open(array('url' => 'users/update/'.$user->idusers, 'class' => 'form-horizontal','files' => 'true'))}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-5">
                        <!-- {{-- name:name untuk melempar controller ke database --}} -->
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-5">
                        <!-- {{-- name:name untuk melempar controller ke database --}} -->
                        <input type="text" class="form-control" placeholder="Email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="role_type" required>
                                <option value="LD">Leader</option>
                                <option value="RO">Relation Oficcer</option>
                            </select>
                        </div>
                 </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <a href="{{url('user')}}" class="btn btn-warning pull-right">Back</a>
                      <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                  </div>
                 {{Form::close()}}
                </div>
            </section>

        </section>

</section>