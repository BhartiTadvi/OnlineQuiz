@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="box">
                    <div class="box-header">Question </div>
                    <div class="box-body">
                         <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{$question->id}}</td>
                                    </tr>
                                    <tr>
                                        <th> Question </th>
                                        <td> {{ $question->question }} </td>
                                    </tr>
                                     <tr>
                                        <th> Options </th>
                                        <td>@foreach($question->answers as $option)
                                        <li>{{$option->answer}} </li>
                                        @endforeach</td>
                                    </tr>
                                    <tr>
                                        <th>Group Name</th>
                                        <td>                                    {{$question->questionGroup[0]->group->group_name}}</td>
                                    </tr>
                                 </tbody>
                            </table>
                        </div>
                        <a href="{{ route('question-index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
