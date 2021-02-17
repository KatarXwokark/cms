<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/page',
        'api/page/*',
        'api/template',
        'api/template/*',
        'api/language',
        'api/language/*',
        'api/product',
        'api/product/*',
        'api/category',
        'api/category/*',
        'api/user',
        'api/user/*',
    ];
}
