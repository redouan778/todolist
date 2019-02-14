@extends('layouts.appClean')
@section('content')
    @if(session('message'))
        <div id="success-alert" class="alert alert-success" role="alert">
            <div onclick="hide();" class="close">x</div>
            <p>{{session('message')}}</p>
        </div>
    @endif
    <header>
      <a href="{{ route('list.create') }}" class="btn btn-outline-success my-2 my-sm-0 add-task">+Add List</a>
    </header>
    <html>
  <body>
    <table id="data-table" class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">list Title</th>
          <th scope="col">Show All Tasks From tHis list</th>
          <th scope="col">Created At</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach ($List as $key)
          <td>{{$key->List_title}}
            <a data-toggle="dropdown" class="btn btn-info roll dropdown-toggle btn-xs"></a>
            <ul role="menu" class="dropdown-menu">
                <li class="icon">
                    <a href="{{ route('list.edit', $key->list_id)}}" title="Bewerk de specifieke status" class="icon dropdown-menuOwn">
                        <i class="glyphicon glyphicon-edit icon"></i>Bewerk
                    </a>
                </li>
                  <li class="divider"></li>
                <li>
                    <form action="{{ route('list.destroy', $key->list_id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button title="Verwijder een status" class="icon btn-verwijder dropdown-menuOwn">
                            <i class="glyphicon glyphicon-trash icon"></i>Verwijder
                        </button>
                    </form>
                </li>
          </td>
          <td>
            <a href="/taskPage/{{$key->list_id}}" type="button" class="btn btn-default">Show All</a>
          </td>
          <td>
            {{$key->created_at}}
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
