@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @if (Auth::guest())
                        Not logged in. Please <a href="{{ url('/login') }}">login</a>.
                    @else
                        View <a href="{{ url('/home') }}">dashboard</a>
                    @endif
                    <h3>Weather Application</h3>
                    <h4>Setup</h4>
                    Create a new public project on GitHub for this programming exercise
                    If you don't already have PHP and Laravel set up your system, use Homestead to get a development environment up and running to save yourself some time.
                    https://laravel.com/docs/5.3/homestead
                    <h4>Assumptions</h4>
                    We expect about 4 hours coding time.  Due to the time limit you may not be able to fully implement all the features you want in detail.  If that is the case, please add code comments in the relevant locations describing how you would improve your code if you had the time.
                    <h4>Requirements</h4>
                    You are going to be developing a Laravel application which allows a user to create an account on the site or log in with an existing account.  A logged in user should be able to add multiple zip codes and have them stored in the database.  Weather information will be retrieved from an external API for each zip code and then stored in a database. A logged in user should be able to see a list of the zip codes they added as well as the current weather information.
                    <h5>Tasks</h5>
                        <ul>
                            <li>Allow a user to create a new account or log into an existing account</li>
                            <li>Store user account information securely in a database</li>
                            <li>Allow a logged in user to add one or more zip codes</li>
                            <li>Get weather information for each zip code using an external API</li>
                            <li>Display the user's stored zip codes along with current weather information</li>
                        </ul>
                    <h5>Bonus</h5>
                        <ul>
                            <li>Create a REST API endpoint to create a user account</li>
                            <li>Create a REST API endpoint to authenticate and log in a user</li>
                            <li>Use the REST API endpoints on the front-end instead of performing a form post</li>
                            <li>Write unit and/or functional tests to verify the application is working as expected</li>
                            <li>https://laravel.com/docs/5.3/application-testing</li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
