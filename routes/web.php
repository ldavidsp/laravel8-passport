<?php

use App\Models\Projects;
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
  /*Projects::create([
    'name' => 'Homeflow Technologies',
    'description' => 'Empresa SaaS and Software Development',
  ]);

  Projects::create([
    'name' => 'Fire Codes',
    'description' => 'Software Development',
  ]);*/
  return view('welcome');
});

Route::get('/pusher', function () {
  return view('welcome2');
});

Route::get('/token-app', function (Request $request) {
	$httpHost = $request->getSchemeAndHttpHost();
	$client = new GuzzleHttp\Client;

	$response = $client->post($httpHost.'/oauth/token', [
		'form_params' => [
			'grant_type' => 'client_credentials',
			'client_id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
			'client_secret' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'),
		],
	]);

	if ($response->getStatusCode() == 200) {
		return $response->json();
	}
	return response()->json(['status' => $response->getStatusCode()]);
});
