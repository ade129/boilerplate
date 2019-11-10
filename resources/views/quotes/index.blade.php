<section class="content-header">
    <h1>Quotes</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-quote-left" aria-hidden="true"></i> Quotes</li>
    </ol>
</section>

<section class="content">
      
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Index</h3>
        <div class="box-tools pull-right">
          <a href="{{url('quotes/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i> Create New</a>
        </div>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tittle</th>
            <th>Slug</th>
            <th>Images</th>
            <th>subject</th>
            <th>Tag</th>
            <th>status</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
        @foreach($quotes as $index => $quote)
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$quote->tittle}}</td>
            <td>{{$quote->slug}}</td>
            <td>
              {{-- images dapet dr model function --}}
                @if (is_null($quote->images))
                  <label> - </label>
                @else
                  <img class="img-rounded zoom" src="{{asset('images')}}/{{$quote->images->name }}" width="50">
                @endif
              </td>
            <td>{{$quote->subject}}</td>
            <td>
              @foreach ($quote->tags as $item)
                  {{$item->tag_name}}
              @endforeach
            </td>
            <td>
                <center>
                    @if ($quote->active)
                    <span class="label label-success">Active</span>
                    @else
                    <span class="label label-danger">Inactive</span>
                    @endif
                </center>
            </td>
            <td>
              <center>
                <a href="{{url('/quotes/update/'.$quote->idquotes)}}" ><i class="fa fa-pencil-square-o"></i></a>
                <a href="{{url('/quotes/show/'.$quote->slug)}}" ><i class="fa fa-eye"></i></a>
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