@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">Edit group</div>
                    <div class="box-body">
                     <form method="POST" action="{{url('/group-update',$group->id)}}" id="create_question" accept-charset="UTF-8" class="form-horizontal">
                              {{ csrf_field() }}
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label style="margin-left:2px" for="question" class="control-label">Group name</label>
                                <input class="form-control" name="group_name" type="text" id="group_name" value="{{$group->group_name}}">
                                 {!! $errors->first('group_name', '<p class="help-block">:message</p>') !!}
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
                                <a href="{{route('group-index')}}" title="Back" class="btn btn-warning" role="button">Back</a>
                         </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection


