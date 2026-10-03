<?php

use Lamda\Core\Http\Request;
use Lamda\Core\Http\Response;
use Lamda\Core\Routing\Router;
use PHPUnit\Framework\TestCase;

class DummyController
{
    public function show($id)
    {
        return "user-$id";
    }
}

class RouterTest extends TestCase
{
    public function testClosureWithParams(): void
    {
        $router = new Router();
        $router->get('/users/{id}', fn($id) => "hello $id");
        $res = $router->dispatch(new Request('GET', '/users/7'));
        $this->assertSame('hello 7', $res->getContent());
        $this->assertSame(200, $res->getStatus());
    }

    public function testArrayAction(): void
    {
        $router = new Router();
        $router->get('/u/{id}', [DummyController::class, 'show']);
        $this->assertSame('user-3', $router->dispatch(new Request('GET', '/u/3'))->getContent());
    }

    public function testNotFound(): void
    {
        $res = (new Router())->dispatch(new Request('GET', '/nope'));
        $this->assertSame(404, $res->getStatus());
    }

    public function testMethodMismatchIs404(): void
    {
        $router = new Router();
        $router->post('/x', fn() => 'ok');
        $this->assertSame(404, $router->dispatch(new Request('GET', '/x'))->getStatus());
    }

    public function testMissingControllerAndMethod(): void
    {
        $router = new Router();
        $router->get('/a', [Missing::class, 'x']);
        $router->get('/b', [DummyController::class, 'nope']);
        $router->get('/c', 'Bad');
        $this->assertSame(500, $router->dispatch(new Request('GET', '/a'))->getStatus());
        $this->assertSame(500, $router->dispatch(new Request('GET', '/b'))->getStatus());
        $this->assertSame(500, $router->dispatch(new Request('GET', '/c'))->getStatus());
    }

    public function testResponseJsonAndRequestNormalization(): void
    {
        $res = Response::make(['a' => 1]);
        $this->assertSame('{"a":1}', $res->getContent());
        $this->assertSame('application/json', $res->getHeader()['Content-Type']);
        $this->assertSame('/foo', (new Request('get', 'foo'))->path());
        $this->assertSame('GET', (new Request('get', 'foo'))->method());
    }
}
