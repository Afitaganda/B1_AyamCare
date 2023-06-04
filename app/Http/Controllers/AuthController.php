<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
  /**
   * Handle an authentication attempt.
   *
   * @return Response
   */

  public function register_view()
  {
    return view('auth.register');
  }

  public function register(Request $request)
  {
    try {
      $validator = Validator::make(request()->all(), [
        'username' => 'required',
        'nama_peternak' => 'required',
        'email' => 'required',
        'password' => 'required'
      ]);

      if ($validator->fails()) {
        return response()->json([
          'msg' => "Pendaftaran Gagal",
          'error' => $validator->messages()
        ], 401);
      }

      User::create([
        'username' => request('username'),
        'nama_peternak' => request('nama_peternak'),
        'email' => request('email'),
        'password' => Hash::make(request('password'))
      ]);

      session()->flash('success', 'Registrasi berhasil! Silahkan login.');
      return redirect('/login');
    } catch (\Throwable $th) {
      dd($th);
      return response()->json([
        'msg' => "Something Went Wrong",
        'error' => $th
      ], 500);
    }
  }


  public function login_view()
  {
    return view('auth.login');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'username' => 'required',
      'password' => 'required'
    ]);

    $check_account = User::whereUsername($request->input('username'))->first();

    if (Hash::check($request->input('password'), $check_account->password) && $check_account->status_akun == 'ADMIN') {
      Auth::attempt($credentials);
      Auth::guard('admin')->attempt($credentials);

      return redirect()->intended('/');
    }

    if (Auth::attempt($credentials)) {
      // $request->session()->regenerate();
      // dd(auth()->user()->id);
      return redirect()->intended('/');
    }

    return back()->with('loginError', 'Login Failed!');

    // $user = User::whereUsername($request->username)->first();
    // if (!$user) {
    //     return response()->json([
    //         'msg' => 'No User Found'
    //     ], 404);
    // }
    // if (!Hash::check($request->password, $user->password)) {
    //     return response()->json([
    //         'msg' => 'Password not match'
    //     ], 401);
    // }
    // // $token = auth()->login($user);

    // $request->session()->put('auth', "mikli");
    // dd($request->session()->get('auth'));

    // return response()->json([
    //     'msg' => 'success',
    //     'data' => $user
    // ]);
  }

  public function me()
  {
    return response()->json(auth()->user());
  }

  public function logout()
  {
    if (auth('admin')->check()) {
      auth('admin')->logout();
    }
    auth()->logout();


    return redirect('/');
  }
}
