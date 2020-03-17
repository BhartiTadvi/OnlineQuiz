<!DOCTYPE html>
<html>
<head>
  <title>Online Quiz</title>
  <link href="{{ asset('css/quiztest.css') }}" rel="stylesheet">
  <link href="{{ asset('css/test.css') }}" rel="stylesheet">

</head>
<body>
<!-- multistep form -->
  <form id="msform" class="form-horizontal" method="POST" action="{{url('/test-store')}}">

    <h3>Online Quiz</h3>
  <!-- progressbar -->
   {{ csrf_field() }}
  <ul id="progressbar">
    <li class="active level">Easy</li>
    <li class="level">Moderate</li>
    <li class="level">Difficult</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>

     <ol>
          @foreach($easy as $easyQuestion)
              <li>
                  <strong> {{$easyQuestion->question}} </strong>
                  <input type="hidden" name="questions[{{$easyQuestion->id}}]" value="{{ $easyQuestion->id}}">
                    @foreach($easyQuestion->answers as $type)
                  <div class="optionLable">
                    <label class="container">{{$type->answer}} 
                    <input type="radio" name="answers[{{ $easyQuestion->id}}]"
                             value="{{$type->id}}"  id="option" data-value= "{{$type->id}}"/>
                    <span class="checkmark"></span> </label>
                  </div>
                  @endforeach
              </li>
            @endforeach
       </ol>
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
     <ol>
          @foreach($moderate as $moderateQuestion)
            <li>
                <strong> {{$moderateQuestion->question}} </strong>
                <input type="hidden" name="questions[{{$moderateQuestion->id}}]" value="{{ $moderateQuestion->id}}">
                  @foreach($moderateQuestion->answers as $type)
                <div class="optionLable">
                   <label class="container">{{$type->answer}} 
                    <input type="radio" name="answers[{{ $moderateQuestion->id}}]"
                           value="{{$type->id}}"  id="option" data-value= "{{$type->id}}"/>
                     <span class="checkmark"></span> </label>
                </div>
                @endforeach
            </li>
          @endforeach
       </ol>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
     <ol>
        @foreach($difficult as $difficultQuestion)
            <li>
                <strong> {{$difficultQuestion->question}} </strong>
                <input type="hidden" name="questions[{{$difficultQuestion->id}}]" value="{{ $difficultQuestion->id}}">
                  @foreach($difficultQuestion->answers as $type)
                <div class="optionLable">
                   <label class="container">{{$type->answer}} 
                    <input type="radio" name="answers[{{ $difficultQuestion->id}}]"
                           value="{{$type->id}}"  id="option" data-value= "{{$type->id}}"/>
                    <span class="checkmark"></span>
                    </label>
                </div>
                @endforeach
            </li>
          @endforeach
         </ol>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>
</form>

<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}">
</script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}">
</script>
<script src="{{ asset('js/quiztest.js') }}">
</script>
</body>
</html>