<?php


namespace Lamda\Core\Http;

class Response
{
    protected string $content;
    protected int $status;
    protected array $headers = [];


    public function __construct(string $content, int $status = 200, array $headers = [])
    {
        $this->$content = $content;
        $this->status = $status;
        $this->headers = $headers;
    }

    public static function make(string $content, int $status = 200, $headers = [])
    {
        return new self($content, $status, $headers);
    }

    public function send(): void
    {
        http_response_code($this->status);
        foreach ($this->headers as $name => $value){
            header($name. ': '. $value);
        }

        echo $this->content;
    }
}