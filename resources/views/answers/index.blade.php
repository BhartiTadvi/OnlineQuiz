@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Option
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
                            <th>Option</th>
                            <th>Correct Option</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($answers as $answer)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$answer->answer}}</td>
                              @if($answer->correct_option == 1)
                              <td>Correct</td>
                              @else
                              <td>Incorrect</td>
                              @endif
                              <td>
                                <a href="{{route('answer-show',$answer->id)}}" title="View Question">
                                <button class="btn btn-success btn-sm">
                                  <i class="fa fa-eye" aria-hidden="true"></i> 
                                </button>
                                </a>
                                <a href="{{route('answer-edit',$answer->id)}}" title="Edit Question">
                                  <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                                    </i> Edit
                                  </button>
                                 </a>
                                 <form method="POST" action="{{route('answer-delete',$answer->id)}}" accept-charset="UTF-8" style="display:inline">
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
                    {!! $answers->appends(['search' => Request::get('search')])->render() !!} 
                  </div>
              </div>
          </div>
       </div>
      </div>
  </section>
@endsection