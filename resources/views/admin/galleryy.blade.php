<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Gallery Image</title>
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
    <h2 class="mb-4 text-center" style="color: #ffc107;">📷 Upload Gallery Image</h2>

    <form action="{{ route('admin.galleryy.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Image Upload -->
        <div class="mb-4">
            <label for="photo" class="form-label">🖼 Select Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
        </div>

        <!-- Category Selection -->
        <div class="mb-4">
            <label for="category" class="form-label">📁 Select Category</label>
            <select class="form-control" id="category" name="category" required>
                <option value="">-- Select Category --</option>
                <option value="Event">Event</option>
                <option value="Class">Class</option>
                <option value="Performance">Performance</option>
                <option value="Competition">Competition</option>
            </select>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="form-label">📝 Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Write something about this photo..." required></textarea>
        </div>

        <!-- Auto Date (set via JS) -->
        <input type="hidden" id="uploadDate" name="uploadDate">

        <!-- Submit Button -->
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
