
@extends('layouts.master')
@section('content')
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

