<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Resources\UserCollection;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
    public function register(Request $request)
    {
        $this->authorize('create', User::class);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user','token'),201);
    }
    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(new UserResource($user));
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                "status" => "success",
                "message" => "User successfully logged out."
            ], 200);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(["message" => "No se pudo cerrar la sesi??n."], 500);
        }
    }

    public function index()
    {
        $this->authorize('viewAny', User::class);
        return new UserCollection(User::paginate(10));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user->update([
            'password' => Hash::make($request->get('password')),
        ]);
        return response()->json($user, 200);
    }

}
