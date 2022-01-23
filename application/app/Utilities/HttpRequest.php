<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Http;

/**
 * Class ClientRequest
 */
class HttpRequest
{
    private $http;
    private $url;
    private $headers;
    private $timeout;
    private $body;
    private $form_params;
    private $body_json;
    private $multipart;
    private $query;

    /**
     * ClientRequest constructor.
     */
    public function __construct()
    {
        $this->http = Http::withOptions([]);
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * Build option
     */
    public function buildOptions()
    {
        $this->http = $this->http->withOptions([
            'headers'     => $this->headers,
            'verify'      => false,
            'exceptions'  => false,
            'body'        => $this->body,
            'form_params' => $this->form_params,
            'json'        => $this->body_json,
            'multipart'   => $this->multipart,
            'query'       => $this->query,
        ]);
    }

    /**
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function get()
    {
        return $this->http->get($this->url);
    }

    /**
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function post()
    {
        return $this->http->post($this->url);
    }

    /**
     * @param mixed $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @param mixed $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @param mixed $form_params
     */
    public function setFormParams($form_params)
    {
        $this->form_params = $form_params;
    }

    /**
     * @param mixed $body_json
     */
    public function setBodyJson($body_json)
    {
        $this->body_json = $body_json;
    }

    /**
     * @param mixed $multipart
     */
    public function setMultipart($multipart)
    {
        $this->multipart = $multipart;
    }

    /**
     * @param mixed $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }
}
