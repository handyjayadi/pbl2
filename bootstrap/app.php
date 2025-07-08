<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use App\Schedule\Kernel as ScheduleKernel;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        api: __DIR__.'/../routes/api.php',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Tambahkan middleware jika perlu
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Tangani exception jika perlu
    })
    ->withBindings([
    Illuminate\Contracts\Console\Kernel::class => App\Schedule\Kernel::class,
    ])
    ->create();
