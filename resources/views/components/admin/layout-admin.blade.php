<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marketplace | {{ $title }}</title>
    <link rel="icon" type="image/png" href="{{ asset('icons.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>
<body class="bg-gray-100 text-gray-800 font-display">

    <x-admin.nav-admin />
    <x-admin.sidebar-admin />

    {{-- Contenu principal --}}
    {{ $slot }}

    {{-- <x-footer /> --}}
    <footer class="bg-blue-950 text-gray-400 text-center py-4 text-sm">
        © {{ date('Y') }} MonMarket Admin Panel — Tous droits réservés.
    </footer>

    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
