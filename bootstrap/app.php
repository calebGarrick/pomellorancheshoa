<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\TrustHosts;

$envPath = getenv('APP_ENV_FILE') ?: __DIR__.'/../.env';
$dotenv = Dotenv\Dotenv::createImmutable(dirname($envPath), basename($envPath));
$dotenv->safeLoad();

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustHosts(at: ['www.pomellorancheshoa.com', 'localhost']);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
