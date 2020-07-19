<?php
/**
 * Created by PhpStorm.
 * User: MID-House
 * Date: 2016/9/29
 * Time: 下午 03:42
 */

namespace Modules\Base\Network;

use Modules\Base\Network\Exception\CurlExeFailException;

/**
 * Class Curl
 * @package Mid\CommonTools\Network
 */
class Curl
{
    /**
     * POST method const
     * @var string
     */
    const POST_METHOD = 'post';
    /**
     * GET method const
     * @var string
     */
    const GET_METHOD = 'get';
    /**
     * Default user agent
     * @var string
     */
    const DEFAULT_USERAGENT = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36';
    /**
     * The curl obj.
     * @var resource
     */
    private $curl;
    /**
     * The response.
     * @var CurlResponse
     */
    private $response;

    /**
     * HttpCurl constructor.
     */
    public function __construct()
    {
        $this->curl = curl_init();
        $this->response = new CurlResponse();
        $this->setDefaultOptions();
    }

    /**
     * @return resource
     */
    public function getHandle()
    {
        return $this->curl;
    }

    /**
     * Set cURL options to default
     */
    public function setDefaultOptions()
    {
        $this->setFollowLocation(true)
            ->setAutoReferer(true)
            ->setCookieSession(false)
            ->setReturnTransfer(true)
            ->setTimeout(30)
            ->setUserAgent(self::DEFAULT_USERAGENT)
            ->setConnectTimeout(60);
    }

    /**
     * TRUE to follow any "Location:" , if CURLOPT_MAXREDIRS is set , that well follow amount of HTTP redirections.
     * @param bool $followLocation
     * @return Curl
     */
    public function setFollowLocation(bool $followLocation): Curl
    {
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, $followLocation);

        return $this;
    }

    /**
     * TRUE to automatically set the Referer: field in requests where it follows a Location: redirect.
     * @param bool $autoReferer
     * @return Curl
     */
    public function setAutoReferer(bool $autoReferer): Curl
    {
        curl_setopt($this->curl, CURLOPT_AUTOREFERER, $autoReferer);

        return $this;
    }

    /**
     * TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
     * @param bool $returnTransfer
     * @return Curl
     */
    public function setReturnTransfer(bool $returnTransfer): Curl
    {
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, $returnTransfer);

        return $this;
    }

    /**
     * The maximum number of seconds to allow cURL functions to execute.
     * @param $timeout
     * @return Curl
     */
    public function setTimeout($timeout): Curl
    {
        curl_setopt($this->curl, CURLOPT_TIMEOUT, $timeout);

        return $this;
    }

    /**
     * The contents of the "User-Agent: " header to be used in a HTTP request.
     * @param string $userAgent
     * @return Curl
     */
    public function setUserAgent(string $userAgent): Curl
    {
        curl_setopt($this->curl, CURLOPT_USERAGENT, $userAgent);

        return $this;
    }

    /**
     * The number of seconds to wait while trying to connect. Use 0 to wait indefinitely.
     * @param int $secTime
     * @return Curl
     */
    public function setConnectTimeout(int $secTime): Curl
    {
        curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, $secTime);

        return $this;
    }

    /**
     * An array of HTTP header fields to set, in the format array('Content-type: text/plain', 'Content-length: 100')
     * @param array $headers
     * @return Curl
     */
    public function setHttpHeader(array $headers): Curl
    {
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);

        return $this;
    }

    /**
     * The maximum amount of HTTP redirections to follow. Use this option alongside CURLOPT_FOLLOWLOCATION.
     * @param int $maxRedirects
     * @return Curl
     */
    public function setMaxRedirects(int $maxRedirects): Curl
    {
        curl_setopt($this->curl, CURLOPT_MAXREDIRS, $maxRedirects);

        return $this;
    }

    /**
     * The contents of the "Referer: " header to be used in a HTTP request.
     * @param string $referer url
     * @return Curl
     */
    public function setReferer(string $referer): Curl
    {
        curl_setopt($this->curl, CURLOPT_REFERER, $referer);

        return $this;
    }

    /**
     * 0 don't verify ssl
     * 1 to check the existence of a common name in the SSL peer certificate.<p>
     * 2 to check the existence of a common name and also verify that it matches the hostname provided.(default value)
     * @param string $sslVerifyhost url
     * @return Curl
     */
    public function setSSLVerifyhost(string $sslVerifyhost): Curl
    {
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, $sslVerifyhost);

        return $this;
    }

    /**
     * FALSE to stop cURL from verifying the peer's certificate.<p><p>
     * Alternate certificates to verify against can be specified with the CURLOPT_CAINFO option
     * or a certificate directory can be specified with the CURLOPT_CAPATH option.<p><p>
     * TRUE by default as of cURL 7.10. Default bundle installed as of cURL 7.10.
     * @param bool $sslVerifypeer url
     * @return Curl
     */
    public function setSSLVerifypeer(bool $sslVerifypeer): Curl
    {
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, $sslVerifypeer);

        return $this;
    }

    /**
     * Batch set curl opts
     * @param array $options curl opts.
     * @return Curl
     */
    public function setOptions(array $options): Curl
    {
        curl_setopt_array($this->curl, $options);

        return $this;
    }

    /**
     * TRUE to track the handle's request string.
     * @param bool $headerOut
     * @return Curl
     */
    public function setHeaderOut(bool $headerOut): Curl
    {
        curl_setopt($this->curl, CURLINFO_HEADER_OUT, $headerOut);

        return $this;
    }

    /**
     * The HTTP authentication method(s) to use. The options are: CURLAUTH_BASIC, CURLAUTH_DIGEST, CURLAUTH_GSSNEGOTIATE, CURLAUTH_NTLM, CURLAUTH_ANY,
     * and CURLAUTH_ANYSAFE.
     * @param int $method
     * @return Curl
     */
    public function setHttpAuth(int $method): Curl
    {
        curl_setopt($this->curl, CURLOPT_HTTPAUTH, $method);

        return $this;
    }

    /**
     * A username and password formatted as "[username]:[password]" to use for the connection.
     * @param string $userPwd
     * @return Curl
     */
    public function setUserPwd($userPwd): Curl
    {
        curl_setopt($this->curl, CURLOPT_USERPWD, $userPwd);

        return $this;
    }

    /**
     * The contents of the "Accept-Encoding: " header. This enables decoding of the
     * response. Supported encodings are "identity", "deflate", and "gzip". If an empty
     * string, "", is set, a header containing all supported encoding types is sent.
     * @param string $encoding
     * @return Curl
     */
    public function setEncoding($encoding): Curl
    {
        curl_setopt($this->curl, CURLOPT_ENCODING, $encoding);

        return $this;
    }

    /**
     * TRUE to mark this as a new cookie "session".
     * @param bool $cookieSession
     * @return Curl
     */
    public function setCookieSession(bool $cookieSession): Curl
    {
        curl_setopt($this->curl, CURLOPT_COOKIESESSION, $cookieSession);

        return $this;
    }

    /**
     * Save cookie as file when session handle end(exec end).
     * @param string $cookieFileName
     * @return Curl
     */
    public function setCookieByFile(string $cookieFileName): Curl
    {
        curl_setopt($this->curl, CURLOPT_COOKIEJAR, $cookieFileName);
        curl_setopt($this->curl, CURLOPT_COOKIEFILE, $cookieFileName);

        return $this;
    }

    /**
     * The contents of the "Cookie: " header to be used in the HTTP request.<p><p>
     * multiple cookies are separated with a semicolon followed by a space
     * @param string $cookie
     * @return Curl
     * @example fruit=apple; colour=red
     */
    public function setCookieByString(string $cookie): Curl
    {
        curl_setopt($this->curl, CURLOPT_COOKIE, $cookie);

        return $this;
    }

    /**
     * Set get method need options.
     * @param string $url
     * @return Curl
     */
    public function setGetOption(string $url)
    {
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_HTTPGET, true);

        return $this;
    }

    /**
     * Set post method need options.
     * @param string $url
     * @param array $posts
     * @param bool $httpBuildQuery
     * @return Curl
     */
    public function setPostOption(string $url, array $posts = [], bool $httpBuildQuery = false)
    {
        $posts["is_query"] = $httpBuildQuery;
        $postFields = $httpBuildQuery ? (http_build_query($posts)) : $posts;
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $postFields);

        return $this;
    }

    /**
     * @param string $url
     * @param array $posts
     * @param bool $httpBuildQuery
     * @return $this
     */
    public function setPostOptionNotIsQuery(string $url, array $posts = [], bool $httpBuildQuery = false)
    {
        $postFields = $httpBuildQuery ? (http_build_query($posts)) : $posts;
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $postFields);

        return $this;
    }

    /**
     * A custom request method to use instead of "GET" or "HEAD" when doing a HTTP request.
     * This is useful for doing "DELETE" or other, more obscure HTTP requests. Valid values are things like "GET", "POST", "CONNECT" and so on;
     * i.e. Do not enter a whole HTTP request line here. For instance, entering "GET /index.html HTTP/1.0\r\n\r\n" would be incorrect.
     * @param $method
     * @return Curl
     */
    public function setCustomerRequest($method)
    {
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);

        return $this;
    }

    /**
     * Read SSL page content from https with curl
     * @return Curl
     */
    public function enableSSL(): Curl
    {
        $this->setSSLVerifyhost(0);
        $this->setSSLVerifypeer(false);

        return $this;
    }

    /**
     * Get response content
     * @return string
     */
    public function getHtml(): string
    {
        return $this->getResponse()->getResponseBody();
    }

    /**
     * Get response info.
     * @param bool $loadDetail if true well load detail again from handle.
     * @return CurlResponse
     */
    public function getResponse(bool $loadDetail = false): CurlResponse
    {
        if ($loadDetail) {
            $this->saveResponseDetail();
        }

        return $this->response;
    }

    /**
     * Load a web page use get method.
     * @param string $url
     * @param bool $handleReset
     * @return Curl
     * @throws CurlExeFailException
     */
    public function doGet(string $url, bool $handleReset = true): Curl
    {
        $this->setGetOption($url);
        curl_exec($this->curl);
        // save response detail.
        $this->saveResponseDetail(self::GET_METHOD);
        if ($handleReset) {
            $this->resetHandle();
        }
        // check error.
        $this->checkSucceed();

        return $this;
    }

    /**
     * Load a web page use post method.
     * @param string $url
     * @param array $posts
     * @param bool $httpBuildQuery
     * @param bool $handleReset
     * @return Curl
     * @throws CurlExeFailException
     */
    public function doPost(string $url, array $posts = [], bool $httpBuildQuery = false, bool $handleReset = true): Curl
    {
        $this->setPostOption($url, $posts, $httpBuildQuery);
        curl_exec($this->curl);
        // save response detail.
        $this->saveResponseDetail(self::POST_METHOD, $posts);
        if ($handleReset) {
            $this->resetHandle();
        }
        // check error.
        $this->checkSucceed();

        return $this;
    }

    /**
     * @param string $url
     * @param array $posts
     * @param bool $httpBuildQuery
     * @param bool $handleReset
     * @return Curl
     * @throws CurlExeFailException
     */
    public function doPostNoIsQuery(string $url, array $posts = [], bool $httpBuildQuery = false, bool $handleReset = true): Curl
    {
        $this->setPostOptionNotIsQuery($url, $posts, $httpBuildQuery);
        curl_exec($this->curl);
        // save response detail.
        $this->saveResponseDetail(self::POST_METHOD, $posts);
        if ($handleReset) {
            $this->resetHandle();
        }
        // check error.
        $this->checkSucceed();

        return $this;
    }

    /**
     * Do post request to designation url.
     * @param string $url
     * @param string $request
     * @param bool $handleReset
     * @return Curl
     * @throws CurlExeFailException
     */
    public function doPostRequest(string $url, string $request, bool $handleReset = true): Curl
    {
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $request);
        curl_exec($this->curl);
        // save response detail.
        $this->saveResponseDetail(self::POST_METHOD, [$request]);
        if ($handleReset) {
            $this->resetHandle();
        }
        // check error.
        $this->checkSucceed();

        return $this;
    }

    /**
     * Save the response detail.
     * @param string $method
     * @param array $posts
     */
    private function saveResponseDetail(string $method = self::GET_METHOD, array $posts = [])
    {
        $this->response->setResponseBody(curl_multi_getcontent($this->curl))
            ->setHttpMethod($method)
            ->setResponseInfo(curl_getinfo($this->curl))
            ->setPosts($posts)
            ->setCookieList(curl_getinfo($this->curl, CURLINFO_COOKIELIST));
    }

    /**
     * Reset curl handle to default without close.
     */
    public function resetHandle()
    {
        curl_reset($this->curl);
        $this->setDefaultOptions();
    }

    /**
     * Close current curl session and new a session with default options.
     */
    public function closeAndInit()
    {
        $this->close();
        $this->curl = curl_init();
        $this->setDefaultOptions();
    }

    /**
     * Close the curl handle.
     */
    public function close()
    {
        curl_close($this->curl);
    }

    /**
     * Check the curl exec is success or not.
     * @throws CurlExeFailException when curl exe error occur
     */
    public function checkSucceed()
    {
        if ($this->getErrorNumber() != CURLE_OK) {
            throw new CurlExeFailException($this->getErrorMessage() . "(" . $this->getErrorNumber() . ")");
        }
    }

    /**
     * Return the last error number
     * @return int
     */
    public function getErrorNumber(): int
    {
        return curl_errno($this->curl);
    }

    /**
     * Return a string containing the last error for the current session
     * @return string
     */
    public function getErrorMessage(): string
    {
        return curl_error($this->curl);
    }
}
