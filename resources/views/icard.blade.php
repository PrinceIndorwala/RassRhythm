<!DOCTYPE html>
<html>
<head>
    <title>Student iCard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 40px 0;
        }

        .icard {
            width: 420px;
            margin: 0 auto;
            padding: 25px;
            background: #ffffff;
            border-radius: 15px;
            border: 1px solid #ccc;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .icard-header {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: #fff;
            padding: 15px 0;
            border-radius: 10px 10px 0 0;
            margin: -25px -25px 20px -25px;
        }

        .icard-header h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .icard img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            border: 3px solid #4e54c8;
            margin-bottom: 15px;
        }

        .info {
            text-align: left;
            padding: 0 10px;
        }

        .info p {
            margin: 8px 0;
            font-size: 15px;
        }

        .info strong {
            color: #333;
            display: inline-block;
            width: 110px;
        }

        .download-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background: #4e54c8;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .download-button:hover {
            background: #3a3fb3;
        }
    </style>
</head>
<body>
    <div class="icard">
        <div class="icard-header">
            <h2><span style="background-color: black; color: white; padding: 0 5px;">Rass</span>
            <span style="background-color: black; color: yellow; padding: 0 5px;">Rhythm</span></h2>
        </div>

        @php
        $imagePath = storage_path('app/public/' . $enrollment->photo);
        $imageData = base64_encode(file_get_contents($imagePath));
        $src = 'data:' . mime_content_type($imagePath) . ';base64,' . $imageData;
        @endphp

        <img src="{{ $src }}" alt="Student Photo">

        <div class="info">
            <p><strong>Name:</strong> {{ $enrollment->name }}</p>
            <p><strong>Email:</strong> {{ $enrollment->email }}</p>
            <p><strong>Phone:</strong> {{ $enrollment->phone }}</p>
            <p><strong>Time Slot:</strong> {{ $enrollment->time_slot }}</p>
            <p><strong>Class Level:</strong> {{ $enrollment->class_level }}</p>
            <p><strong>Days:</strong> {{ $enrollment->days }}</p>
        </div>

        <a href="{{ route('icard.download') }}" id="downloadBtn" class="download-button">
            Download iCard as PDF
        </a>
        <script>
                document.getElementById('downloadBtn').addEventListener('click', function(e) {

        // Redirect after short delay
        setTimeout(function() {
            window.location.href = "{{ url('/') }}"; // your homepage route
        }, 3000); // 1 seconds delay
    });
        </script>
    </div>
</body>
</html>
