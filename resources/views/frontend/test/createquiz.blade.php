<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link href="{{ asset('css/quiz.css') }}" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
	<form id="onlineQuiz" class="form-horizontal" method="POST" action="{{url('/test-store')}}">
    	 {{ csrf_field() }}
    	<h1 id="headquiz">Online Quiz</h1>
    	<div class="group">
		 @foreach($groups as $grp)
		 <a href="{{ route('online-quiz-create') }}" id = "{{$grp->id}}" title="Aptitude"  class="btn">{{$grp->group_name}}</a>
		 @endforeach
		 </div>
		  <ol>
	        @foreach($groupQuestions as $group)
	        {{$group->group_name}}
            <li>
                <strong>{{$group->question->question}} </strong>
                <input type="hidden" name="questions[{{$loop->iteration}}]" value="{{ $group->question->id}}">
                @foreach($group->question->answers as $option)
                <div>
                    <input type="radio" name="answers[{{ $group->question->id}}]"
                         value="{{$option->id}}" onclick= "chooseOption()" id="option" data-value= "{{$option->id}}"/>
                    <label class ="option" for="option">{{$option->answer}} 
                    </label>
                </div>
                @endforeach
            </li>
       		@endforeach
           
  		 </ol>
  		
        <input type="submit" name="Submit" class="btn" id="submit" value="Submit Quiz">
    </form>
</body>
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript">
 
function chooseOption(){

 var optionValue = [$("input[type='radio']:checked").val()]; 
 
 var optionIds = [];
 
		$('input[type="radio"]:checked').each(function () {
		   optionIds.push($(this).attr('data-value'));
		   $("#optionsId").val(optionIds);
		});
    var url = "online-quiz";
		$.ajax({
	  		url:url,
	        dataType: "json",
	        type:"get",
	        async: true,
	        success: function(data) {
	        	console.log(data);

        }
    });
	}
</script>
</html>