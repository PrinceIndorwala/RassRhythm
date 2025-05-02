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
    <h2 class="mb-5 text-center">Admin Dashboard - Overview</h2>

    <!-- Users Table -->
    <h4 class="mb-3">Users</h4>
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th><th>Email</th><th>Phone</th><th>DOB</th><th>Gender</th><th>Address</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->phone }}</td>
                        <td>{{ $user->dob }}</td><td>{{ $user->gender }}</td><td>{{ $user->address }}</td>
                        <td>
                        <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger text-decoration-underline" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Enrollments Table -->
    <h4 class="mb-3">Enrollments</h4>
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th><th>Email</th><th>Phone</th><th>Time Slot</th>
                    <th>Class Level</th><th>Course Fee</th><th>Days</th><th>Photo</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->name }}</td><td>{{ $enrollment->email }}</td><td>{{ $enrollment->phone }}</td>
                        <td>{{ $enrollment->time_slot }}</td><td>{{ $enrollment->class_level }}</td>
                        <td>{{ $enrollment->course_fee }}</td><td>{{ $enrollment->days }}</td>
                        <td><img src="{{ asset('storage/' . $enrollment->photo) }}" width="50"></td>
                        <td>
                <form action="{{ route('admin.enrollment.delete', $enrollment->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger text-decoration-underline" onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Contacts Table -->
    <h4 class="mb-3">Contacts</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td><td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td><td>{{ $contact->message }}</td>
                        <td>
                <form action="{{ route('admin.contact.delete', $contact->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger text-decoration-underline" onclick="return confirm('Are you sure?')">
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

</body>
</html>
