<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Book</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        .btn-add {
            text-align: center;
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Update Book</h1>
        <div class="card">
            <div class="card-body">
                <form action="/books/update/{{$book->book_id}}/put" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required>{{ $book->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $book->price }}" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="educational" {{ $book->category === 'educational' ? 'selected' : '' }}>Educational</option>
                            <option value="fiction" {{ $book->category === 'fiction' ? 'selected' : '' }}>Fiction</option>
                            <option value="nonfiction" {{ $book->category === 'nonfiction' ? 'selected' : '' }}>Non-Fiction</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Book</button>
                </form>
            </div>
        </div>
        <a href="{{ route('viewBooks') }}" class="btn btn-primary">Back to View Books</a>
    </div>
</body>
</html>
