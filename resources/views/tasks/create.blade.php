@extends('layouts.appClean')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="{{route('task.store')}}" method="POST" class="form-horizontal">
                  <input type="hidden" name="List_id" value="{{ $list_id }}">
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
                        <label for="naam"  class="col-sm-2 control-label">Task naam</label>
                        <div class="col-sm-6">
                            <input type="text"  name="Task_title" class="form-control" placeholder="Task naam">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="opmerking" class="col-sm-2 control-label">Task Description</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="Task_description" placeholder="Task Description">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="opmerking" class="col-sm-2 control-label">Task Duration</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="Duration" placeholder="Task Duration">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Status" class="col-sm-2 control-label">Task Status</label>
                        <div class="col-sm-6">
                          <select name="Status">
                              <option value="Not Done Yet">Not Done Yet</option>
                              <option value="Done">Done</option>

                          </select>
                        </div>
                    </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>+ Add Task</button>
                        </div>
                    </div>
                    <button class="btn-PP btn-primary">
                        <i class="fa fa-backward terug"><a class="back" href="../">  Vorige pagina</a></i>
                    </button>
              </div>
  @endsection
