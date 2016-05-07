<ul class="nav nav-list bs-docs-sidenav affix-top">
    <li @if(\Request::segment(1) == 'profile')class="active"@endif><a href="/profile">Profile</a></li>
    <li @if(\Request::segment(1) == 'pipelines')class="active"@endif><a href="/pipelines">Pipelines</a></li>
    <li><hr></li>
    <li><a href="/logout">Logout</a></li>
</ul>