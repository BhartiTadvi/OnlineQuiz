@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="box">
                    <div class="box-header">Result </div>
                    <div class="box-body">
                         <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{$result->id}}</td>
                                    </tr>
                                    <tr>
                                        <th> Candidate Name </th>
                                        @if(!empty($result->user))
                                        <td> {{$result->user->name}}</td>
                                        @else
                                        <td>Anynoums User</td>
                                        @endif
                                    </tr>
                                     <tr>
                                        <th> Obtained Marks </th>
                                        <td> {{$result->obtained_marks}}</td>
                                    </tr>
                                    <tr>
                                        <th> Total Marks </th>
                                        <td> {{$result->total_marks}}</td>
                                    </tr>
                                    <tr>
                                        <th> Percentage </th>
                                        <td> {{$result->percentage}}%</td>
                                    </tr>
                                 </tbody>
                            </table>
                        </div>
                        <a href="{{ route('user-result-index') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                            </button>
                        </a>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
