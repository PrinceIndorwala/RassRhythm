<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garba Class Enrollment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            width: 60%;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            border-radius: 10px;
            overflow: hidden;
        }
        .welcome-section {
            width: 40%;
            background-color: #e78be7;
            padding: 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .welcome-section h1 {
            font-size: 2rem;
            font-weight: bold;
        }
        .enroll-section {
            width: 60%;
            padding: 50px;
        }
        .enroll-section h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-enroll {
            width: 100%;
            background-color: #007bff;
            color: white;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="welcome-section">
        <h1>Join the Garba Class!</h1>
        <p>Enhance your Garba skills with professional training.</p>
    </div>

    <div class="enroll-section">
        <h2>Enroll Now</h2>
        
        <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" readonly>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
            
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" class="form-control" value="{{ Auth::user()->phone }}" readonly>
            
            <label>Class Level</label>
            <input type="text" id="class_level" name="class_level" class="form-control" readonly>
            
            <label>Course Fee</label>
            <input type="text" id="course_fee_display" class="form-control" readonly>
            <input type="hidden" id="course_fee" name="course_fee">
            
            <label for="time_slot">Preferred Time Slot (2 hours)</label>
            <select id="time_slot" name="time_slot" class="form-control" required>
                <option value="6AM - 8AM">6AM - 8AM</option>
                <option value="8AM - 10AM">8AM - 10AM</option>
                <option value="5PM - 7PM">5PM - 7PM</option>
                <option value="7PM - 9PM">7PM - 9PM</option>
            </select>
            
            <label>Select Days</label>
            <div id="day_selection">
                <small>Select the allowed number of days based on your class level.</small>
                <div class="form-check">
                    <input class="form-check-input day-checkbox" type="checkbox" name="days[]" value="Monday"> Monday
                </div>
                <div class="form-check">
                    <input class="form-check-input day-checkbox" type="checkbox" name="days[]" value="Tuesday"> Tuesday
                </div>
                <div class="form-check">
                    <input class="form-check-input day-checkbox" type="checkbox" name="days[]" value="Wednesday"> Wednesday
                </div>
                <div class="form-check">
                    <input class="form-check-input day-checkbox" type="checkbox" name="days[]" value="Thursday"> Thursday
                </div>
                <div class="form-check">
                    <input class="form-check-input day-checkbox" type="checkbox" name="days[]" value="Friday"> Friday
                </div>
                <div class="form-check">
                    <input class="form-check-input day-checkbox" type="checkbox" name="days[]" value="Saturday"> Saturday
                </div>
            </div>
            
            <label for="photo">Upload Your Photo</label>
            <input type="file" id="photo" name="photo" class="form-control" accept="image/png, image/jpeg, image/jpg" required>
        
            <button type="submit" class="btn btn-enroll btn-block">Pay & Enroll</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-3">{{ session('error') }}</div>
        @endif
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let maxDays = { 'Beginner': 2, 'Intermediate': 3, 'Professional': 4 };

        let selectedLevel = localStorage.getItem("selectedLevel");
        let selectedFee = localStorage.getItem("selectedFee");

        if (selectedLevel && selectedFee) {
            document.getElementById("class_level").value = selectedLevel;
            document.getElementById("course_fee_display").value = "₹" + selectedFee;
            document.getElementById("course_fee").value = selectedFee;
        }

        let checkboxes = document.querySelectorAll(".day-checkbox");

        checkboxes.forEach(box => {
            box.addEventListener("change", function() {
                let checkedCount = document.querySelectorAll(".day-checkbox:checked").length;
                if (checkedCount > maxDays[selectedLevel]) {
                    this.checked = false;
                    alert(`You can select up to ${maxDays[selectedLevel]} days only.`);
                }
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
