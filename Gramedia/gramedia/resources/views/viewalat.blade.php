<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alat Tulis List</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .card-text {
            margin-bottom: 5px;
        }
        .image-container {
            margin-top: 20px;
        }
        .book-image {
            max-width: 200px;
            height: auto;
        }
        .btn-add{
            text-align: center;
            margin: 20px;
        }
        .btn-primary{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        @foreach ($alats as $alat)
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{$alat->name}}</h2>
                    <div class="image-container">
                        <img src="{{$alat->url}}" alt="{{$alat->name}}" class="book-image">
                    </div>
                    <p class="card-text"><strong>Description:</strong> {{$alat->description}}</p>
                    <p class="card-text"><strong>Price:</strong> ${{$alat->price}}</p>
                </div>
            </div>
        @endforeach

        {{ $alats->links('pagination::bootstrap-4') }}

        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
    </div>
</body>
</html>
