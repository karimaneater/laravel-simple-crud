<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">


        <div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
             @endif
            <div class="d-flex justify-content-between">
                <h1>Users</h1>
                <a href="{{url('/user/input')}}" class="btn btn-primary ">Input User</a>
            </div>
            <table class="table ">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Created</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <th>{{ $user->name }}</th>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('user.view' ,['user_id' => $user->id]) }}" class="btn btn-sm btn-warning"><i class="bi bi-eye" style="color: white"></i></a>
                                <a href="{{ route('edit.user' ,['user_id' => $user->id]) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <!-- Button trigger modal -->
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" ><i class="bi bi-trash"></i></button>


                            </td>
                        </tr>

                        @php
                        $key++;
                        @endphp

                         <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('delete.user', ['user_id' => $user->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                    Are you sure you want to delete this?
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>

                    @endforeach
                </tbody>
              </table>
        </div>


    </div>





</body>
</html>

