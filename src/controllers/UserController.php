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

    public function __construct(UserContract $service)
    {
        parent::__construct($service);
    }

    public function read(Request $request, Response $response): Response
    {
        return $this->ok($response, $this->service->read());
    }

    public function readById(Request $request, Response $response, array $args): Response
    {
        try {
            return $this->ok($response, $this->service->readById($args['id']));
        } catch (ModelNotFoundException $e) {
            return $this->notFound($response);
        }
    }

    public function create(Request $request, Response $response): Response
    {
        try {
            return $this->created($response, ['userId' => $this->service->create($request->getParsedBody())]);
        } catch (EmailNotValidException $e) {
            return $this->badRequest($response, $e);
        } catch (QueryException $e) {
            return $this->badRequest($response, $e);
        }
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        try {
            $this->service->update($args['id'], $request->getParsedBody());
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
            $this->service->delete($args['id']);
            return $this->noContent($response);
        } catch (ModelNotFoundException $e) {
            return $this->notFound($response);
        }
    }

    public function queryQuizes(Request $request, Response $response, array $args): Response
    {
        try {
            return $this->ok($response, $this->service->queryQuizes($args['id']));
        } catch (ModelNotFoundException $e) {
            return $this->notFound($response);
        } catch (QueryException $e) {
            return $this->badRequest($response, $e);
        }
    }
}
