<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ZipCode;

//use GuzzleHttp\Client as GuzzleHttpClient;

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
        //// TODO: Bind/Associate the nested Weather model to each Zip Code model using Eloquent relationships
        //// TODO: Iterate through an array of zip code models calling the refreshWeatherData for each
        //// TODO: Can probably use Eloquent relationships or a traditional lookup by ID
        //foreach ($aryZipCodes as $id) {
        //	// Get a handle to the ZipCode Model by $id
        //	$this->refreshWeatherData($userZipCode);
        //}

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

        //// Need to setup direct injection and then Bind/Associate
        //$userZipCode->weather()->associate($weather);

        //TODO: Need to finish the function
        //$this->refreshWeatherData($this->userZipCode);

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

    ///**
    // * Contacts remote API of Weather Underground, fetches current weather info for the given zip code, and then stores
    // * the data into the database.
    // *
    // * @param   UserZipCode $userZipCode
    // *
    // * @returns {boolean} - Success or Failure
    // */
    //private function refreshWeatherData (UserZipCode $userZipCode)
    //{
    //	// TODO: Sanity check the arguments
    //	// TODO: Drive this key through the .env file
    //	$weatherUndergroundApiKey = "44efb4ddf448bcd6";
    //
    //	$httpClient = new GuzzleHttpClient();
    //
    //	// Get the zip code value from the $userZipCode['zip_code']
    //	// $zipCode =
    //
    //	$weatherUndergroundApiUrl = "http://api.wunderground.com/api/{$weatherUndergroundApiKey}/conditions/q/{$zipCode}.json";
    //	// TODO: Should wrap in a try catch to handle exceptions
    //	// TODO: Consider setting up promises to fetch weather data for multiple zip codes concurrently.
    //	$weatherUndergroundResponse = $httpClient->get($weatherUndergroundApiUrl);
    //	// TODO: Sanity check the response
    //	$responseBody = $weatherUndergroundResponse->getBody();
    //
    //	// 4. Invoke the update() method on the weather model instance
    //	$this->userZipCode->weather()->update([
    //		'temperature_string' => $responseBody->temperature_string,
    //		'weather'            => $responseBody->weather,
    //		'relative_humidity'  => $responseBody->relative_humidity,
    //		'wind_string'        => $responseBody->wind_string,
    //		'feelslike_string'   => $responseBody->feelslike_string,
    //		'pressure_in'        => $responseBody->pressure_in,
    //		'visibility_mi'      => $responseBody->visibility_mi,
    //	]);
    //
    //	// Return a boolean representing whether the operation was successful or error
    //}
}
