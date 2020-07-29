<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Exceptions\Exception;
use Illuminate\Database\QueryException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->wantsJson()) {   
            // Header has Accept: application/json in request
            return $this->handleApiException($request, $exception);
        }

        return parent::render($request, $exception);;
    }

    /**
     * List of throwable exceptions are available at:
     * https://www.php.net/manual/en/class.exception.php
     * 
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    private function handleApiException($request, Throwable $exception)
    {   
        $exception = $this->prepareException($exception);

        $queryException = 0;
        if (get_class($exception) == 'Illuminate\Http\Exception\HttpResponseException') {
            $queryException = 5;
            $exception = $exception->getResponse();
        }

        if (get_class($exception) == 'Illuminate\Auth\AuthenticationException') {
            $queryException = 4;
            $exception = $this->unauthenticated($request, $exception);
        }

        if (get_class($exception) == 'Illuminate\Validation\ValidationException') {
            $queryException = 3;
            $exception = $this->convertValidationExceptionToResponse($exception, $request);
        }

        if (get_class($exception) == 'Illuminate\Database\QueryException') {
            $queryException = 1;
            $exception = $exception->getMessage();
        }

        return $this->customApiResponse($exception, $queryException);
    }

    private function customApiResponse($exception, $queryException)
    {

        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = 500;
        }

        $response = [];

        switch ($statusCode) {
            case 401:
                $response['message'] = 'Unauthorized';
                break;
            case 403:
                $response['message'] = 'Forbidden';
                break;
            case 404:
                $response['message'] = 'Not Found';
                break;
            case 405:
                $response['message'] = 'Method Not Allowed';
                break;
            case 422:
                $response['message'] = $exception->original['message'];
                $response['errors'] = $exception->original['errors'];
                break;
            default:
                if ($queryException == 1) {
                    $response['message'] = 'The wrong inputs given.'.$queryException;
                }
                else {
                    $response['message'] = ($statusCode == 500) ? 'Whoops, looks like something went wrong or maybe wrong inputs. Check everythin and try again.'.$queryException : $exception->getMessage();
                }
                break;
        }

        if (config('app.debug')) {
            $response['trace'] = $exception->getTrace();
            $response['code'] = $exception->getCode();
        }
        $response['status'] = $statusCode;

        return response()->json($response, $statusCode);
    }
}
