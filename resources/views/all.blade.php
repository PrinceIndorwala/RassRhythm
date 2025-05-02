<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Feedback</title>
    <link rel="stylesheet" href="{{ asset('admin-custom/vendor/bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #1e1e2f;
            color: #f1f1f1;
            font-family: 'Muli', sans-serif;
            padding: 30px;
        }
        .feedback-container {
            max-width: 700px;
            margin: 0 auto;
            margin-top: 40px;
        }
        .feedback-card {
            background-color: #2c2c3e;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }
        .feedback-initial {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #4e4e6a;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #fff;
            margin-right: 15px;
        }
        .feedback-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .text-warning {
            font-size: 18px;
        }
    </style>
</head>
<body>

    <h2 class="text-center">Student Feedback</h2>

    <div class="feedback-container">
        @forelse ($feedbacks as $feedback)
            <div class="feedback-card">
                <div class="feedback-header">
                    <div class="feedback-initial">{{ strtoupper(substr($feedback->name, 0, 1)) }}</div>
                    <div>
                        <h5 class="mb-0 text-light">{{ $feedback->name }}</h5>
                        <small class="text-muted">{{ $feedback->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                <p class="mb-2">{{ $feedback->message }}</p>
                <div class="text-warning">
                    @for ($i = 0; $i < $feedback->rating; $i++)
                        ★
                    @endfor
                </div>
            </div>
        @empty
            <p class="text-center">No feedbacks yet.</p>
        @endforelse
    </div>

</body>
</html>
