@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">Create question</div>
                    <div class="box-body">
                     <form method="POST" action="{{url('/question-store')}}" id="create_question" accept-charset="UTF-8" class="form-horizontal">
                                            {{ csrf_field() }}
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="question" class="control-label">Question</label>

                                <input class="form-control" name="question" type="text" id="question" value="">
                                
                                 {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="level" class="control-label">Level name</label>
                                <select class="form-control" name="level_id" id="level">
                                <option value="">Select level</option>
                                    @foreach($levels as $level)
                                    <option value="{{$level->id}}">{{$level->level_name}}
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
                                <option value="{{$group->id}}">{{$group->group_name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="option1" class="control-label">Option 1</label>

                                <input class="form-control" name="option[]" type="text" id="option1" value="">
                                
                                 {!! $errors->first('option', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="option2" class="control-label">Option 2</label>

                                <input class="form-control" name="option[]" type="text" id="option2" value="">
                                
                                 {!! $errors->first('option', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="option3" class="control-label">Option 3</label>

                                <input class="form-control" name="option[]" type="text" id="option3" value="">
                                
                                 {!! $errors->first('option', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="option4" class="control-label">Option 4</label>

                                <input class="form-control" name="option[]" type="text" id="option4" value="">
                                
                                 {!! $errors->first('option', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="correct_answer" class="control-label">Correct Answer</label>

                                <input class="form-control" name="correct_answer" type="text" id="correct_answer" value="">
                                
                                 {!! $errors->first('option', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                         <div class="form-group">
                            <label style="margin-left: 18px;}"> Active </label>
                            <input type="radio" name="status" value="active" class="minimal-red" checked>
                            <label> Inactive </label>
                            <input type="radio" name="status" value="inactive" class="minimal-red">
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
  $("#create_question").validate({
    rules: {
      question: 'required',
      level_id: 'required',
      group_id: 'required',
      correct_answer:'required',
      'option[]': {
                required: true,
            },
      },
        messages: {
          question: {
          required: "Please enter question name",
          },
          correct_answer: {
          required: "Please enter correct answer",
          }, 
        },             
    submitHandler: function(create_question) {
    create_question.submit();
    }
  });
});
</script>
@endsection

