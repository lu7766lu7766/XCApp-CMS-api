<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Modules\Base\Support\Scalar\StringMaster;
use Modules\Permission\Constants\MethodPermissionConstants;

class AfterResponseJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $content = [];
        if (config('app.debug')) {
            if (MethodPermissionConstants::mappingToValue($request->getMethod()) !== MethodPermissionConstants::GET) {
                $content['client_request_body'] = $request->request->all();
            }
            $content['query_loq'] = \DB::getQueryLog();
        }
        if ($response instanceof JsonResponse) {
            $content['data'] = $response->getData();
            $content['code'] = $response->getStatusCode();
            $response->setData($content);
        } elseif (($response instanceof Response)) {
            if (StringMaster::isNotEmpty($tmpContent = $response->getContent())) {
                $tmpContent = json_decode($tmpContent, true);
            }
            if (is_null($tmpContent)) {
                // case for exception render html page.
                if (StringMaster::contains($response->getContent(), ['html', 'HTML'])) {
                    return $response;
                } else {
                    $content['data'] = $response->getContent();
                    $content['code'] = $response->getStatusCode();
                }
            } elseif (is_scalar($tmpContent)) {
                $content['data'] = $response->getContent();
                $content['code'] = $response->getStatusCode();
            } else {
                if (isset($tmpContent['code'])) {
                    $content['data'] = $tmpContent['data'] ?? '';
                    $content['code'] = $tmpContent['code'];
                } else {
                    $content['data'] = $tmpContent;
                    $content['code'] = $response->getStatusCode();
                }
            }
            $response->setContent($content);
        }

        return $response->setStatusCode(200);
    }
}
