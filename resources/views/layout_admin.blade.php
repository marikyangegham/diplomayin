<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Stocks.am</title>

    {{--<link href="/fonts/glyphicons-halflings-regular.ttf" type='text/css'>--}}
    <link href="/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/custom.css" rel="stylesheet" type="text/css">

    <!-- Styles -->

</head>
<body class="">
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
                <li><a href="/goods">Գլխաոր էջ</a></li>
                <li><a href="/stocks">Օգտվողներ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><div class="requests"><a id="requestCount" href="/request">0</a></div></li>
                <li><a href="/stocks">{{\Auth::user()->name}}</a></li>
                <li><a href="{{ URL::route('account-sign-out') }}">Դուրս գալ</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="left-sidebar col-lg-12 ">
    <div class="custom-left-sidebar col-lg-12">
        <div class="sidebar content-box col-lg-4" style="display: block;">
            <ul class="nav">
                <!-- Main menu -->
                <li><a href="/goods"><i class="glyphicon glyphicon-stats"></i> Ապրանքներ</a></li>
                <li><a href="/categories"><i class="glyphicon glyphicon-list"></i> Կատեգորիաներ</a></li>
                <li><a href="/add/new/goods"><i class="glyphicon glyphicon-pencil"></i> Ավելացնել նոր ապրանք</a></li>
                <li><a href="/add/new/category"><i class="glyphicon glyphicon-pencil"></i> Ավելացնել նոր կատեգորիա</a></li>
                <li><a href="/add/new/deliveryman"><i class="glyphicon glyphicon-pencil"></i> Ավելացնել նոր առաքիչ</a></li>
                <li><a href="/catalog"><i class="glyphicon glyphicon-tasks"></i> Ապրանքացուցակ</a></li>
                <li><a href="/deliveryman"><i class="glyphicon glyphicon-tasks"></i> Առաքիչներ</a></li>
                <li><a href="/inputted"><i class="glyphicon glyphicon-tasks"></i> Մուտք արված ապրանքներ</a></li>
                <li><a href="/outputted"><i class="glyphicon glyphicon-tasks"></i> Դուրս գրված ապրանքներ</a></li>
                <li><a href="/return"><i class="glyphicon glyphicon-tasks"></i> Վերադարձված ապրանքներ</a></li>
                <li><a href="/business"><i class="glyphicon glyphicon-tasks"></i> Գործարքներ</a></li>
            </ul>
            <div id="background"><!-- Main background -->

                <div id="result"></div>

                <div id="main">
                    <div id="first-rows">
                        <button class="del-bg" id="delete">Del</button>
                        <button value="%" class="btn-style operator opera-bg fall-back">%</button>
                        <button value="+" class="btn-style opera-bg value align operator">+</button>
                    </div>

                    <div class="rows">
                        <button value="7" class="btn-style num-bg num first-child">7</button>
                        <button value="8" class="btn-style num-bg num">8</button>
                        <button value="9" class="btn-style num-bg num">9</button>
                        <button value="-" class="btn-style opera-bg operator">-</button>
                    </div>

                    <div class="rows">
                        <button value="4" class="btn-style num-bg num first-child">4</button>
                        <button value="5" class="btn-style num-bg num">5</button>
                        <button value="6" class="btn-style num-bg num">6</button>
                        <button value="*" class="btn-style opera-bg operator">x</button>
                    </div>

                    <div class="rows">
                        <button value="1" class="btn-style num-bg num first-child">1</button>
                        <button value="2" class="btn-style num-bg num">2</button>
                        <button value="3" class="btn-style num-bg num">3</button>
                        <button value="/" class="btn-style opera-bg operator">/</button>
                    </div>

                    <div class="rows">
                        <button value="0" class="num-bg zero" id="delete">0</button>
                        <button value="." class="btn-style num-bg period fall-back">.</button>
                        <button value="=" id="eqn-bg" class="eqn align">=</button>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-lg-8">
            @yield('main-container')
            @yield('returned-goods')
            @yield('all-inputted-container')
            @yield('all-outputted-container')
            @yield('add-new-deliveryman-container')
            @yield('stocks-container')
            @yield('goods-container')
            @yield('request-container')
            @yield('deliveryman-container')
            @yield('add-new-goods-container')
            @yield('add-type-container')
            @yield('input-output-container')
            @yield('business-container')
        </div>
    </div>
</div>
<div class="col-lg-offset-1 col-lg-4 footer-custom-class">
    <footer>
        <p>© <?php echo date('Y'); ?> Stocks.am, Inc.
    </footer>
</div>


<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/categories-edit-delete.js"></script>
<script src="/js/goods-type-edith-delete.js"></script>
<script src="/js/catalog-changes.js"></script>
<script src="/js/deliverymanEditDelete.js"></script>
<script src="/js/input.js"></script>
<script src="/js/return.js"></script>
<script src="/js/output.js"></script>
<script src="/js/calculator.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/app.js"></script>
<script src="/js/request.js"></script>
</body>
</html>