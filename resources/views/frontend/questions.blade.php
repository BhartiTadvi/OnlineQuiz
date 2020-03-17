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
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th> Question </th>
                                        <td> </td>
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
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="box">
                    <div class="box-header">Question </div>
                    <div class="box-body">
                    @foreach($questions as $question)
                    
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <div class="form-group">
                                <strong>Question {{$loop->iteration}}{{$question->question}}</strong>
                                <input
                                    type="hidden"
                                    name="questions[{{$loop->iteration}}]"
                                    value="{{ $question->id }}">
                            @foreach($question->answers as $option)
                                <br>
                                <label class="radio-inline">
                                    <input
                                        type="radio"
                                        name="answers[{{ $question->id }}]"
                                        value="{{ $option->id }}">
                                    {{ $option->answer }}
                                </label>
                            @endforeach
                            </div>
                        </div>
                    </div>
            
                @endforeach 
                        <a href="" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> submit</button></a>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection