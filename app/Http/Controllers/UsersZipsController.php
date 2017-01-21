<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ZipCode;

class UsersZipsController extends Controller
{
    /**
     * @var ZipCode - An instance of the Zip Code model
     */
    protected $zipCode;

    /**
     * @var User - An instance of the User model
     */
    protected $user;

    /**
     * UsersZipsController constructor.
     *
     * @param ZipCode $zipCode
     */
    public function __construct (User $user, ZipCode $zipCode)
    {
        $this->user = $user;
        $this->zipCode = $zipCode;
    }

    /**
     * Display a listing of all the zip codes for a specified user with current weather
     *
     * @param  User $user - The user model
     *
     * @return \Illuminate\Http\Response
     */
    public function index (User $user)
    {
        return $user->zipCodes;
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
     * Store a newly created zip code for a specified user in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User                     $user    - The user model
     * @param  ZipCode                  $zipCode - The zip code model
     *
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request, User $user, ZipCode $zipCode)
    {
        $zipCode->zip_code = $request->input('zipCode');

        $user->zipCodes()->save($zipCode);

        return response($zipCode, 201);
    }

    /**
     * Display the specified zip code for the specified user and weather for the zip code
     *
     * @param  User $user - The user model
     * @param  int  $id   - The primary key of the User Zip Code Model
     *
     * @return \Illuminate\Http\Response
     */
    public function show (User $user, $id)
    {
        $userZipCode = $this->zipCode->find($id);

        // TODO: Verify the Zip Code model belongs to the User by invoking a method in the User model that checks
        $userZipCode->user()->associate($user);

        return $userZipCode;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User    $user    - The user model
     * @param  ZipCode $zipCode - The zip code model
     *
     * @return \Illuminate\Http\Response
     */
    public function edit (User $user, ZipCode $zipCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User                     $user - The user model
     * @param  int                      $id   - The primary key of the User Zip Code Model
     *
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, User $user, $id)
    {
        $userZipCode = $this->zipCode->find($id);

        // TODO: Invoke a method in the User model that verifies the userZipCode model belongs to the User
        $userZipCode->user()->associate($user);

        $userZipCode->zip_code = $request->input('zipCode');

        $userZipCode->save();

        return response($userZipCode, 201);
    }

    /**
     * Remove the specified zip code from storage.
     *
     * @param  User $user - The user model
     * @param  int  $id   - The primary key of the User Zip Code Model
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy (User $user, $id)
    {
        $userZipCode = $this->zipCode->find($id);

        // TODO: Invoke a method in the User model that verifies the userZipCode model belongs to the User
        //$userZipCode->user()->associate($user);

        $userZipCode->delete();

        return response('Deleted.', 200);
    }
}
