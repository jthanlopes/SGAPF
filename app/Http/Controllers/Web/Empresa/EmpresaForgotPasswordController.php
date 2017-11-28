<?php

namespace App\Http\Controllers\Web\Empresa;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Password;
use Auth;

class EmpresaForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:empresa');
    }

    protected function broker() {
        return Password::broker('empresas');
    }

    public function showLinkRequestForm() {
        return view('site.email-empresa');
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => 'E-mail não encontrado!']
        );
    }

    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', 'Link para redefinir senha enviado!');
    }
}
