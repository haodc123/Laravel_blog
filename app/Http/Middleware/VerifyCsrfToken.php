<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'admin/*',
		'logout',
    ];
	
	/**
	 * Temporary disable token require
	 * haoDC
	 */
	/*protected function tokensMatch($request)
	{
		if ($request->wantsJson()) {
				return true;
		}
		return parent::tokensMatch($request);
	}*/
}
