<?php

namespace App\Controllers;

abstract class BaseController
{
    protected const OK = 200;
    protected const CREATED = 201;
    protected const ACCEPTED = 202;
    protected const NO_CONTENT = 204;
    protected const MOVED_PERMANENTLY = 301;
    protected const BAD_REQUEST = 400;
    protected const UNAUTHORIZED = 401;
    protected const FORBIDDEN = 403;
    protected const NOT_FOUND = 404;
    protected const METHOD_NOT_ALLOWED = 405;
    protected const INTERNAL_SERVER_ERROR = 500;
    protected const BAD_GATEWAY = 502;
    protected const SERVICE_UNAVAILABLE = 503;

    protected function ok($response, $data)
    {
        return $response->withJson($data, self::OK);
    }

    protected function created($response, $data)
    {
        return $response->withJson($data, self::CREATED);
    }

    protected function accepted($response, $data)
    {
        return $response->withJson($data, self::ACCEPTED);
    }

    protected function noContent($response)
    {
        return $response->withJson(null, self::NO_CONTENT);
    }

    protected function movedPermanently($response, $data)
    {
        return $response->withJson($data, self::MOVED_PERMANENTLY);
    }

    protected function badRequest($response, \Exception $e)
    {
        return $response->withJson(['message' => $e->getMessage()], self::BAD_REQUEST);
    }

    protected function unauthorized($response, $data)
    {
        return $response->withJson($data, self::UNAUTHORIZED);
    }

    protected function forbidden($response, $data)
    {
        return $response->withJson($data, self::FORBIDDEN);
    }

    protected function notFound($response)
    {
        return $response->withJson(['message' => 'Not Found.'], self::NOT_FOUND);
    }

    protected function methodNotAllowed($response, $data)
    {
        return $response->withJson($data, self::METHOD_NOT_ALLOWED);
    }

    protected function internalServerError($response, $data)
    {
        return $response->withJson($data, self::INTERNAL_SERVER_ERROR);
    }

    protected function badGateway($response, $data)
    {
        return $response->withJson($data, self::BAD_GATEWAY);
    }

    protected function serviceUnavailable($response, $data)
    {
        return $response->withJson($data, self::SERVICE_UNAVAILABLE);
    }
}
