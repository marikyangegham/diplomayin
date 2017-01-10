<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link href="/fonts/glyphicons-halflings-regular.ttf" type='text/css'>
    <!-- Fonts -->
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/custom.css" rel="stylesheet" type="text/css">

    <!-- Styles -->

</head>
<body>
<nav class="navbar navbar-inverse custom-navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="collapsed navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="logo-background">
                <a href="#" class="navbar-brand"></a>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
            <ul class="nav navbar-nav custom-navbar-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">Stocks</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::route('account-sign-out') }}">Logout<span class="sr-only">(current)</span></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="left-sidebar col-lg-12">
    <div class="custom-left-sidebar col-lg-12">
        <div class="sidebar content-box col-lg-2" style="display: block;">
            <ul class="nav">
                <!-- Main menu -->
                <li><a href="/goodsCount"><i class="glyphicon glyphicon-stats"></i> Goods count</a></li>
                <li><a href="/goods"><i class="glyphicon glyphicon-list"></i> Goods</a></li>
                <li><a href="/addNewGoods"><i class="glyphicon glyphicon-pencil"></i> Add new goods</a></li>
                <li><a href="/addNewType"><i class="glyphicon glyphicon-pencil"></i> Add new type</a></li>
                <li><a href="/inputOutput"><i class="glyphicon glyphicon-tasks"></i> Input Output</a></li>
            </ul>
        </div>
        @yield('main-container')
        @yield('goods-container')
        @yield('add-new-goods-container')
        @yield('add-type-container')
        @yield('input-output-container')

    </div>
</div>

<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.js"></script>
</body>
</html>