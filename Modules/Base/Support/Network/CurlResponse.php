<?php
/**
 * Created by PhpStorm.
 * User: MID-House
 * Date: 2016/9/29
 * Time: 下午 04:07
 */

namespace Modules\Base\Network;

/**
 * Class CurlResponse
 * @package Mid\CommonTools\Network
 */
class CurlResponse
{
    /**
     * The response content.
     * @var string
     */
    private $responseBody = "";
    /**
     * The response detail (Not included response body).
     * @var array
     */
    private $responseInfo = [];
    /**
     * The post data.
     * @var array
     */
    private $posts;
    /**
     * The http method
     * @var string
     */
    private $httpMethod;
    /**
     * Cookie list.
     * @var array
     */
    private $cookieList;

    /**
     * @return string
     */
    public function getResponseBody(): string
    {
        return $this->responseBody;
    }

    /**
     * @param string $responseBody
     * @return CurlResponse
     */
    public function setResponseBody(string $responseBody): CurlResponse
    {
        $this->responseBody = $responseBody;

        return $this;
    }

    /**
     * @return array
     * @see http://php.net/manual/en/function.curl-getinfo.php
     */
    public function getResponseInfo(): array
    {
        return $this->responseInfo;
    }

    /**
     * @param array $responseInfo
     * @return CurlResponse
     */
    public function setResponseInfo(array $responseInfo): CurlResponse
    {
        $this->responseInfo = $responseInfo;

        return $this;
    }

    /**
     * @return array
     */
    public function getPosts(): array
    {
        return $this->posts;
    }

    /**
     * @param array $posts
     * @return $this
     */
    public function setPosts(array $posts): CurlResponse
    {
        $this->posts = $posts;

        return $this;
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * @param string $httpMethod
     * @return $this
     */
    public function setHttpMethod(string $httpMethod): CurlResponse
    {
        $this->httpMethod = $httpMethod;

        return $this;
    }

    /**
     * @return array
     */
    public function getCookieList(): array
    {
        return $this->cookieList;
    }

    /**
     * @param array $cookieList
     * @return CurlResponse
     */
    public function setCookieList(array $cookieList): CurlResponse
    {
        $this->cookieList = $cookieList;

        return $this;
    }

    /**
     * Get info by key.
     * @param string $key
     * @return string
     */
    public function getResponseInfoByKey(string $key): string
    {
        $info = $this->getResponseInfo();
        if (isset($info[$key])) {
            return $info[$key];
        } else {
            return "";
        }
    }

    /**
     * Get the http status code.
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->getResponseInfoByKey("http_code");
    }

    /**
     * Get effective url.
     * @return string
     */
    public function getEffectiveUrl(): string
    {
        return $this->getResponseInfoByKey("url");
    }

    /**
     * Get request headers
     * @return string
     */
    public function getRequestHeaders(): string
    {
        return $this->getResponseInfoByKey("request_header");
    }

    public function __toString()
    {
        return (string)var_export($this, true);
    }
}
