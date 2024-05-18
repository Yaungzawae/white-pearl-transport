<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Location</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        button,a, h1{
            display: block;
            text-align: center;
            margin: 10px 0;
            scale: 1.2
        }

        body{
            height: 80vh;
            display: grid;
            place-content: center;
        }
    </style>
</head>
<body>
    <h1 id="status"></h1>
    <button id="button" onclick="onButton()">Turn On Tracking</button>
    <button id="button" onclick="offButton()">Turn Off Tracking</button>
    <a href="/driver/check-in"> Check In Kids </a>
    <a href="/driver/check-out"> Check Out Kids </a>

<script>
let isOff = false;
var latitude; var longitude;
var time_interval;
var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 1000
};

function autoRefresh(){
    window.location = window.location.href
}

onButton()

function sendUpdateRequest(data){
    $.ajax({
        type: 'POST',
        url: '/update-bus-location',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Handle success response if needed
            console.log('Update request sent successfully');
        },
        error: function(xhr, status, error) {
            // Handle error response if needed
            console.error('Error sending update request:', error);
        },
        data: data
    });
}

navigator.geolocation.getCurrentPosition(position => {
    var {latitude, longitude} = position.coords;
    $.ajax({
            type: 'POST',
            url: '/update-bus-location',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Update request sent successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error sending update request:', error);
            },
            data: {latitude: latitude, longitude: longitude}
        });
    },()=>{},options);

function onButton(){
    time_interval = setInterval(autoRefresh, 10000);
    document.querySelector("#status").innerText = 'TRACKING'
    document.querySelector("#status").style.color = "green"

}

function offButton(){
    clearInterval(time_interval);
    time_interval = null;
    document.querySelector("#status").innerText = 'STOPPED'
    document.querySelector("#status").style.color = "red"
    sendUpdateRequest({latitude:"", longitude: ""});
}


</script>
</body>
</html>

