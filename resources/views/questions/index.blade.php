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
                <a href="{{route('question-create')}}" class="btn btn-success btn-sm" title="Add New question">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add Question
                </a>
               </div>
              </div>
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif

              @if ($errMessage = Session::get('errmsg'))
              <div class="alert alert-danger">
                <p>{{ $errMessage }}</p>
              </div>
              @endif
              
          <!-- /.box-header -->
              <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                          <th>#</th>
                            <th>Question</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($questions as $question)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="width: 789px;">{{$question->question}}</td>
                              <td>
                                <a href="{{route('question-show',$question->id)}}" title="View Question">
                                <button class="btn btn-success btn-sm">
                                  <i class="fa fa-eye" aria-hidden="true"></i> 
                                </button>
                                </a>
                                <a href="{{route('question-edit',$question->id)}}" title="Edit Question">
                                  <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true">
                                    </i> Edit
                                  </button>
                                 </a>
                                 <form method="POST" action="{{route('question-delete',$question->id)}}" accept-charset="UTF-8" style="display:inline">
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
                    {!! $questions->appends(['search' => Request::get('search')])->render() !!} 
                </div>
              </div>
          </div>
       </div>
      </div>
  </section>
@endsection