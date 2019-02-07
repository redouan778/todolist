@extends('layouts.app')
@section('content')
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            <div onclick="hide();" class="close">x</div>
            <p>{{session('message')}}</p>
        </div>
    @endif

    <html>
  <body>
    <link src="{{ asset('css/data-table.css') }}" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>To-Do List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link src="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link src="{{ asset('css/data-table.css') }}" rel="stylesheet">

    <!-- FAVICON -->
    <link href="{{ asset('css/ToDoList.css') }}" rel="stylesheet">
    <!-- <link rel="icon" href="assets/img/favicon.png"> -->
    <!-- animate.css -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <!-- material fonts.css -->
    <link href="{{ asset('css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <!-- parfect scrollbar.css -->
    <link href="{{ asset('css/perfect-scrollbar.min.css') }}" rel="stylesheet">
    <!-- nice select.css -->
    <link href="{{ asset('css/nice-select.css') }}" rel="stylesheet">
    <!-- style.css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- responsive.css -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <!-- theme-color.css -->
    <link href="{{ asset('css/theme-color.css') }}" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <table id="data-table" class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Task Title</th>
          <th scope="col">Task description</th>
          <th scope="col">Recently Task chaning</th>
        </tr>
      </thead>

      <tbody>
        <tr>
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
          <td>{{$key->updated_at}}</td>
        </tr>
        @endforeach

      </tbody>
    </table>

<script>
    $(document).ready( function () {
        $('#data-table').DataTable();
      }
    );
  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/data-table.js') }}"  type="text/javascript"></script>
</body>
</html>
@endsection
