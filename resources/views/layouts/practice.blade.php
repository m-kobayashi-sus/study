<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="css/common.css">
</head>
<body>
    @section('header')
    @show
    <div class="content">
    @yield('content')
    </div>
</body>
</html>