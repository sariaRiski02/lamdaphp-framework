<?php

namespace Lamda\Core\Http;

class Response
{
    protected string $content;
    protected int $status;
    protected array $headers = [];


    public function __construct(string $content = '', int $status = 200, array $headers = [])
    {
        $this->content = $content;
        $this->status = $status;
        $this->headers = $headers;
    }

    public static function make($content = '', int $status = 200, $headers = [])
    {

        // jika sudah instance Response, kembalikan saja
        if ($content instanceof self) {
            return $content;
        }

        // jika callable (mis. route handler mengembalikan clousre) maka panggil
        if (is_callable($content)) {
            $content = call_user_func($content);

            // jika callable mengembalikan Response, kembalikan langsung
            if ($content instanceof self) {
                return $content;
            }
        }

        if ($content === null) {
            $content = '';
        }

        // jika array atau object (tanpa __toString) -> JSON
        if (is_array($content) || (is_object($content) && !method_exists($content, '__toString'))) {
            // jangan timpa header jika sudah diset
            if (!isset($headers['Content-Type'])) {
                $headers['Content-Type'] = 'application/json';
            }
            $content = json_encode($content);
        } else {
            $content = (string) $content;
        }


        return new self($content, $status, $headers);
    }

    public function send(): void
    {
        http_response_code($this->status);
        foreach ($this->headers as $name => $value) {
            header($name . ': ' . $value);
        }

        echo $this->content;
    }

    /** ============================= Helper Function =============================== */

    // Getter, Setter and Helper funcition

    public function getContent(): int
    {
        return $this->content;
    }

    public function getHeader(): array
    {
        return $this->headers;
    }


    // Mutator (mutable)
    public function setStatus(int $status_code): self
    {
        $this->status = $status_code;
        return $this;
    }


    public function setHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;
        return $this;
    }


    // Imutable helper: kembalikan clone dengan header baru
    public function withHeader(string $name, string $value): self
    {
        $clone = clone $this;
        $clone->headers[$name] = $value;
        return $clone;
    }

    public static function json($data, int $status = 200, array $headers = []): self
    {
        $headers['Content-Type'] = 'application/json';
        return self::make($data, $status, $headers);
    }

    public static function redirect(string $url, int $status = 302, array $headers = []): self
    {
        $headers['Location'] = $url;
        return self::make('', $status, $headers);
    }
}
