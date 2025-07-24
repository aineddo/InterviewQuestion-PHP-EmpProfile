
<!DOCTYPE html>
<html>
<head>
    <title>New Employee Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error-message { color: red; margin-bottom: 15px; }
        .date-format-hint { font-size: 0.8rem; color: #666; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">New Employee Registration</h1>
        @if(session('success'))
    <div class="alert alert-success d-flex justify-content-between align-items-center">
        <div>
            {{ session('success') }}
        </div>
        <div class="ms-auto">
            <a href="{{ route('employees.create') }}" class="btn btn-sm btn-success me-2">Add Another</a>
            <a href="{{ route('employees.index') }}" class="btn btn-sm btn-primary">View All</a>
        </div>
    </div>
@endif

        {{-- Server-side errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('employees.store') }}" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Employee Name *</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                <div class="invalid-feedback">Please provide a name.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender *</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="marital_status" class="form-label">Marital Status *</label>
                <select class="form-select" id="marital_status" name="marital_status" required>
                    <option value="" disabled selected>Select status</option>
                    <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single</option>
                    <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                    <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                    <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number *</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address *</label>
                <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth *</label>
                <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob') }}" required>
            </div>

            <div class="mb-3">
                <label for="nationality" class="form-label">Nationality *</label>
                <input type="text" class="form-control" id="nationality" name="nationality" value="{{ old('nationality') }}" required>
            </div>

            <div class="mb-3">
                <label for="hire_date" class="form-label">Hire Date *</label>
                <input type="date" class="form-control" id="hire_date" name="hire_date" value="{{ old('hire_date') }}" required>
            </div>

            <div class="mb-3">
                <label for="department" class="form-label">Department *</label>
                <input type="text" class="form-control" id="department" name="department" value="{{ old('department') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit Registration</button>
        </form>
    </div>

    <script>
        (() => {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
