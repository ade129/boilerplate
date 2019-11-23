<section class="content-header">
    <h1>
        Quotes
        <small>Blogs</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fas fa-blog"></i>Blogs</a>
        <li><a href="{{url('/quotes')}}"><i class="fa fa-quote-left"></i>Quotes</a>
        <li class="active"><i class="fa fa-plus"></i>Create New</a>
    </ol>
</section>

<section>

    <!-- {{-- default box --}} -->
    <section class="content">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Update</h3> 
                <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#myModal">Delete</button>
              </div>
              <div class="box-body">
                {{Form::open(array('url' => 'quotes/update/'.$quote->idquotes, 'class' => 'form-horizontal','files' => 'true'))}}
                <div class="form-group">
                  <label class="col-sm-2 control-label"> Tittle</label>
                  <div class="col-sm-5">
                    <!-- {{-- name:name untuk melempar controller ke database --}} -->
                    <input type="text" class="form-control" value="{{$quote->tittle}}" name="tittle" required>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Subject</label>
                    <div class="col-sm-5">
                    <textarea name="subject" rows="5" class="form-control">{{$quote->subject}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tags</label>
                  <div class="col-sm-5">
                    <select name="tag[]" class="form-control select2" multiple="multiple">
                      @foreach ($tags as $tag)
                        <option value="{{$tag->idtags}}" @if(in_array($tag->idtags,$data_tags))
                            selected
                        @endif>{{$tag->tag_name}}</option>
                      @endforeach
                      
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Images<span class="required">*</span>
                    </label>
                    <div class="col-sm-5">
                      <input type="file" id="images" name="images" class="form-control col-md-7 col-xs-12">
                      {{-- <img class="img-rounded zoom" id="img-upload" width="50"> --}}
                      <img class="img-rounded zoom" id="img-upload" src="{{asset('images')}}/{{$quote->images }}" width="50">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="active" checked> Active
                        </label>
                      </div>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <a href="{{url('quotes')}}" class="btn btn-warning pull-right">Back</a>
                    <input type="submit" value="Save" class="btn btn-primary">
                  </div>
                </div>
                {{ Form::close() }}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          
          </section>
</section>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Quotes</h4>
      </div>
      <div class="modal-body">
        <p>yakin ingin hapus Quotes??</p>
      </div>
      <div class="modal-footer">
          {{Form::open(array('url' => 'quotes/delete/'.$quote->idquotes,'method'=>'delete','class' => 'form-horizontal'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <input type="submit" class="btn btn-danger" value="Yes">
        {{Form::close()}}
      </div>
    </div>
    
  </div>
</div>


