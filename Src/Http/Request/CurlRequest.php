<?php

namespace Src\Http\Request;

use SebastianBergmann\Diff\Exception;

class CurlRequest
{
    private string $method = 'get';

    private object|null $handler = null;

    private string $url = '';

    public string $info = '';

    private array $data = [];

    private array $headers = [];

    public bool|string $content = '';

    public function __construct()
    {
    }

    public function setUrl(string $url = ''): static
    {
        $this->url = $url;
        return $this;
    }

    public function setMethod(string $get = 'get'): static
    {
        $this->method = $get;
        return $this;
    }

    public function setData(array $data = []): static
    {
        $this->data = $data;
        return $this;
    }

    public function setHeaders(array $headers = []): static
    {
        $this->headers = $headers;
        return $this;
    }


    public function send(): void
    {
        try {
            if ($this->handler == null) {
                $this->handler = curl_init();
            }
            //@property @mixin
            /**
             * @psalm-suppress ArgumentTypeCoercion
             */
            switch (strtolower($this->method)) {
                case 'post':

                    curl_setopt_array($this->handler, [
                        CURLOPT_URL => $this->url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_POST => count($this->data),
                        CURLOPT_POSTFIELDS => http_build_query($this->data),
                    ]);
                    break;

                default:

                    curl_setopt_array($this->handler, [
                        CURLOPT_URL => $this->url,
                        CURLOPT_HTTPHEADER => $this->headers,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_POSTFIELDS => $this->data,
                        CURLOPT_CUSTOMREQUEST => "GET"
                    ]);
                    break;
            }
            //@property @mixin
            /**
             * @psalm-suppress ArgumentTypeCoercion
             */
            $this->content = curl_exec($this->handler);
            //@property @mixin
            /**
             * @psalm-suppress ArgumentTypeCoercion
             */
            $this->info = (string) curl_getinfo($this->handler, CURLINFO_HTTP_CODE);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        //@property @mixin
        /**
         * @psalm-suppress ArgumentTypeCoercion
         */
        curl_close($this->handler);
        $this->handler = null;
    }
}
