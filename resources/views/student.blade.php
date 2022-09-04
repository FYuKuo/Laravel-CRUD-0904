@php
    $num = count($data);
    $limit = 10;
    $pages = ceil($num/$limit);
    $page = ($_GET['page'])??1;
    if ($page <=0 || $page > $pages) {
      $page = 1;
    }
    $start = ($page-1)*$limit;
    if(($start+$limit) > $num){
      $end = $num;
    }else{
      $end=($start+$limit);
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>學生資訊查詢網</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/css.css')}}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">學生資訊查詢網</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Disabled</a>
            </li>
          </ul>
        </div>
    </nav>

    <div class="container-fluid mt-5 overflow-auto">
      <table class="m-auto text-center">
          <tr>
            <th>ID</th>
            <th>學號</th>
            <th>班級座號</th>
            <th>姓名</th>
            <th>出生年月日</th>
            <th>身分證號碼</th>
            <th>住址</th>
            <th>家長</th>
            <th>電話</th>
            <th>科別</th>
            <th>畢業國中</th>
            <th>操作</th>
          </tr>
          @for ($i = $start ; $i < $end; $i++)
            <tr>
              <td>{{$data[$i]->id}}</td>
              <td>{{$data[$i]->uni_id}}</td>
              <td>{{$data[$i]->seat_num}}</td>
              <td>{{$data[$i]->name}}</td>
              <td>{{$data[$i]->birthday}}</td>
              <td>{{$data[$i]->national_id}}</td>
              <td class=" text-left">{{$data[$i]->address}}</td>
              <td>{{$data[$i]->parent}}</td>
              <td>{{$data[$i]->telphone}}</td>
              <td>{{$data[$i]->major}}</td>
              <td>{{$data[$i]->secondary}}</td>
              <td>
                <button type="button" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
              </td>
            </tr>    
          @endfor
      </table>


      <div class="btn-toolbar mt-4  justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2" role="group" aria-label="First group">
          @if ($page > 1)
          <a href="?page=1" class="btn btn-secondary">&laquo;</a>
          <a href="?page={{$page-1}}" class="btn btn-secondary">&lt;</a>
          @endif

          @if ($page < 3)

          @for ($i = 1 ; $i <= 5 ; $i++)
          <a href="?page={{$i}}" class="btn btn-secondary {{($page == $i)?'active':''}}">{{$i}}</a>
          @endfor

          @elseif($page+2 >= $pages)

          @for ($i = $pages-4 ; $i <= $pages ; $i++)
          <a href="?page={{$i}}" class="btn btn-secondary {{($page == $i)?'active':''}}">{{$i}}</a>
          @endfor

          @else

          @for ($i = $page-2 ; $i <= $page+2 ; $i++)
          <a href="?page={{$i}}" class="btn btn-secondary {{($page == $i)?'active':''}}">{{$i}}</a>
          @endfor

          @endif

          @if ($page < $pages)
          <a href="?page={{$page+1}}" class="btn btn-secondary">&gt;</a>
          <a href="?page={{$pages}}" class="btn btn-secondary">&raquo;</a>
          @endif
          
        </div>
      </div>
    </div>
</body>

</html>