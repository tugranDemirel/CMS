<?php

namespace App\Http\Controllers\front\contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mail;
class indexController extends Controller
{
    //
    public function index()
    {
        return view('front.contact.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'message'=> 'required'
        ]);
        $all = $request->except('_token');
        $arr = [
            'name' => ($all['name']),
            'email' => ($all['email']),
            'text' => ($all['message']),
        ];
        try {
            mail::send('mail.contact', $arr, function ($message){
                $message->subject('İletişim');
                $message->to(SYSTEM_EMAIL);
            });
            return redirect()->back()->with('swal', trans('general.contact_form_success'));
        }
        catch (\Exception $e)
        {
            Log::info($e->getMessage());
        }
        return redirect()->back()->with('swal', trans('general.contact_form_alert'));
    }
}
