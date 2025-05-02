<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Overview</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin-custom/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin-custom/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS -->
    <link rel="stylesheet" href="{{ asset('admin-custom/css/font.css') }}">
    <!-- Google fonts - Muli -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- Theme stylesheet -->
    <link rel="stylesheet" href="{{ asset('admin-custom/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes -->
    <link rel="stylesheet" href="{{ asset('css/style-custom.css') }}">

    <style>
        body {
            background-color: #1e1e2f;
            color: #f1f1f1;
            font-family: 'Muli', sans-serif;
        }
        h2, h4 {
            color: #ffc107;
        }
        .table {
            background-color: #2c2c3e;
            color: #f1f1f1;
        }
        .table thead {
            background-color: #343a40;
        }
        .table th, .table td {
            border-color: #444;
        }
        .table img {
            border-radius: 6px;
        }
        .container {
            padding-top: 40px;
            padding-bottom: 60px;
        }
        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #2b2f3a;
        }
        .table-hover tbody tr:hover {
            background-color: #3a3f51;
        }
    </style>
</head>
<body>
    

<div class="container">
    <h2 class="mb-5 text-center">Manage Media</h2>

    <!-- Galleries Table -->
    <div class="row">
    <!-- Galleries Table -->
    <div class="col-md-6">
        <h4 class="mb-3">Gallery Images</h4>
        <div class="table-responsive mb-5">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $gallery)
                        <tr>
                            <td>
                                <img src="{{ asset($gallery->photo_path) }}" width="60" height="60" style="object-fit: cover;">
                            </td>
                            <td>{{ $gallery->category }}</td>
                            <td>{{ $gallery->description }}</td>
                            <td>
                                <form action="{{ route('admin.gallery.delete', $gallery->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger text-decoration-underline" onclick="return confirm('Are you sure you want to delete this image?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Videos Table -->
    <div class="col-md-6">
        <h4 class="mb-3">Gallery Videos</h4>
        <div class="table-responsive mb-5">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Video</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($videos as $video)
<tr>
    <td>
        <a href="{{ route('admin.video.show', $video->id) }}" target="_blank">
            <video width="120" height="70" style="object-fit: cover; background-color: black;" muted autoplay loop>
                <source src="{{ asset(str_replace('D:\sem 2\project\RassRhythm1\RassRhythm1\public\\', '', $video->video_path)) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </a>
    </td>
    <td>{{ $video->category }}</td>
    <td>{{ $video->description }}</td>
    <td>
        <form action="{{ route('admin.video.delete', $video->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger text-decoration-underline" onclick="return confirm('Are you sure you want to delete this video?')">
                Delete
            </button>
        </form>
    </td>
</tr>
@endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

</body>
</html>
