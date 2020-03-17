<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<style>
body {font-family: Arial;margin:0px 137px 22px 160px;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #b94e7ae0;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #159241ed;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
#submitQuiz{
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
    text-decoration: none;
    border-radius: 50px;  

}

</style>
</head>
<body>

<form id="onlineQuiz" class="form-horizontal" method="POST" action="{{url('/test-store')}}">
       {{ csrf_field() }}
      <h1 id="headquiz">Online Quiz</h1>

<div class="tab">
  @foreach($groups as $grp)
  <button class="tablinks" data-id="{{$grp->id}}" onclick="openGroup(event, '{{$grp->group_name}}','{{$grp->id}}')">{{$grp->group_name}}</button>
  @endforeach
</div>

<div id="Aptitude" class="tabcontent" style="display: block;">
  <h4>Each question carry 2 marks</h4>
  
  <h3>Aptitude</h3>
   <ol>
          @foreach($aptitudeQuestions as $group)
          {{$group->group_name}}
            <li>
                <strong>{{$group->question->question}} </strong>
                <input type="hidden" name="questions[{{$group->question->id}}]" value="{{ $group->question->id}}">
                @foreach($group->question->answers as $option)
                <div>
                    <input type="radio" name="answers[{{ $group->question->id}}]"
                         value="{{$option->id}}" id="option" data-value= "{{$option->id}}"/>
                    <label class ="option" for="option">{{$option->answer}} 
                    </label>
                </div>
                @endforeach
            </li>
          @endforeach
       </ol>
</div>

<div id="Reasoning" class="tabcontent">
  <h3>Reasoning</h3>
    <ol>
          @foreach($reasoningQuestions as $group)
          {{$group->group_name}}
            <li>
                <strong>{{$group->question->question}} </strong>
                <input type="hidden" name="questions[{{$group->question->id}}]" value="{{ $group->question->id}}">
                @foreach($group->question->answers as $option)
                <div>
                    <input type="radio" name="answers[{{ $group->question->id}}]"
                         value="{{$option->id}}" id="option" data-value= "{{$option->id}}"/>
                    <label class ="option" for="option">{{$option->answer}} 
                    </label>
                </div>
                @endforeach
            </li>
          @endforeach
       </ol>
</div>

<div id="Programming" class="tabcontent">
  <h3>Programming</h3>
    <ol>
          @foreach($programmingQuestions as $group)
          {{$group->group_name}}
            <li>
                <strong>{{$group->question->question}} </strong>
                <input type="hidden" name="questions[{{$group->question->id}}]" value="{{ $group->question->id}}">
                @foreach($group->question->answers as $option)
                <div>
                    <input type="radio" name="answers[{{ $group->question->id}}]"
                         value="{{$option->id}}"  id="option" data-value= "{{$option->id}}"/>
                    <label class ="option" for="option">{{$option->answer}} 
                    </label>
                </div>
                @endforeach
            </li>
          @endforeach
       </ol>
  
   <button type="submit" id="submitQuiz" value="Submit Quiz" class="btn quiz-btn">Submit Quiz </button>
</div>

</form>
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}">
</script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}">
</script>
<script>

 function openGroup(evt, groupName,groupId) {

  evt.preventDefault();
  
  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(groupName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html> 
