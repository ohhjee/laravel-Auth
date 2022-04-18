<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\ResetToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TokenVerification extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(Request $request, $token)
    {
        return view('auth.token-verification')->with(["token" => $token]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "token" => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('remember_token', $request->get("token"))->first();
        if (!$user) return redirect()->back()->with(["status" => "This token has expired"]);

        $user->password = Hash::make($request->password);
        $user->remember_token = null;
        $user->save();
        return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return string
     */
    public function show(Request $request, $token)
    {

        $user = User::where("remember_token", $token)->first();

        if (!$user) return route("VerifyMail", ["status" => "Token has expired"]);

        return redirect("");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
