<?php

namespace App\Controllers;

use \PSR\Http\Message\ServerRequestInterface as Request;
use \PSR\Http\Message\ResponseInterface as Response;
use \App\Contracts\AnswerContract;
use \Illuminate\Database\QueryException;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class AnswerController extends BaseController
{

  protected $answerService;

  public function __construct(AnswerContract $answerService)
  {
    $this->answerService = $answerService;
  }

  public function read(Request $request, Response $response): Response
  {
    try {
      return $this->ok($response, $this->answerService->read());
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function readById(Request $request, Response $response, array $args): Response
  {
    try {
      return $this->ok($response, $this->answerService->readById($args['id']));
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function create(Request $request, Response $response): Response
  {
    try {
      return $this->created($response, ['answerId' => $this->answerService->create($request->getParsedBody())]);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function update(Request $request, Response $response, array $args): Response
  {
    try {
      $this->answerService->update($args['id'], $request->getParsedBody());
      return $this->noContent($response);
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function delete(Request $request, Response $response, array $args): Response
  {
    try {
      $this->answerService->delete($args['id']);
      return $this->noContent($response);
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function queryQuestion(Request $request, Response $response, array $args): Response
  {
    try {
      return $this->ok($response, $this->answerService->queryQuestion($args['id']));
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }
}
