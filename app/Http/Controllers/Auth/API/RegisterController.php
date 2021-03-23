<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;

class RegisterController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var StatefulGuard
     */
    protected StatefulGuard $guard;

    /**
     * Create a new controller instance.
     *
     * @param StatefulGuard $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * @param Request $request
     * @param CreatesNewUsers $creator
     * @return Response
     */
    public function store(Request $request, CreatesNewUsers $creator): Response
    {
        event(new Registered($user = $creator->create($request->all())));
        $this->guard->login($user);
        return app(RegisterResponse::class);
    }
}
