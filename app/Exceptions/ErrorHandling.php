<?php

namespace App\Exceptions;

use Exception;

interface ErrorHandling
{
    public function get(Exception $e);

    public function set($request, Exeption $e);
}