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
                <li><a href="/goods">Home</a></li>
                <li><a href="/stocks">Stocks</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/stocks">{{\Auth::user()->name}}</a></li>
                <li><a href="{{ URL::route('account-sign-out') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="left-sidebar col-lg-12">
    <div class="custom-left-sidebar col-lg-12">
        <div class="sidebar content-box col-lg-2" style="display: block;">
            <ul class="nav">
                <!-- Main menu -->
                <li><a href="/goods"><i class="glyphicon glyphicon-stats"></i> Goods</a></li>
                <li><a href="/categories"><i class="glyphicon glyphicon-list"></i> Categories</a></li>
                <li><a href="/add/new/goods"><i class="glyphicon glyphicon-pencil"></i> Add new goods</a></li>
                <li><a href="/add/new/category"><i class="glyphicon glyphicon-pencil"></i> Add new category</a></li>
                <li><a href="/add/new/deliveryman"><i class="glyphicon glyphicon-pencil"></i> Add new deliveryman</a></li>
                <li><a href="/catalog"><i class="glyphicon glyphicon-tasks"></i> Catalog</a></li>
                <li><a href="/deliveryman"><i class="glyphicon glyphicon-tasks"></i> Deliveryman</a></li>
                <li><a href="/inputted"><i class="glyphicon glyphicon-tasks"></i> All inputted goods</a></li>
                <li><a href="/outputted"><i class="glyphicon glyphicon-tasks"></i> All outputted goods</a></li>
            </ul>
        </div>
        @yield('main-container')
        @yield('all-inputted-container')
        @yield('all-outputted-container')
        @yield('add-new-deliveryman-container')
        @yield('stocks-container')
        @yield('goods-container')
        @yield('deliveryman-container')
        @yield('add-new-goods-container')
        @yield('add-type-container')
        @yield('input-output-container')

    </div>
</div>
<div class="col-lg-offset-1 col-lg-11 footer-custom-class">
    <footer>
        <p>© 2017 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>
</div>


<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/categories-edit-delete.js"></script>
<script src="/js/goods-type-edith-delete.js"></script>
<script src="/js/catalog-changes.js"></script>
<script src="/js/deliverymanEditDelete.js"></script>
<script src="/js/input.js"></script>
<script src="/js/output.js"></script>
</body>
</html>