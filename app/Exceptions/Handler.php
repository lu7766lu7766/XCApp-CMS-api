<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use League\OAuth2\Server\Exception\OAuthServerException;
use Modules\Base\Exception\ApiErrorCodeException;
use Psr\Log\LoggerInterface;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        ApiErrorCodeException::class,
        OAuthServerException::class
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
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        if ($exception instanceof OAuthServerException) {
            try {
                $logger = $this->container->make(LoggerInterface::class);
            } catch (Exception $ex) {
                throw $exception;
            }
            $logger->error(
                json_encode([
                    'message'   => $exception->getMessage(),
                    'errorType' => $exception->getErrorType(),
                    'hint'      => $exception->getHint(),
                    'payload'   => $exception->getPayload()
                ])
            );
        } else {
            parent::report($exception);
        }
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        $response = parent::render($request, $exception);
        if ($exception instanceof ApiErrorCodeException) {
            $content['data'] = $exception->getMessage();
            $content['code'] = $exception->getCodes();
        } else {
            if (config('app.debug')) {
                return $response;
            } else {
                $content['data'] = $exception->getMessage() ??
                    'A team of highly trained monkeys has been dispatched to deal with this situation.';
                $content['code'] = $response->getStatusCode();
            }
        }
        if ($response instanceof JsonResponse) {
            $response->setData($content);
        } else {
            $response->setContent(json_encode($content));
        }

        return $response;
    }

    /**
     * Because this app is a api app, so when auth failed ,we don't need to redirect a view.
     * and we need return msg for use to know.
     *
     * @inheritdoc
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return response()->json(['message' => $exception->getMessage()], 401);
    }
}
