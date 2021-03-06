@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="box">
                    <div class="box-header">Option </div>
                    <div class="box-body">
                         <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Question Id</th>
                                        <td>{{ $answer->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Question </th>
                                        <td> {{ $answer->answer }} </td>
                                    </tr>
                                 </tbody>
                            </table>
                        </div>
                        <a href="{{ route('answer-index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
