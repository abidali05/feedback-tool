<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @livewireStyles()
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to FeedbackTool</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body class="bg-gray-100">
    <div class="welcome-container">
        <div class="card">
            <div class="card-header">
                WELCOME
            </div>
        </div>
    </div>
    @livewireScripts()
</body>
</html>
