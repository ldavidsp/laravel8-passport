<?php

use App\Models\Projects;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  Projects::create([
    'name' => 'Homeflow Technologies',
    'description' => 'Empresa SaaS and Software Development',
  ]);

  Projects::create([
    'name' => 'Fire Codes',
    'description' => 'Software Development',
  ]);
  return view('welcome');
});

Route::get('/token-app', function (Request $request) {
  $response = Http::asForm()->post('http://127.0.0.1:8000/oauth/token', [
    'grant_type' => 'client_credentials',
    'client_id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
    'client_secret' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'),
  ]);

  return $response->json();
});
