
@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">Create New Question</div>
                    <div class="box-body">
                     <form method="POST" action="{{url('/question-store')}}" id="create_question" accept-charset="UTF-8" class="form-horizontal">
                                            {{ csrf_field() }}
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="name" class="control-label">Question</label>

                                <input class="form-control" name="question" type="text" id="question">
                                
                                 {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="margin-left:2px" for="option" class="control-label">Option 1</label>

                              <div class="input-group">
                                    <span class="input-group-addon">
                                      <input type="radio" name="option[]" value="1">
                                    </span>
                                <input type="text" class="form-control" name= "option[]">
                              </div>
                                 <!-- /input-group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="margin-left:2px" for="option" class="control-label">Option 1</label>

                              <div class="input-group">
                                    <span class="input-group-addon">
                                      <input type="radio" name="option[]" value="1">
                                    </span>
                                <input type="text" class="form-control" name= "option[]">
                              </div>
                                 <!-- /input-group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="margin-left:2px" for="option" class="control-label">Option 1</label>

                              <div class="input-group">
                                    <span class="input-group-addon">
                                      <input type="radio" name="option[]" value="1">
                                    </span>
                                <input type="text" class="form-control" name= "option[]">
                              </div>
                                 <!-- /input-group -->
                            </div>
                           
                        </div>
                         <div class="row option">
                            <div class="col-lg-6">
                                <label style="margin-left:2px" for="option" class="control-label">Option 3</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                      <input type="radio" name="option[]" value="1">
                                    </span>
                                    <input type="text" class="form-control"  name= "option[]">
                                </div>
                                 <!-- /input-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-left: 18px;}"> Active </label>
                            <input type="radio" name="status" value="1" class="minimal-red" checked>
                            <label> Inactive </label>
                            <input type="radio" name="status" value="0" class="minimal-red">
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

