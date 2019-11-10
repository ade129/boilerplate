<section class="content-header">
    <h1>
        Tittle
        <small>Blog</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Blog</a>
        <li><a href="{{url('/tittle')}}"><i class="fa fa-users"></i>Tittle</a>
        <li class="active"><i class="fa fa-plus"></i>Create New</a>
    </ol>
</section>

<section>
    <!-- default box -->
            <section class="content">
    
                <section class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create New</h3>
                    </div>
                    <div class="box-body">
                        {{ Form::open(array('url' => 'tittke/create-new', 'class' => 'form-horizontal')) }}
                    <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-5">
                            <!-- {{-- name:name untuk melempar controller ke database --}} -->
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                        </div>
                    </div>

                    
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                        {{Form::close()}}
                    </div>
                </section>
    
            </section>
    
    </section>