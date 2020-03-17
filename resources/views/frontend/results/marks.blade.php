<!DOCTYPE html>
<html>
<head>
	<title></title>
    
</head>
<link href="{{ asset('css/test.css') }}" rel="stylesheet">
<style>
	.star-ratings-sprite-rating {
      background: url("{{ asset('images/star-rating-sprite.png') }}") repeat-x;
      background-position: 0 100%;
      float: left;
      height: 21px;
      display: block;
    }
    .star-ratings-sprite {
      background: url("{{ asset('images/star-rating-sprite.png') }}") repeat-x;
      font-size: 0;
      height: 21px;
      line-height: 0;
      overflow: hidden;
      text-indent: -999em;
      width: 110px;
      margin: 0px 0px 0px 6px auto;
    }
</style>
<body>
	<div>
		<h3 id="resultHead">Your result is</h3>
		<table>
		  <thead>
		  </thead>
		  <tbody>
		    <tr>
                <th>Obtained marks</th>
                <td class="result">{{$result->obtained_marks}}</td>
		    </tr>
		    <tr>
		     <th>Total marks</th>
                <td class="result">{{$result->total_marks}}</td>
		    </tr>
		    <tr>
		     <th>Question Type</th>
                <td class="result">Objective</td>
		    </tr>
		     <tr>
              <th> Your percentage is </th>
              <td class="result">{{$result->percentage}}% </td>
            </tr>
            <tr>
              <th>Star Rating </th>
                <td>
                  <div class="star-ratings-sprite">
                    <span style="width:{{$result->percentage}}%" class="star-ratings-sprite-rating"></span>
                  </div>
                </td>
            </tr>
		  </tbody>
		</table>
	</div>
	 <a class="btn" href="{{route('online-quiz-view')}}">Back to Quiz</a>
</body>
</html>