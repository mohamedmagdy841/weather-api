<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .bg-color-dark {
            background-color: #343a40;
            color: white;
        }
        .bg-color-light {
            background-color: #f8f9fa;
            color: black;
        }
        .theme-toggle {
            cursor: pointer;
            font-size: 1.5rem;
        }
    </style>
</head>
<body class="bg-color-light"> <!-- Default to light theme -->
<div class="container mt-5">
    <div class="row justify-content-between mb-4">
        <div class="col">
            <h2 class="text-center">Get Weather Information</h2>
        </div>
        <div class="col-auto">
            <i class="theme-toggle fas fa-sun" id="themeToggle"></i> <!-- Sun icon for light theme -->
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form action="{{ route('weather.result') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Cairo" required>
                </div>
                <div class="text-center"> <!-- Center the submit button -->
                    <button type="submit" class="btn btn-primary">Get Weather</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // JavaScript to toggle between dark and light themes
    const themeToggle = document.getElementById('themeToggle');
    const body = document.body;

    themeToggle.addEventListener('click', function() {
        if (body.classList.contains('bg-color-light')) {
            body.classList.remove('bg-color-light');
            body.classList.add('bg-color-dark');
            themeToggle.classList.remove('fa-sun');
            themeToggle.classList.add('fa-moon'); // Change to moon icon for dark theme
        } else {
            body.classList.remove('bg-color-dark');
            body.classList.add('bg-color-light');
            themeToggle.classList.remove('fa-moon');
            themeToggle.classList.add('fa-sun'); // Change to sun icon for light theme
        }
    });
</script>
</body>
</html>



