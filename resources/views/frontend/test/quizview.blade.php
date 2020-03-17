 <!DOCTYPE html>
 <html>
 <head>
 	<title>Online Quiz</title>
 </head>
  <link href="{{ asset('css/quiz.css') }}" rel="stylesheet">

 <body>
<form id="regForm" action="">

<h1>Online Quiz</h1>

 @foreach($groups as $grp)
 <a href="{{ route('online-quiz-create',$grp->id) }}" title="Aptitude" class="btn">{{$grp->group_name}}</a>
 @endforeach
</form>
<script src="{{asset('js/quiz.js')}}"></script>
</body>
</html>
