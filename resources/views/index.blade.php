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
    <div class="navbar_dash_area">

        <!-- Dashboard Navbar Left -->
        <div class="dash-navbar-left dnl-visible">
            <ul class="dnl-nav">
                <li class="active-cta">
                    <a href="index.html">
                    <span class="dnl-link-icon"></span>
                    <img src="assets/svg/nav-icon1.svg" alt="">
                    <span class="dnl-link-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="collapsed" data-toggle="collapse" href="#collapseStatistics" aria-expanded="false" aria-controls="collapseStatistics">
                    <span class="dnl-link-icon"></span>
                    <img src="{{ asset('svg/403.svg') }}" alt="">
                    <span class="dnl-link-text">Ui Elements</span>
                    <span class="nav-arrow"><img src="assets/svg/arrow-down.svg" alt=""></span>
                  </a>
                    <!-- Dropdown level one -->
                    <ul class="dnl-sub-one collapse" id="collapseStatistics">
                        <li>
                            <a href="button.html">
                            <img src="assets/svg/subnav-arrow.svg" alt="">
                            <span class="dnl-link-text">Buttons</span>
                          </a>
                        </li>

                        <li>
                            <a href="modal.html">
                            <img src="asset{{ ('svg/subnav-arrow.svg') }}" alt="">
                            <span class="dnl-link-text">Modals</span>
                          </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="collapsed" data-toggle="collapse" href="#collapseStatisticss" aria-expanded="false" aria-controls="collapseStatistics">
                        <span class="dnl-link-icon"></span>
                        <img src="assets/svg/nav-icon3.svg" alt="">
                        <span class="dnl-link-text">Chart</span>
                        <span class="nav-arrow"><img src="assets/svg/arrow-down.svg" alt=""></span>
                    </a>
                    <!-- Dropdown level one -->
                    <ul class="dnl-sub-one collapse" id="collapseStatisticss">
                        <li>
                            <a href="chart.html">
                            <img src="assets/svg/subnav-arrow.svg" alt="">
                            <span class="dnl-link-text">Chart js</span>
                          </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a class="collapsed" data-toggle="collapse" href="#collapseStatisticps" aria-expanded="false" aria-controls="collapseStatistics">
                        <span class="dnl-link-icon"></span>
                        <img src="{{ asset('svg/nav-icon8.svg') }}" alt="">
                        <span class="dnl-link-text">Pages</span>
                        <span class="nav-arrow"><img src="assets/svg/arrow-down.svg" alt=""></span>
                    </a>
                    <!-- Dropdown level one -->
                    <ul class="dnl-sub-one collapse" id="collapseStatisticps">
                        <li>
                            <a href="login.html">
                            <img src="assets/svg/subnav-arrow.svg" alt="">
                            <span class="dnl-link-text">Login page</span>
                          </a>
                        </li>
                        <li>
                            <a href="register.html">
                            <img src="assets/svg/subnav-arrow.svg" alt="">
                            <span class="dnl-link-text">Register page</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>










    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">+Add Task</button>
        </form>
      </div>
    </nav>


    <table id="data-table" class="table task-table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Task Title</th>
          <th scope="col">Task description</th>
          <th scope="col">Recently Task chaning</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach ($AllTaskInfo as $key)

          <th scope="row">1</th>
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
          <td>@mdo</td>
        </tr>
        @endforeach
c
      </tbody>
    </table>












<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<!-- jquery.popper.min.js -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<!-- bootstrap.min.js -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- inview.min.js -->
<script src="{{ asset('js/inview.js') }}"></script>
<!-- counter.min.js -->
<script src="{{ asset('js/counter.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('jvectormap/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!--  touchswip js  -->
<script src="{{ asset('js/jquery.touchSwipe.min.js') }}"></script>
<!--  perfect scrollbar js  -->
<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  nice select js  -->
<script src="{{ asset('js/jquery.nice-select.min.js.js') }}"></script>
<!-- main.js -->
<script src="{{ asset('js/main.js') }}"></script>
<!-- custom-theme.js -->
<script src="{{ asset('js/custom-theme.js') }}"></script>

<script src="{{ asset('js/data-table.js') }}"></script>


<script>
$(document).ready( function () {
  $('#data-table').DataTable();
} );
</script>
</body>
</html>
