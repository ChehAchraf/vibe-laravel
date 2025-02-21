
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vibe - Connect with Friends</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Add Alpine.js for dropdowns -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
    <!-- Add custom styles -->
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .hover-scale {
            transition: transform 0.2s;
        }
        .hover-scale:hover {
            transform: scale(1.02);
        }
        .notification-dropdown {
            transform-origin: top right;
            transition: all 0.2s ease-out;
        }
        .notification-enter {
            opacity: 0;
            transform: scale(0.95);
        }
        .notification-enter-active {
            opacity: 1;
            transform: scale(1);
        }
    </style>
</head>
<body class="bg-gray-50">

@section('content')
    
@endsection

</body>
</html> 