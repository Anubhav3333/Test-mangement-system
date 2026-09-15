<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckStudent;
use App\Http\Middleware\CheckTeacher;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        $middleware->alias([
            'CheckStudent' => CheckStudent::class,
            'CheckTeacher' => CheckTeacher::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
    
    })
    ->create();