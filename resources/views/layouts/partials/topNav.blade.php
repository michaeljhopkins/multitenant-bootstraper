<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"></button>
            <a class="brand" href="/">Multitenant Bootstraper</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li>
                        <a href="{!!url('profile')!!}"><i class="fa fa-dashboard fa-fw"></i> Profile</a>
                    </li>
                    <li>
                        <a href="{!!url('pipelines')!!}">Products</a>
                    </li>
                    <li>
                        <a href="{!! url('auth/logout') !!}"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>