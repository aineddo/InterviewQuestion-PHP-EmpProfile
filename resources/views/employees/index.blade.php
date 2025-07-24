<!DOCTYPE html>
<html>
<head>
    <title>All Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>All Employees</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(count($employees) === 0)
            <p>No employees found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Marital Status</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Nationality</th>
                        <th>Hire Date</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee['name'] }}</td>
                            <td>{{ $employee['gender'] }}</td>
                            <td>{{ $employee['marital_status'] }}</td>
                            <td>{{ $employee['phone'] }}</td>
                            <td>{{ $employee['email'] }}</td>
                            <td>{{ $employee['address'] }}</td>
                            <td>{{ $employee['dob'] }}</td>
                            <td>{{ $employee['nationality'] }}</td>
                            <td>{{ $employee['hire_date'] }}</td>
                            <td>{{ $employee['department'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('employees.create') }}" class="btn btn-primary">Add New Employee</a>
    </div>
</body>
</html>
