<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers\Api
 */
class AuthController extends Controller {

	/**
	 * AuthController constructor.
	 */
	public function __construct() {}

	/**
	 * Login Users.
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function login(Request $request): JsonResponse {
		if ($request->email && $request->password) {
			$credentials = [
				'email' => $request->login,
				'password' => $request->password,
			];

			if(Auth::attempt($credentials)){
				return response()->json([
					'status' => 200,
					'uid' => Auth::user()->id,
					'name' => Auth::user()->name,
					'email' => Auth::user()->email,
					'token' => Auth::user()->createToken('TokenApp')->accessToken,
					'message' => 'Has iniciado sesion.',
				]);
			}
		}

		return response()->json([
			'status' => 401,
			'message' => 'Unauthorized',
		]);
	}

	/**
	 * Registers Users.
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function register(Request $request): JsonResponse {
		$newUser = $request->all();
		$newUser['password'] = bcrypt($newUser['password']);

		$user = User::create($newUser);
		$token = $user->createToken('Token')->accessToken;
		return response()->json([
			'status' => 200,
			'uid' => $user->id,
			'name' => $user->name,
			'email' => $user->email,
			'token' => $token,
			'message' => 'User registered.',
		]);
	}
}
