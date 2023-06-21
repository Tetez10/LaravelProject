<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Figtree, sans-serif;
            font-size: 1rem;
            line-height: 1.5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .title {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .btn {
            display: inline-block;
            background-color: #461058;
            color: #fff;
            padding: 0.75rem 1.5rem;
            font-size: 1.25rem;
            font-weight: 600;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #3b82f6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Welcome to My Blog</h1>
        <ul>
            <li><a href="<?php echo e(route('articles.index')); ?>">Articles</a></li>
            <li><a href="<?php echo e(route('faq-categories.index')); ?>">FAQ</a></li>
        </ul>
        

        <div>
            <a href="<?php echo e(route('login')); ?>" class="btn">Login</a>
            <a href="<?php echo e(route('register')); ?>" class="btn">Register</a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\tetez\OneDrive\Documents\Backend\example-app\resources\views/welcome.blade.php ENDPATH**/ ?>