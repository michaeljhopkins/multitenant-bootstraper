<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
</head>
<body data-spy="scroll">
<div class="container">
    @include('layouts.partials.topNav')
    <div class="row">
        <div class="span10 offset1">
            <div class="span9">
                @include('layouts.partials.header')
                @yield('content')
            </div>
            <div class="span3"></div>
        </div>
    </div>
</div>
@yield('scripts')
@include("layouts.partials.foot")
</body>
</html>