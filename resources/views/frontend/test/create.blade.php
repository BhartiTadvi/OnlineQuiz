<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Online Quiz</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/quiz.css')}}" />
</head>
<body>
    <div id="page-wrap">
        <h1>Online Quiz</h1>
        <form id="quiz" method="POST" action="{{url('/test-store')}}" accept-charset="UTF-8" class="form-horizontal">
             {{ csrf_field() }}
           
            <ol>
                @foreach($questions as $question)
                <li>
                    <strong>{{$question->question}} </strong>
                     <input type="hidden" name="questions[{{$loop->iteration}}]" value="{{ $question->id }}">
                    @foreach($question->answers as $option)
                    <div class ="optionName">
                        <input type="radio" name="answers[{{ $question->id }}]"
                          value="{{ $option->id }}" />
                        <label class ="option" for="option"> {{ $option->answer }} </label>
                    </div>
                    @endforeach
                </li>
                @endforeach 
            </ol>
            <input type="submit" value="Submit Quiz" class="btn quiz-btn" />
        </form>
    </div>
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>    
<script type="text/javascript">
    
</script>
</body>

</html>

