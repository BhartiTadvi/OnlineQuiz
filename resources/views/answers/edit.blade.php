
@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">Edit option</div>
                    <div class="box-body">
                     <form method="POST" action="{{url('/question-store')}}" id="create_question" accept-charset="UTF-8" class="form-horizontal">
                                            {{ csrf_field() }}
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="name" class="control-label">Option</label>

                                <input class="form-control" name="option" type="text" id="option">
                                
                                 {!! $errors->first('option', '<p class="help-block">:message</p>') !!}
                            </div>
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
    $(document).ready(function(){
        $("")
    });
</script>
@endsection

