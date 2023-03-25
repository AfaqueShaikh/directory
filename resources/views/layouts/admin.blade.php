<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.head')
</head>

<body>

@include('admin.includes.sidebar')
<!-- /# sidebar -->

@include('admin.includes.header')

<div class="content-wrap">
    @yield('content')
</div>
{{--@include('admin.includes.footer')--}}

@yield("footer")
</body>
</html>
