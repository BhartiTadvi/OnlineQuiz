@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="box">
                    <div class="box-header">Level </div>
                    <div class="box-body">
                         <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $level->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Level </th>
                                        <td> {{ $level->level_name }} </td>
                                    </tr>
                                 </tbody>
                            </table>
                        </div>
                        <a href="{{ route('level-index') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                            </button>
                        </a>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
