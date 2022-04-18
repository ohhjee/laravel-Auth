<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\ResetToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class Verifymail extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('auth.VerifyMail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $user = User::where('email', $request->Input('email'))->first();
        if (!$user) {
            return back()->with('status', 'mail is invalid');
        }
      
        $token = Str::random(8);
        $user->remember_token = $token;
        $user->save();
        try {
            Mail::to($user->email)->send(new ResetToken($token));
            return back()->with('success', 'a mail has been sent to your email');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage() ?? 'a mail can not be send to your email');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
