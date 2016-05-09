<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"></button>
            <a class="brand" href="/">Multitenant Bootstraper</a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav">
                    <li>
                        <a href="{!!url('clients/'.$tenant->client_id)!!}"><i class="fa fa-dashboard fa-fw"></i> Client</a>
                    </li>
                    <li>
                        <a href="{!!url('tenants/'.$tenant->id)!!}"><i class="fa fa-dashboard fa-fw"></i> Tenant</a>
                    </li>
                    <li>
                        <a href="{!!url('products')!!}"><i class="fa fa-dashboard fa-fw"></i>Products</a>
                    </li>
                    <li>
                        <a href="{!!url('profile')!!}"><i class="fa fa-dashboard fa-fw"></i> Profile</a>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li>
                        <a href="{!! url('auth/logout') !!}"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>