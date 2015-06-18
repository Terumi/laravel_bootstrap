<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SendMailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{

    public function sendEmail(SendMailRequest $request)
    {

        Mail::send('emails.message', ['name' => $request->get('name'), 'email' => $request->get('email'), 'msg' => $request->get('message'), 'phone' => $request->get('phone')], function ($message) {
            $message->to(Config::get('site_info')['admin_email'], Config::get('site_info')['admin_name'])
	            ->subject(Config::get('site_info')['admin_email_title']);
        });

        Session::flash('success', "Mail sent");
        return Redirect::back();
    }

}
