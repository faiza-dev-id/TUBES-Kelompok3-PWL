<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
<<<<<<< HEAD
    ->withMiddleware(function (Middleware $middleware): void {

    $middleware->alias([
        'nocache' => \App\Http\Middleware\NoCache::class,
        'mitra'   => \App\Http\Middleware\MitraAuth::class,
        'admin'   => \App\Http\Middleware\AdminAuth::class,
        'kaprodi' => \App\Http\Middleware\KaprodiAuth::class,
        'role'    => \App\Http\Middleware\RoleMiddleware::class,
    ]);

})

=======
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
>>>>>>> origin/feature-log-magang
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
