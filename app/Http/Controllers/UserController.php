<?php

namespace App\Http\Controllers;

use App\Models\Kandang;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\HttpFoundation\Session\Session;
use Validator;

class UserController extends Controller
{

  public function profile()
  {
    $detail_user = User::whereIdPeternak(auth()->user()->id_peternak)->first();
    return view('dashboard')->with(array(
      'detail_user' => $detail_user
    ));
  }

  public function cara_upgrade_vip()
  {
    return view('cara_vip');
  }
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    try {
      $user = User::all();
      return response()->json([
        'msg' => "All data retrieved successfully",
        'data' => $user
      ], 200);
    } catch (\Throwable $th) {
      return response()->json([
        'msg' => "Something Went Wrong",
        'error' => $th
      ], 500);
    }
  }

  // ADMIN DASHBOARD
  public function dashboard_admin()
  {
    if (request()->users == 1) {
      $users = User::orderBy('username', 'ASC')->get();

      if (request()->username) {
        $kandang = Kandang::whereUsernamePeternak(request()->username)->get();
        $detail_user = User::whereUsername(request()->username)->first();
        // dd($kandang);
        return view('dashboard_admin')->with(array(
          'users' => $users,
          'detail_user' => $detail_user,
          'kandang' => $kandang
        ));
      }
      return view('dashboard_admin')->with(array(
        'users' => $users
      ));
    }
    $detail_user = User::whereUsername(auth()->user()->username)->first();

    return view('dashboard_admin')->with(array('detail_user' => $detail_user));
  }

  // AUTH LOGIN
  public function login(Request $request)
  {
    try {
      $user = User::whereUsername($request->username)->first();
      if (!$user) {
        return response()->json([
          'msg' => 'No User Found'
        ], 404);
      }
      if (!Hash::check($request->password, $user->password)) {
        return response()->json([
          'msg' => 'Password not match'
        ], 401);
      }
      // $token = auth()->login($user);

      // var_dump($user);
      $session = new Session();
      $session->set('auth', 'Mikli Oktarianto');

      // var_dump($request->session()->get('auth'));

      return response()->json([
        'msg' => 'success',
        'data' => $user,
        'request' => $request->all()
      ]);
    } catch (\Throwable $th) {
      return response()->json([
        'msg' => "Something Went Wrong",
        'error' => $th
      ], 500);
    }
  }

  // AUTH REGISTER
  public function register()
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

      $user = User::create([
        'username' => request('username'),
        'nama_peternak' => request('nama_peternak'),
        'email' => request('email'),
        'password' => Hash::make(request('password'))
      ]);

      return response()->json([
        'msg' => "Register successfull",
        'data' => $user
      ], 201);
    } catch (\Throwable $th) {
      dd($th);
      return response()->json([
        'msg' => "Something Went Wrong",
        'error' => $th
      ], 500);
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Request $request)
  {
    try {
      User::whereIdPeternak(auth()->user()->id_peternak)->update([
        'nama_peternak' => $request['nama_peternak'],
        'no_handphone' => $request['no_handphone'],
        'username' => $request['username'],
        'email' => $request['email'],
        'alamat' => $request['alamat'],
      ]);
      session()->flash('success', 'User profile detail of user has been updated');

      return $this->profile();
    } catch (\Throwable $th) {
      dd($th);
    }
  }


  public function edit_admin(Request $request)
  {
    try {
      User::whereIdPeternak(auth()->user()->id_peternak)->update([
        'nama_peternak' => $request['nama_peternak'],
        'no_handphone' => $request['no_handphone'],
        'username' => $request['username'],
        'email' => $request['email'],
        'alamat' => $request['alamat'],
      ]);
      session()->flash('success', 'Admin profile detail of user has been updated');

      return $this->dashboard_admin();
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $dataPengeluaran)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
}
