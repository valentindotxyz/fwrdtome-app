<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/wingcss"/>
    <link rel="stylesheet" href="/css/jarvis.css"/>
</head>
<body>

<div class="container">
    <div class="nav">
        <h5 class="nav-logo">fwrdto.me</h5>
        <a class="nav-item" href="/jarvis/">Dashboard</a>
        <a class="nav-item" href="/jarvis/sendings">Sendings</a>
        <a class="nav-item" href="/jarvis/users">Users</a>
        <a class="nav-item" href="/jarvis/failed-jobs">Failed jobs</a>
    </div>
    @yield('content')
</div>
</body>
</html>