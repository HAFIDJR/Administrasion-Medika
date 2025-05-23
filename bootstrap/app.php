<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DokterMiddleware;
use App\Http\Middleware\PasienMiddleware;
use App\Http\Middleware\RedirectIfVerified;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'redirectIfVerified' => RedirectIfVerified::class,
            'admin' => AdminMiddleware::class,
            'dokter' => DokterMiddleware::class,
            'pasien' => PasienMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
