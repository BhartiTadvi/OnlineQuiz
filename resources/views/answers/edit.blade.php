@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">Edit option</div>
                    <div class="box-body">
                     <form method="POST" action="{{route('answer-update',$answer->id)}}" id="create_question" accept-charset="UTF-8" class="form-horizontal">
                                            {{ csrf_field() }}
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="name" class="control-label">Answer</label>

                                <input class="form-control" name="answer" type="text" id="answer" value="{{$answer->answer}}">
                                
                                 {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        
	                     <div class="col-xs-12 col-sm-12 col-md-12">
	                            <input class="btn btn-primary" type="submit">
	                            <a href="{{route('answer-index')}}" title="Back" class="btn btn-warning" role="button">Back</a>
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

