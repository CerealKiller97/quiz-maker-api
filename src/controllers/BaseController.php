<?php

namespace App\Controllers;

use App\Traits\StatusCodes;

abstract class BaseController
{
   use StatusCodes;

   protected $service;

   public function __construct($service)
   {
     $this->service = $service;
   }

}
