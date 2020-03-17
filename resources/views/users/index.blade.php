@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    User    
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
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif
          <!-- /.box-header -->
              <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                          <th>#</th>
                            <th>User name</th>
                            <th>Email Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                <a href="{{route('user-show',$user->id)}}" title="View Question">
                                <button class="btn btn-success btn-sm">
                                  <i class="fa fa-eye" aria-hidden="true"></i> 
                                </button>
                                </a>
                                 <form method="POST" action="{{route('user-delete',$user->id)}}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
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
                </div>
              </div>
          </div>
       </div>
      </div>
  </section>
@endsection