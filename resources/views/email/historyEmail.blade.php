<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <style>
        .styled-table{
            border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left; 
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }   

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
    </style>
</head>
<body>
    <h3> Here is the history from {{$start}} to {{$end}} </h3>
    <table class="styled-table">
        <tr>
            <th>Requested at</th>
            <th>Home To School Bus</th>
            <th>School To Home Bus</th>
        </tr>

        @forEach($data as $entry)
        <tr>
            <td>{{$entry["date"]}}</td>
            <td>{{$entry["home_to_school_time"]}}</td>
            <td>{{$entry["school_to_home_time"]}}</td>
        </tr>
        @endForEach
    </table> 
</body>
</html>