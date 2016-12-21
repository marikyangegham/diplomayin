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

        <!-- Styles -->

    </head>
    <body>
        <div class="container">
            <div class="col-lg-4 col-lg-offset-4">
                <form id="signinForm" class="form-signin" action="/login" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <h2 class="form-signin-heading">Please sign in</h2>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

                </form>
            </div>
        </div>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    </body>
</html>
