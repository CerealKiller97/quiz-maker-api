<?php

namespace App\Controllers;

use \PSR\Http\Message\ServerRequestInterface as Request;
use \PSR\Http\Message\ResponseInterface as Response;
use \App\Contracts\QuizContract;
use \Illuminate\Database\QueryException;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class QuizController extends BaseController
{

  protected $quizService;

  public function __construct(QuizContract $quizService)
  {
    $this->quizService = $quizService;
  }

  public function read(Request $request, Response $response): Response
  {
    try {
      return $this->ok($response, $this->quizService->read());
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function readById(Request $request, Response $response, array $args): Response
  {
    try {
      return $this->ok($response, $this->quizService->readById($args['id']));
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function create(Request $request, Response $response): Response
  {
    try {
      return $this->created($response, ['quizId' => $this->quizService->create($request->getParsedBody())]);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function update(Request $request, Response $response, array $args): Response
  {
    try {
      $this->quizService->update($args['id'], $request->getParsedBody());
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
      $this->quizService->delete($args['id']);
      return $this->noContent($response);
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function queryUser(Request $request, Response $response, array $args): Response
  {
    try {
      return $this->ok($response, $this->quizService->queryUser($args['id']));
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }

  public function queryQuestions(Request $request, Response $response, array $args): Response
  {
    try {
      return $this->ok($response, $this->quizService->queryQuestions($args['id']));
    } catch (ModelNotFoundException $e) {
      return $this->notFound($response);
    } catch (QueryException $e) {
      return $this->badRequest($response, $e);
    }
  }
}
