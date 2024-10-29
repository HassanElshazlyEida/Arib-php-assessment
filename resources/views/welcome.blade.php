<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="container d-flex vh-100">
            <div class="row justify-content-center align-self-center w-100">
                <div class="col-md-6 text-center">
                    <div class="d-grid gap-3 mt-5">
                        <a href="{{ route('filament.manager.pages.dashboard') }}" class="btn btn-primary btn-lg">Login as Manager</a>
                        <a href="{{ route('filament.employee.pages.dashboard') }}" class="btn btn-secondary btn-lg">Login as Employee</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
