<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of all the users.
     *
     * @param  User $user - The user model
     *
     * @return \Illuminate\Http\Response
     */
    public function index (User $user)
    {
        return $user->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        //
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User                     $user - The user model
     *
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        return response($user, 201);
    }

    /**
     * Display the specified user.
     *
     * @param  User $user - The user model
     *
     * @return \Illuminate\Http\Response
     */
    public function show (User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  User $user - The user model
     *
     * @return \Illuminate\Http\Response
     */
    public function edit (User $user)
    {
        //
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User                     $user - The user model
     *
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        // TODO: Consider using update method so that one can optionally a update field without updating all fields.
        // Will need to prepare an array to pass with crypting the password
        $user->save();

        return response($user, 201);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  User $user - The user model
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy (User $user)
    {
        $user->delete();

        return response('Deleted.', 200);
    }
}
