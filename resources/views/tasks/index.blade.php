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
          @foreach ($AllTaskInfo as $keey)


@if ($keey['Status'] === 'Not Done Yet')
  <p>hoioi</p>
@endforeach

          @foreach ($AllTaskInfo as $key)

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
        @endforeach
      </tbody>
    </table>

    <script src="{{ asset('js/data-table.js') }}"  type="text/javascript"></script>

  <script>
    $(document).ready( function () {
      $('#data-table').DataTable();
    } );
  </script>

</body>
</html>
@endsection
