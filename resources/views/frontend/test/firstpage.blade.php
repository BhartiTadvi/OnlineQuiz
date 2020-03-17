<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('css/quiz.css') }}" rel="stylesheet">
<style>
body {font-family: Arial;margin:0px 137px 22px 160px;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
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
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
#submitQuiz{
  background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
    text-decoration: none;  
}
.main-div{margin:55px 0px 0px 370px}


</style>
</head>
<body>
  <div class="main-div">
    <a href="{{Route('online-quiz-view')}}" class="btn">Take a Quiz</a>
    <!-- <a href="{{Route('register')}}" class="btn">Registration</a>
    <a href="{{Route('login')}}" class="btn">Login</a> -->

  </div>
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
