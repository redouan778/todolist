@extends('layouts.app')
@section('content')
<header>
  <link src="{{ asset('css/data-table.css') }}" rel="stylesheet">
</header>
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            <div onclick="hide();" class="close">x</div>
            <p>{{session('message')}}</p>
        </div>
    @endif
    <html>
  <body>
    <a href="#" class="notification">
      <span>Task not finished</span>
      <span class="badge">{{$AllOpenTask}}</span>
    </a>

    <div class="container">

    <table id="data-table" class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Task Title</th>
          <th scope="col">Task description</th>
          <th scope="col">Task status</th>
          <th scope="col">Task duration</th>
          <th scope="col">Recently Task chaning</th>
        </tr>
      </thead>
      <h1 class="list_title">List title: {{$list->List_title}}</h1>
      <tbody>
        <tr>
          <a href="/task/{{$id}}/create" class="btn btn-outline-success my-2 my-sm-0 add-task">+Add Task</a>
          @foreach ($AllTaskInfo as $key)
            @if($key['Status'] === 'Not Done Yet')

              <td>{{$key->Task_title}}
                <a data-toggle="dropdown" class="btn btn-info roll dropdown-toggle btn-xs"></a>
                <ul role="menu" class="dropdown-menu">
                    <li class="icon">
                        <a href="{{ route('task.edit', $key->Task_id)}}" title="Bewerk de specifieke status" class="icon dropdown-menuOwn">
                            <i class="glyphicon glyphicon-edit icon"></i>Bewerk
                        </a>
                    </li>
                      <li class="divider"></li>
                    <li>
                        <form action="{{ route('task.destroy', $key->Task_id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button title="Verwijder een status" class="icon btn-verwijder dropdown-menuOwn">
                                <i class="glyphicon glyphicon-trash icon"></i>Verwijder
                            </button>
                        </form>
                    </li>
              </td>
              <td>{{$key->Task_description}}</td>
              <td>{{$key->Status}}</td>
              <td>{{$key->Duration}}</td>
              <td>{{$key->updated_at}}</td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    <br><br><br>

    <table id="data-table" class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Task Title</th>
          <th scope="col">Task description</th>
          <th scope="col">Task status</th>
          <th scope="col">Task duration</th>
          <th scope="col">Recently Task chaning</th>
        </tr>
      </thead>

      <h1>Task those are finshed</h1><tbody>
  @foreach ($AllTaskInfo as $key)
  @if($key['Status'] === 'Done')


  <td>{{$key->Task_title}}
    <a data-toggle="dropdown" class="btn btn-info roll dropdown-toggle btn-xs"></a>
    <ul role="menu" class="dropdown-menu">
        <li class="icon">
            <a href="{{ route('task.edit', $key->Task_id)}}" title="Bewerk de specifieke status" class="icon dropdown-menuOwn">
                <i class="glyphicon glyphicon-edit icon"></i>Bewerk
            </a>
        </li>
          <li class="divider"></li>
        <li>
            <form action="{{ route('task.destroy', $key->Task_id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button title="Verwijder een status" class="icon btn-verwijder dropdown-menuOwn">
                    <i class="glyphicon glyphicon-trash icon"></i>Verwijder
                </button>
            </form>
        </li>
  </td>
  <td>{{$key->Task_description}}</td>
  <td>{{$key->Status}}</td>
  <td>{{$key->Duration}}</td>
  <td>{{$key->updated_at}}</td>

</tr>
@endif
@endforeach
</tbody>
</table>


    <script src="{{ asset('js/data-table.js') }}"  type="text/javascript"></script>
<script>
    $(".alert alert-success").fadeTo(2000, 500).slideUp(500, function(){
      $("alert alert-success").slideUp(500);
  });
</script>
</div>

</body>
</html>
@endsection
