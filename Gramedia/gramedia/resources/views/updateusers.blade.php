<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
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
        <h1 class="text-center mb-4">Update User</h1>
        <div class="card">
            <div class="card-body">
                <form action="/users/update/{{$user->user_id}}/put" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="role">User Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
                            <option value="member" {{ $user->role === 'member' ? 'selected' : '' }}>member</option>
                            <option value="guest" {{ $user->role === 'guest' ? 'selected' : '' }}>guest</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Update User</button>
                </form>
            </div>
        </div>
        <a href="{{ route('viewUsers') }}" class="btn btn-primary">Back to View User</a>
    </div>
</body>
</html>
