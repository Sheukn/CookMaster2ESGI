<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register()
    {
        // Modify the behavior for the NotFoundHttpException exception
        $this->reportable(function (NotFoundHttpException $e, $request) {
            // If the request is an API request
            if ($request->is("api/*")) {
                // Return a JSON response with a 404 message
                return response()->json([
                    "message" => "Resource not found"
                ], 404);
            }
        });
    }
}
