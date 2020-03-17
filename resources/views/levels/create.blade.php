@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">Create Level</div>
                    <div class="box-body">
                     <form method="POST" action="{{url('/level-store')}}" id="create-level" accept-charset="UTF-8" class="form-horizontal">
                          {{ csrf_field() }}
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="level" class="control-label">Level name</label>
                                <input class="form-control" name="level_name" type="text" id="level_name" value="">
                                 {!! $errors->first('level_name', '<p class="help-block">:message</p>') !!}
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
                              <a href="{{route('level-index')}}" title="Back" class="btn btn-warning" role="button">Back</a>
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
  $("#create-level").validate({
    rules: {
      level_name: 'required',
      status: 'required',
      },
        messages: {
          level_name: {
          required: "Please enter level name",
          }, 
        },             
    submitHandler: function(create_level) {
    create_level.submit();
    }
  });
});
</script>
@endsection


