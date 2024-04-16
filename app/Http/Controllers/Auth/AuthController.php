<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function login()
    {
        return view('');
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
}
