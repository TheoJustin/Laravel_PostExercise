<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            max-width: 400px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .card {
            border: none;
        }
        .card-body {
            text-align: center;
        }
        .card-body h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .btn-primary, .btn-success, .btn-warning, .btn-danger {
            width: 100%;
            margin-bottom: 10px;
            font-weight: bold;
            color: white;
        }
        .btn-warning:hover{
            color: white;
        }
        .section-heading {
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Gramedia by LC104</h1>
                <div class="section-heading">Books</div>
                <div>
                    <a href="{{route('viewBooks')}}" class="btn btn-primary">View Books</a>
                </div>
                <div class="section-heading">Alat Tulis</div>
                <div>
                    <a href="{{route('viewAlats')}}" class="btn btn-primary">View Alat Tulis</a>
                </div>
                <div class="section-heading">Users</div>
                <div>
                    <a href="{{route('viewUsers')}}" class="btn btn-primary">View Users</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
