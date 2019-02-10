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
    <table id="data-table" class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">list Title</th>
          <!-- <th scope="col">Task description</th>
          <th scope="col">Recently Task chaning</th> -->
        </tr>
      </thead>

      <tbody>
        <tr>
          @foreach ($List as $keey)
          <td>{{$keey->List_title}}

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
