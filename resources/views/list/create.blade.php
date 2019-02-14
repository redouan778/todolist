@extends('layouts.appClean')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="{{route('list.store')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="naam"  class="col-sm-2 control-label">list name</label>
                        <div class="col-sm-6">
                            <input type="text"  name="List_title" class="form-control" placeholder="List name">
                        </div>
                    </div>



                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add list</button>
                        </div>
                    </div>
                    <button class="btn-PP btn-primary">
                        <i class="fa fa-backward terug"><a class="back" href="../">  Vorige pagina</a></i>
                    </button>
              </div>
  @endsection
