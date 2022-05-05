<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        @livewireStyles
    <title>To Do list</title>
</head>
<body class="container-fluid">


<div class="col-lg-10 offset-lg-1">
    <h1 class="text-center">TO DO LIST</h1>
    <h2 class="offset-lg-1"> Add A task</h2>
    <form method="POST" action="{{action('App\Http\Controllers\FrontendController@store')}}" class="col-lg-10 offset-lg-1">
        @csrf

        <div class="input-group mb-3 ">
            <input type="text" class="form-control" placeholder="What task do you want to add?" aria-label="Recipient's username" aria-describedby="button-addon2" name="task">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"> <i class="bi bi-plus-square"></i></button>
        </div>
    </form>
    <div class="col-lg-10 offset-lg-1">
        <h2>TASKS</h2>

        @if(Session::has('message'))
            <h3 class="alert alert-success">
                {{session('message')}}</p>
            </h3>
        @endif

    </div>
    <ul class="list-group">

        @foreach($tasks as $task)
            <li class="list-group-item">
                <div class="input-group mb-3">
                    <div class="d-flex justify-content-between col-11">
                        <p>{{$task->task}}</p>
                        <p class="me-5">{{$task->user->name}}</p>
                    </div>
                    <form method="POST" action="{{action('App\Http\Controllers\FrontendController@destroy',$task)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"> <i class="bi bi-trash-fill"></i></button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>


<!-- JavaScript Bundle with Popper -->
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
