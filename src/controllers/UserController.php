<?php

namespace App\Controllers;

use \App\Exceptions\EmailNotValidException;
use \PSR\Http\Message\ServerRequestInterface as Request;
use \PSR\Http\Message\ResponseInterface as Response;
use \App\Contracts\UserContract;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use \Illuminate\Database\QueryException;

class UserController extends BaseController
{
    protected $userService;

    public function __construct(UserContract $userService)
    {
        $this->userService = $userService;
    }

    public function read(Request $request, Response $response): Response
    {
        return $this->ok($response, $this->userService->read());
    }

    public function readById(Request $request, Response $response, array $args): Response
    {
        try {
            return $this->ok($response, $this->userService->readById($args['id']));
        } catch (ModelNotFoundException $e) {
            return $this->notFound($response);
        }
    }

    public function create(Request $request, Response $response): Response
    {
        try {
            return $this->created($response, ['userId' => $this->userService->create($request->getParsedBody())]);
        } catch (EmailNotValidException $e) {
            return $this->badRequest($response, $e);
        } catch (QueryException $e) {
            return $this->badRequest($response, $e);
        }
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        try {
            $this->userService->update($args['id'], $request->getParsedBody());
            return $this->noContent($response);
        } catch (ModelNotFoundException $e) {
            return $this->notFound($response);
        } catch (EmailNotValidException $e) {
            return $this->badRequest($response, $e);
        } catch (QueryException $e) {
            return $this->badRequest($response, $e);
        }
    }

    public function delete(Request $request, Response $response, array $args): Response
    {
        try {
            $this->userService->delete($args['id']);
            return $this->noContent($response);
        } catch (ModelNotFoundException $e) {
            return $this->notFound($response);
        }
    }

    public function queryQuizes(Request $request, Response $response, array $args): Response
    {
        try {
            return $this->ok($response, $this->userService->queryQuizes($args['id']));
        } catch (ModelNotFoundException $e) {
            return $this->notFound($response);
        } catch (QueryException $e) {
            return $this->badRequest($response, $e);
        }
    }
}
