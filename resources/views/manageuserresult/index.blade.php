@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    User Result List
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
                
               </div>
              </div>
              @if ($message = Session::get('success'))
              <div class="alert alert-danger">
                <p>{{ $message }}</p>
              </div>
              @endif
          <!-- /.box-header -->
              <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                          <th>Id</th>
                            <th>Candidate Name</th>
                            <th>Obtained marks</th>
                            <th>Total marks</th>
                            <th>Percentage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                     	@forelse($results as $result)
                          <tr>
                            @if(!empty($result->user))
                              <td>{{$loop->iteration}}</td>
                              <td>{{$result->user->name}}</td>
                              @else
                              <td>{{$loop->iteration}}</td>
                              <td>Anynoums User</td>
                              @endif
                              <td>{{$result->obtained_marks}}</td>
                              <td>{{$result->total_marks}}</td>
                              <td>{{$result->percentage}}%</td>
                              <td>
                                <a href="{{route('user-result-show',$result->id)}}" title="View Question">
                                <button class="btn btn-success btn-sm">
                                  <i class="fa fa-eye" aria-hidden="true"></i> 
                                </button>
                                </a>
                                 <form method="POST" action="{{route('user-result-delete',$result->id)}}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete result" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </button>
                                  </form>
                                </td>
                          </tr>
                            @empty
                            <p style="color:red;margin: 0px 0px 0px 410px;">No data found</p>
                        @endforelse
                    </tbody>
                </table>
                 <div class="pagination-wrapper"> 
                    {!! $results->appends(['search' => Request::get('search')])->render() !!} 
                  </div>
              </div>
          </div>
       </div>
      </div>
  </section>
@endsection