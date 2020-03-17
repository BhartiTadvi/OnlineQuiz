<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('css/test.css') }}" rel="stylesheet">
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<style>
body {font-family: Arial;margin:0px 137px 22px 160px;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #35cec761;
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
 background-color: #f1e6fabf;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  background-color: #e6e6fa80;
}
#submitQuiz{
  background-color: #1753af;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
    text-decoration: none;  
}

</style>
</head>
<body>
  <form id="onlineQuiz" class="form-horizontal" method="POST" action="{{url('/test-store')}}">
       {{ csrf_field() }}
    <h1 id="headquiz">Online Quiz</h1>

   <!--  <div class="tab">
      @foreach($levels as $level)
      <button class="tablinks" data-id="{{$level->id}}" onclick="openGroup(event, '{{$level->level_name}}','{{$level->id}}')">{{$level->level_name}}</button>
      @endforeach
    </div> -->
    <div class="tab">
    <button class="tablinks active" onclick="openGroup(event, 'Easy')">Easy</button>
    <button class="tablinks" onclick="openGroup(event, 'Moderate')">Moderate</button>
    <button class="tablinks" onclick="openGroup(event, 'Difficult')">Difficult</button>
  </div>

    <div id="Easy" class="tabcontent" style="display: block;">
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
    </div>

  <div id="Moderate" class="tabcontent">
    
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
  </div>

  <div id="Difficult" class="tabcontent">
   
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
