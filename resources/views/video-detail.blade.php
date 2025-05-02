<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Video</title>
    <link rel="stylesheet" href="{{ asset('admin-custom/vendor/bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #1e1e2f;
            color: #f1f1f1;
            font-family: 'Muli', sans-serif;
            padding: 30px;
        }
        .video-container {
            text-align: center;
            margin-top: 50px;
        }
        video {
            width: 80%;
            max-width: 800px;
            height: 500px;
            border-radius: 12px;
        }
    </style>
</head>
<body>

    <h2 class="text-center">Video Preview</h2>
    <div class="video-container">
        <video controls autoplay>
        <source src="{{ asset($video->video_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <p class="mt-4"><strong>Category:</strong> {{ $video->category }}</p>
        <p><strong>Description:</strong> {{ $video->description }}</p>
        <p class="text-muted">Uploaded on: {{ \Carbon\Carbon::parse($video->uploadDate)->format('F j, Y') }}</p>
    </div>

</body>
</html>
