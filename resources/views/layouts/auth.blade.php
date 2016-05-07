<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
</head>
<body data-spy="scroll">
<div class="container-fluid">
    @include('layouts.partials.topNavNoAuth')
    <div class="row-fluid">
        <div class="span10 offset1">
            <div class="span9">
                @include('layouts.partials.header')
                @yield('main')
            </div>
            <div class="span3"></div>
        </div>
    </div>
</div>
@yield('scripts')
@include("layouts.partials.foot")
</body>
</html>