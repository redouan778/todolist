@extends('layouts.app')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="{{route('list.update', $List)}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="naam" class="col-sm-2 control-label">Task Title</label>
                            <div class="col-sm-6">
                             <input type="text" id="naam" name="List_title" class="form-control" value="{{$List->List_title}}" />
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-PP btn-BO">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <button class="btn-PP btn-primary">
            <i class="fa fa-backward terug"><a class="back" href="../">  Vorige pagina</a></i>
        </button>
    </div>
@endsection