@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="box">
                    <div class="box-header">Group </div>
                    <div class="box-body">
                         <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $group->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Group </th>
                                        <td> {{ $group->group_name }} </td>
                                    </tr>
                                 </tbody>
                            </table>
                        </div>
                        <a href="{{ route('group-index') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                            </button>
                        </a>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
