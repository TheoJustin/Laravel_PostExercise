<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books List</title>
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
        <h1 class="text-center mb-4">Books List</h1>
        <div class="btn-add">
            <a href="{{route('addBooks')}}" class="btn btn-success">Add Books</a>
        </div>

        <form action="{{route('searchBooks')}}" method="GET">
            @csrf
            <div class="form-group">
                <label for="category">Search by title :</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <input type="submit" href="" class="btn btn-primary" value="Filter">
        </form>

        @foreach ($books as $book)
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{$book->title}}</h2>
                    <div class="image-container">
                        <img src="{{$book->url}}" alt="{{$book->title}}" class="book-image">
                    </div>
                    <p class="card-text"><strong>Description:</strong> {{$book->description}}</p>
                    <p class="card-text"><strong>Price:</strong> ${{$book->price}}</p>
                    <p class="card-text"><strong>Category:</strong> {{$book->category}}</p>
                    <div class="btn-group">
                        <a href="/books/update/{{$book->book_id}}" class="btn btn-warning">Update</a>
                        <form action="/books/delete/{{$book->book_id}}" method="POST">
                            @method('delete')
                            @csrf
                            <input type="submit" href="" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $books->links('pagination::bootstrap-4') }}

        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
    </div>
</body>
</html>
