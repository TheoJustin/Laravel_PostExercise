<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users List</title>
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
        @foreach ($users as $user)
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{$user->name}}</h2>
                    <p class="card-text"><strong>Email:</strong> {{$user->email}}</p>
                    <p class="card-text"><strong>Phone Number:</strong> {{$user->phone_number}}</p>
                    <p class="card-text"><strong>Books Owned:</strong> {{$user->books_owned}}</p>
                    <p class="card-text"><strong>Role:</strong> {{$user->role}}</p>
                    <div class="btn-group">
                        <a href="/users/update/{{$user->user_id}}" class="btn btn-warning">Promote</a>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- {{ $user->links('pagination::bootstrap-4') }} --}}

        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
    </div>
</body>
</html>
