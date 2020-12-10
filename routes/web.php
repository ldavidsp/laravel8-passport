<?php

use App\Models\Projects;
use Illuminate\Support\Facades\Http;
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
		'description' => 'Empresa SaaS and Software Development'
	]);

	Projects::create([
		'name' => 'Fire Codes',
		'description' => 'Software Development'
	]);
	return view('welcome');
});

Route::get('/token', function () {
	$response = Http::asForm()->post('http://localhost:8000/oauth/token', [
		'grant_type' => 'client_credentials',
		'client_id' => 'client-id',
		'client_secret' => 'client-secret',
	]);

	return $response->json()['access_token'];
});
