<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('User.loginUser');
    }
    public function login(Request $request)
    {
        $credetials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($credetials)) {
            return redirect('/home')->with('success', 'login success');
        }
        return redirect('/login')->with('error', 'Email atau sandi salah');
    }
    public function viewRegister(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        $provinces = json_decode($response->getBody());

        $citiesResponse = $client->request('GET', 'https://emsifa.github.io/api-wilayah-indonesia/api/regencies/11.json');
        $cities = json_decode($citiesResponse->getBody());

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['provinces' => $provinces, 'cities' => $cities]);
        } else {
            return view('User.regiterUser', compact('provinces', 'cities'));
        }
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->provinsi = $request->provinsi;
        $user->kota = $request->kota;
        $user->kecamatan = $request->kecamatan;
        $user->kode_pos = $request->kode_pos;
        $user->no_hp = $request->no_hp;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with("success", "Register Successfuly");
    }

    public function logout(Request $request): RedirectResponse
    {
        // dd($request->session()->all());
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
