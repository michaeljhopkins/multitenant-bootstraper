<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Pantheon</a>
    </div>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{url('profile')}}">Profile</a>
                </li>
                <li>
                    <a href="{{url('pipelines')}}">Pipelines</a>
                </li>
                <li>
                    <a href="{{ URL::to('auth/logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>