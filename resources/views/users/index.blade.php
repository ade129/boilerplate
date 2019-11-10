<section class="content-header">
        <h1>Users</h1>
        <ol class="breadcrumb">
          <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><i class="fa fa-users" aria-hidden="true"></i> Users</li>
        </ol>
</section>
      
      <!-- Main content -->
      <section class="content">
      
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Index</h3>
            <div class="box-tools pull-right">
              <a href="{{url('users/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i> Create New</a>
            </div>
          </div>
          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{$user->idusers}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  <center>
                    <a href="{{url('/users/update/'.$user->idusers)}}" ><i class="fa fa-pencil-square-o"></i></a>
                  </center>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      
      </section>
      