<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
    protected function tokensMatch($request)
{
    // استثناء صفحة تسجيل الدخول وأي رابط آخر تود استثناؤه هنا
    if ($request->path() === 'login' || $request->path() === 'adminAuth.login') {
        return true;
    }

    return parent::tokensMatch($request);
}
}
