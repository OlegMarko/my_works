<!DOCTYPE html>
<html lang="en">
    <head>
        <meta rel="csrf-token" content="{{ csrf_token() }}" />
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 200;
                height: 200vh;
                margin: 0;
            }
        </style>
    </head>
    <body>
        
        <div class="container">
            <h2>Register Form</h2>
            
            <div class="row col-lg-5">
                <h2>Get Request</h2>
                <button id="getRequest" type="button" class="btn btn-warning">getRequest</button>
            </div>
            
            <div class="row col-lg-5">
                <h2>Reqister Form</h2>
                <form id="register" action="#">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    
                    <label for="firstname">Name</label>
                    <input type="text" id="firstname" class="form-control" />
                    
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" class="form-control" />
                    
                    <input type="submit" value="Register" class="btn btn-primary" />
                </form>
            </div>
        </div>
        
        <div id="getRequestData"></div>
        
        <div id="postRequestData"></div>
        
        
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });
        
            $(document).ready( function() {
                $('#getRequest').click( function() {
//                    $.get('getRequest', function( data ) {
//                        $('#getRequestData').append(data);
//                        console.log(data);
//                    });
                    
                    $.ajax({
                        type: "GET",
                        url: 'getRequest',
                        success: function(data) {
                            console.log(data);
                            $('#getRequestData').append(data);
                        }
                    });
                });
                
                
                $('#register').submit( function() {
                    var fname = $('#firstname').val();
                    var lname = $('#lastname').val();
                    
//                    $.post('register', { firstname:fname, lastname:lname }, function(data) {
//                        $('#postRequestData').html(data);
//                        console.log(data);
//                    });
                    
                    var dataString = "firstname="+fname+"&lastname="+lname;
                    
                    $.ajax({
                        type: "POST",
                        url: "register",
                        data: dataString,
                        success: function(data) {
                            $('#postRequestData').html(data);
                            console.log(data);
                        }
                    });
                });
                
            });
        
        </script>
    </body>
</html>
