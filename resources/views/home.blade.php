@extends('layouts.app')

@section('head')

    <script>
        @if($userId)
        var g_UserId = {{ $userId }};
        @endif
    </script>

@endsection

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>

                <div class="panel-body">
                    Zip Code 1
                </div>

                <div class="panel-body">
                    Zip Code 2
                </div>

                <div class="panel-body">
                    Zip Code 3
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

    <script>
//        // 1. Do ajax call to API
//        // 2. Receive the response
//        // 3. Parse the response to find the Zip Code
//        // 4. Dynamically add table
//        //
//        /*[{"id":10,"user_id":2,"zip_code":92581,"created_at":"2017-01-21 02:08:46","updated_at":"2017-01-21 02:08:46"},{"id":11,"user_id":2,"zip_code":92581,"created_at":"2017-01-21 02:51:22","updated_at":"2017-01-21 02:51:22"},{"id":12,"user_id":2,"zip_code":92581,"created_at":"2017-01-21 02:52:23","updated_at":"2017-01-21 02:52:23"}]*/
//
//        var lf_response = function (p_response)
//        {
//            var l_aryResponse = p_response;
//            //loop through the array of objects
//            for (var l_dx = 0; l_dx < l_aryResponse.length; l_dx++) {
//                var tableRow = $.create("tr");//create a new row for the table.
//                //loops through the object keys
//                for (var key in l_aryResponse[l_dx]) {
//                    //create a new cell for the row and then append it.
//                    var tableCell;
//                    if (!l_aryResponse[l_dx].hasOwnProperty(key)) {
//                        continue;
//                    }
//                    tableCell = $.create("td");
//                    tableCell.text(l_aryResponse[l_dx][key]);
//                    tableRow.append(tableCell);
//                }
//                $('.myTable').append(tableRow);
//
//            }
//        };
//
//        $.ajax({
//            url:     "/api/users/" + g_UserId + "/zips",
//            context: document.body
//        }
//        ).done(lf_response);
    </script>

@endsection
