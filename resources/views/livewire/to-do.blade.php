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
