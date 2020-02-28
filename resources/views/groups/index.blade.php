@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Question
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
                <a href="{{route('group-create')}}" class="btn btn-success btn-sm" title="Add New question">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add Group
                </a>
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
                            <th>Group name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($groups as $group)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$group->group_name}}</td>
                              <td>
                                <a href="{{route('group-show',$group->id)}}" title="View Question">
                                <button class="btn btn-success btn-sm">
                                  <i class="fa fa-eye" aria-hidden="true"></i> 
                                </button>
                                </a>
                                <a href="{{route('group-edit',$group->id)}}" title="Edit Question">
                                  <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                                    </i> Edit
                                  </button>
                                 </a>
                                 <form method="POST" action="{{route('group-delete',$group->id)}}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </button>
                                  </form>
                                </td>
                          </tr>
                        @endforeach
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