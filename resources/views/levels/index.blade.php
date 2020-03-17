@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Level    
    <small></small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-right">
                <a href="{{route('level-create')}}" class="btn btn-success btn-sm" title="Add New question">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add Level
                </a>
               </div>
              </div>
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif

              @if ($errorMsg = Session::get('errmsg'))
              <div class="alert alert-danger">
                <p>{{ $errorMsg }}</p>
              </div>
              @endif
          <!-- /.box-header -->
              <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                          <th>#</th>
                            <th>level name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($levels as $level)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$level->level_name}}</td>
                              <td>
                                <a href="{{route('level-show',$level->id)}}" title="View Question">
                                <button class="btn btn-success btn-sm">
                                  <i class="fa fa-eye" aria-hidden="true"></i> 
                                </button>
                                </a>
                                <a href="{{route('level-edit',$level->id)}}" title="Edit Question">
                                  <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                                    </i> Edit
                                  </button>
                                 </a>
                                 <form method="POST" action="{{route('level-delete',$level->id)}}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </button>
                                  </form>
                                </td>
                          </tr>
                            @empty
                            <p>No data found</p>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagination-wrapper"> 
                    {!! $levels->appends(['search' => Request::get('search')])->render() !!} 
                </div>
              </div>
          </div>
       </div>
      </div>
  </section>
@endsection