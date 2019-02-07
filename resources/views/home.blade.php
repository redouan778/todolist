@extends('layouts.app')

@section('content')
@extends('layouts.app')
@section('content')

    @if(session('message'))
        <div class="alert alert-success" role="alert">
            <div onclick="hide();" class="close">x</div>
            <p>{{session('message')}}</p>
        </div>
    @endif
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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
  </head>
  <body>














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
</body>
</html>
@endsection

@endsection
