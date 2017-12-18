<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css"
              type="text/css" />
    </head>
    <body>
    <div class="happy-new-year">
        <div class="flex-center position-ref full-height ">


            <div class="content">
                <div class="title m-b-md">
                    Laravel
                <?php if(Route::has('login')): ?>
                    <div class="links">
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(url('/home')); ?>">Home</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>">Login</a>
                                <a href="<?php echo e(route('register')); ?>">Register</a>
                                <?php endif; ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>
