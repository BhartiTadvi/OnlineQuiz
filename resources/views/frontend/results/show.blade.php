<!DOCTYPE html>
<html>
<head>
  <title></title>
<link href="{{ asset('css/test.css') }}" rel="stylesheet">
    
</head>
<style type="text/css">
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
    <table class="table">
                  <tbody>
                     <tr>
                      <th>User Id</th>
                      <td>{{ $test->user->id }}</td>
                    </tr>
                    <tr>
                      <th>Candidate Name</th>
                      <td >{{  $test->user->name }}</td>
                    </tr>
                    <tr>
                      <th>Obtained marks</th>
                      <td>{{  $result->obtained_marks }}</td>
                    </tr>
                    <tr>
                      <th>Total marks</th>
                      <td>{{ $result->total_marks }}</td>
                    </tr>
                    <tr>
                      <th> Question Type </th>
                      <td> Objective </td>
                    </tr>
                    <tr>
                      <th> Your percentage is </th>
                      <td> {{$percentage}}% </td>
                    </tr>
                    <tr>
                      <th>Star Rating </th>
                        <td>
                          <div class="star-ratings-sprite">
                            <span style="width:{{$percentage}}%" class="star-ratings-sprite-rating"></span>
                          </div>
                        </td>
                    </tr>
                  </tbody>
    </table>
  </div>
   <a class="btn" href="{{route('online-quiz-view')}}">Back to Quiz</a>
</body>
</html>