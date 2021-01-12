<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('manage.dashboard.index') }}">管理後台</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 老闆 <b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li class="divider"></li>
                <li>
                    <a href="{{route('user.logout')}}"><i class="fa fa-fw fa-power-off"></i>登出</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{ route('manage.dashboard.index') }}"><i class="fa fa-fw fa-dashboard"></i> 主控台</a>
            </li>
            <li>
                <a href="{{ route('manage.food.index') }}"><i class="fa fa-fw fa-edit"></i> 菜單</a>
            </li>
            <li>
                <a href="{{ route('manage.order.index') }}"><i class="fa fa-fw fa-edit"></i> 訂單</a>
            </li>
            <li>
                <a href="{{ route('manage.comment.index') }}"><i class="fa fa-fw fa-edit"></i> 評論</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
