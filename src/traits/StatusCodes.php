<?php

namespace App\Traits;

trait StatusCodes
{
  public  $OK = 200;
  public $CREATED = 201;
  public $ACCEPTED = 202;
  public $NO_CONTENT = 204;
  public $MOVED_PERMANENTLY = 301;
  public $BAD_REQUEST = 400;
  public $UNAUTHORIZED = 401;
  public $FORBIDDEN = 403;
  public $NOT_FOUND = 404;
  public $METHOD_NOT_ALLOWED = 405;
  public $INTERNAL_SERVER_ERROR = 500;
  public $BAD_GATEWAY = 502;
  public $SERVICE_UNAVAILABLE = 503;

  public function ok($response, $data)
  {
    return $response->withJson($data, $this->OK);
  }

  public function created($response, $data)
  {
    return $response->withJson($data, $this->CREATED);
  }

  public function accepted($response, $data)
  {
    return $response->withJson($data, $this->ACCEPTED);
  }

  public function noContent($response)
  {
    return $response->withJson(null, $this->NO_CONTENT);
  }

  public function movedPermanently($response, $data)
  {
    return $response->withJson($data, $this->MOVED_PERMANENTLY);
  }

  public function badRequest($response, \Exception $e)
  {
    return $response->withJson(['message' => $e->getMessage()], $this->BAD_REQUEST);
  }

  public function unauthorized($response, $data)
  {
    return $response->withJson($data, $this->UNAUTHORIZED);
  }

  public function forbidden($response, $data)
  {
    return $response->withJson($data, $this->FORBIDDEN);
  }

  public function notFound($response)
  {
    return $response->withJson(['message' => 'Not Found.'], $this->NOT_FOUND);
  }

  public function methodNotAllowed($response, $data)
  {
    return $response->withJson($data, $this->METHOD_NOT_ALLOWED);
  }

  public function internalServerError($response, $data)
  {
    return $response->withJson($data, $this->INTERNAL_SERVER_ERROR);
  }

  public function badGateway($response, $data)
  {
    return $response->withJson($data, $this->BAD_GATEWAY);
  }

  public function serviceUnavailable($response, $data)
  {
    return $response->withJson($data, $this->SERVICE_UNAVAILABLE);
  }
}