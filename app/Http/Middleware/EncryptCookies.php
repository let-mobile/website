<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
        'let__title',
        'let__brand',
        'let__condition',
        'let__price',
        'let__description',
        'let__city',
        'let__address',
        'let__phone'
    ];
}
