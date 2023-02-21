<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shorten Link</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <h2>Laravel - Create URL Shortener</h2>
        
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <form method="post" action="{{ route('generate.shorten.link.post') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="link" class="form-control" placeholder="Enter URL">
                        
                        <div class="input-group-addon">
                            <button class="btn btn-success">Generate Shorten Link</button>
                        </div>
                                                
                    </div>
                    @error('link') <p class="m-0 p-0 text text-danger">{{ $message }}</p> @enderror

                </form>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shortLinks as $row )
                    
                <tr>
                    <td>{{ $row->id }}</td>
                    <td><a href="{{ route('shorten.link',$row->code) }}" target="_blank">{{ route('shorten.link',$row->code) }}</a> </td>
                    <td>{{ $row->link }}</td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>     --}}
</body>
</html>