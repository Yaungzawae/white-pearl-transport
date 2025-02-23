<?php


use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->redirectGuestsTo("driver/login");
        $middleware->redirectGuestsTo(fn (Request $request) => 
        ($request->is('driver') || $request->is('driver/*')) ? route("driver.login") : "login"
    );
        //
    //     $middleware->redirectGuestsTo(function (Request $request){
    //         if(($request->is('driver') || $request->is('driver/*'))){
    //             route("driver.login");
    //         } else{
    //             route('login');
    //         }
    //     }
    // );

    })
    ->withExceptions(function (Exceptions $exceptions) {

    })->create();


