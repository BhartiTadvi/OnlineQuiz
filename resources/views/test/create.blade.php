@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">Test</div>
                    <div class="box-body">
                     <form method="POST" action="{{url('/test-store')}}" id="create_test">
                                            {{ csrf_field() }}
                         @foreach($questions as $question) 
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <div class="form-group">
                                        <strong>Question {{ $loop->iteration }}.<br />{{nl2br($question->question)}}  </strong>
                                        <input
                                            type="hidden"
                                            name="questions[{{ $loop->iteration }}]"
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
                        
                         <div class="col-xs-12 col-sm-12 col-md-12">
                                <input class="btn btn-primary" type="submit">
                                
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
   
</script>
@endsection



