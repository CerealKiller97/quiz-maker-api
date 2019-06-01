<?php

namespace App\Controllers;

use \PSR\Http\Message\ServerRequestInterface as Request;
use \PSR\Http\Message\ResponseInterface as Response;
use \App\Contracts\QuestionContract;
use \Illuminate\Database\QueryException;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class QuestionController extends BaseController
{

  protected $questionService;

  public function __construct(QuestionContract $questionService)
  {
    $this->questionService = $questionService;
  }

  public function read(Request $request, Response $response): Response
  {
    try {
      return $this->ok($response, $this->questionService->read());
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function readById(Request $request, Response $response, array $args): Response
  {
    try {
      return $this->ok($response, $this->questionService->readById($args['id']));
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function create(Request $request, Response $response): Response
  {
    try {
      return $this->created($response, ['questionId' => $this->questionService->create($request->getParsedBody())]);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function update(Request $request, Response $response, array $args): Response
  {
    try {
      $this->questionService->update($args['id'], $request->getParsedBody());
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
      $this->questionService->delete($args['id']);
      return $this->noContent($response);
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function queryQuiz(Request $request, Response $response, array $args): Response
  {
    try {
      return $this->ok($response, $this->questionService->queryQuiz($args['id']));
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function queryAnswers(Request $request, Response $response, array $args): Response
  {
    try {
      return $this->ok($response, $this->questionService->queryAnswers($args['id']));
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }
}
