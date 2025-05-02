<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Gallery Video</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1e1e2f;
            color: #f1f1f1;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container {
            max-width: 650px;
            margin: 50px auto;
            background-color: #2c2c3e;
            padding: 40px;
            border-radius: 12px;
        }
        .form-label {
            color: #f1f1f1;
        }
        .btn-warning {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container form-container">
    <h2 class="mb-4 text-center" style="color: #ffc107;">🎥 Upload Gallery Video</h2>


    <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="successMsg">
        🎉 Video uploaded successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    
    <form action="{{route('admin.video.store')}}" method="POST" enctype="multipart/form-data">
     @csrf
        <div class="mb-4">
            <label for="video" class="form-label">🎞 Upload Your Video</label>
            <input type="file" class="form-control" id="video" name="video" accept="video/mp4, video/mkv, video/avi, video/webm" required>
        </div>

        <div class="mb-4">
            <label for="category" class="form-label">📁 Select Category</label>
            <select class="form-control" id="category" name="category" required>
                <option value="">-- Select Category --</option>
                <option value="Event">Event</option>
                <option value="Class">Class</option>
                <option value="Competition">Competition</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">📝 Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Write something about this video..." required></textarea>
        </div>

        <input type="hidden" id="uploadDate" name="uploadDate">

        <div class="text-center">
            <button type="submit" class="btn btn-warning">🚀 Upload</button>
        </div>
    </form>
</div>

<script>
   
    const today = new Date();
    const formattedDate = today.toLocaleString('default', { month: 'long' }) + ' ' + today.getFullYear();
    document.getElementById("uploadDate").value = formattedDate;
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
