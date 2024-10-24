<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #e9ecef;
            color: #343a40;
        }
        .bg-color-dark {
            background-color: #343a40;
            color: white;
        }
        .bg-color-light {
            background-color: #e9ecef;
            color: #343a40;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .card-dark {
            background-color: #495057; /* Dark background for card */
            color: white; /* White text for dark card */
        }
        .btn-success {
            background-color: #28a745;
            border: none;
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
            <h2 class="text-center">Weather Result for {{ $city }}</h2>
        </div>
        <div class="col-auto">
            <i class="theme-toggle fas fa-sun" id="themeToggle"></i> <!-- Sun icon for light theme -->
        </div>
    </div>

    @if($weatherData)
        <div class="card mt-3 {{ session('theme') === 'dark' ? 'card-dark' : '' }}">
            <div class="card-body">
                <h5 class="card-title">Address: {{ $weatherData['resolvedAddress'] ?? 'N/A' }}</h5>
                <p class="card-text">
                    Latitude: {{ $weatherData['latitude'] ?? 'N/A' }}<br>
                    Longitude: {{ $weatherData['longitude'] ?? 'N/A' }}<br>
                    Timezone: {{ $weatherData['timezone'] ?? 'N/A' }}<br>
                </p>
                <h5 class="mt-3">Weather Details:</h5>
                <p>
                    Date: {{ $weatherData['days'][0]['datetime'] ?? 'N/A' }}<br>
                    Max Temperature: {{ $weatherData['days'][0]['tempmax'] ?? 'N/A' }}°C<br>
                    Min Temperature: {{ $weatherData['days'][0]['tempmin'] ?? 'N/A' }}°C<br>
                    Current Temperature: {{ $weatherData['days'][0]['temp'] ?? 'N/A' }}°C<br>
                    Conditions: {{ $weatherData['days'][0]['conditions'] ?? 'N/A' }}<br>
                    Description: {{ $weatherData['days'][0]['description'] ?? 'N/A' }}<br>
                </p>
                <h5 class="mt-3">Meta Information:</h5>
                <p>
                    Source: Visual Crossing Weather API<br>
                    Request Time: {{ now() }}<br>
                </p>
            </div>
        </div>
    @else
        <p class="text-danger">Sorry, no weather data available.</p>
    @endif

    <div class="text-center mt-3"> <!-- Center the button -->
        <a href="{{ route('weather') }}" class="btn btn-primary">Check Another City</a>
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
            document.querySelectorAll('.card').forEach(card => card.classList.add('card-dark'));
        } else {
            body.classList.remove('bg-color-dark');
            body.classList.add('bg-color-light');
            themeToggle.classList.remove('fa-moon');
            themeToggle.classList.add('fa-sun'); // Change to sun icon for light theme
            document.querySelectorAll('.card').forEach(card => card.classList.remove('card-dark'));
        }
    });
</script>
</body>
</html>




