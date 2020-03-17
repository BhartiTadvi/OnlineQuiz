
@extends('layouts.master')
@section('content')
    @if ($errMessage = Session::get('errmsg'))
      <div class="alert alert-danger">
        <p>{{ $errMessage }}</p>
      </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">Edit answer</div>
                    <div class="box-body">
                     <form method="POST" action="{{url('/question-update',$question->id)}}" id="update_question" accept-charset="UTF-8" class="form-horizontal">
                                            {{ csrf_field() }}
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="name" class="control-label">Question</label>

                                <input class="form-control" name="question" type="text" id="question" value="{{$question->question}}">
                                
                                 {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
                            </div>
                         </div>
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="level" class="control-label">Level name</label>
                                <select class="form-control" name="level_id" id="level">
                                <option value="">Select level</option>
                                    @foreach($levels as $level)
                                    <option value="{{$level->id}}" @if($level->id == $question->level_id) selected="selected" @endif>{{$level->level_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                           <div class="form-group">
                              <label for="group" class="control-label">Group name</label>
                               <select class="form-control" name="group_id" id="group">
                                  <option value="">Select group</option>
                                  @foreach($groups as $group)
                                  <option value="{{$group->id}}" @if($group->id == $question->questionGroup[0]->group->id) selected="selected" @endif>{{$group->group_name}}</option>
                                  @endforeach
                               </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label style="margin-left: 18px;}"> Active </label>
                            <input type="radio" name="status" value="active" class="minimal-red" checked>
                            <label> Inactive </label>
                            <input type="radio" name="status" value="inactive" class="minimal-red">
                            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                        </div>
                       <div class="col-xs-12 col-sm-12 col-md-12">
                              <input class="btn btn-primary" type="submit">
                              <a href="{{route('question-index')}}" title="Back" class="btn btn-warning" role="button">Back</a>
                       </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
   
</script>
@endsection

