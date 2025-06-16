<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Marketplace | {{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> --}}

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>
<body class=" bg-gray-100 text-gray-800 font-display">
    @php
        $cart = session('cart', []);
    @endphp

    <x-nav />

    {{ $slot }}

    <footer class="py-14 px-6 mt-10 text-center md:text-left sm:px-8 bg-gradient-to-br from-blue-900 to-blue-600 text-white pt-12 shadow-inner">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">

    <!-- Logo + Slogan -->
    <div>
      <div class="flex items-center space-x-3">
        <img src="{{asset('images/icons.png')}}" alt="Logo" class="w-10 h-10 rounded-full" />
        <span class="text-2xl font-bold">Market<span class="text-yellow-300">Place</span></span>
      </div>
      <p class="mt-4 text-sm text-gray-200">La plateforme incontournable pour acheter, vendre, et découvrir des produits en toute confiance.</p>
    </div>

    <!-- Navigation -->
    <div>
      <h3 class="text-lg font-semibold mb-4">Navigation</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:text-yellow-300 transition">Accueil</a></li>
        <li><a href="#" class="hover:text-yellow-300 transition">Produits</a></li>
        <li><a href="#" class="hover:text-yellow-300 transition">Boutiques</a></li>
        <li><a href="#" class="hover:text-yellow-300 transition">Contact</a></li>
      </ul>
    </div>

    <!-- Support / Aide -->
    <div>
      <h3 class="text-lg font-semibold mb-4">Support</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:text-yellow-300 transition">Centre d’aide</a></li>
        <li><a href="#" class="hover:text-yellow-300 transition">FAQ</a></li>
        <li><a href="#" class="hover:text-yellow-300 transition">Conditions</a></li>
        <li><a href="#" class="hover:text-yellow-300 transition">Politique de confidentialité</a></li>
      </ul>
    </div>

    <!-- Newsletter -->
    <div>
      <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
      <p class="text-sm mb-4">Recevez les dernières nouveautés et offres spéciales.</p>
       <div class="flex space-x-4">
      <a href="#" aria-label="Facebook" class="hover:text-yellow-300 transition">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
          <path d="M22 12A10 10 0 1 0 12 22V14.6H10v-2.6h2V10c0-1.9 1.2-3 2.8-3 .8 0 1.6.1 1.6.1v1.9H15.9c-1 0-1.3.6-1.3 1.2v1.6h2.3l-.4 2.6H14.6V22A10 10 0 0 0 22 12z"/>
        </svg>
      </a>
      <a href="#" aria-label="Twitter" class="hover:text-yellow-300 transition">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
          <path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.3 4.3 0 0 0 1.89-2.37 8.59 8.59 0 0 1-2.72 1.03A4.28 4.28 0 0 0 11.15 9c0 .34.04.68.1 1A12.1 12.1 0 0 1 3 5.1a4.26 4.26 0 0 0-.58 2.15 4.28 4.28 0 0 0 1.9 3.57 4.23 4.23 0 0 1-1.94-.53v.05a4.28 4.28 0 0 0 3.43 4.2 4.27 4.27 0 0 1-1.93.07 4.29 4.29 0 0 0 4 2.97A8.6 8.6 0 0 1 2 19.54 12.1 12.1 0 0 0 8.29 21c7.55 0 11.68-6.26 11.68-11.69 0-.18-.01-.35-.02-.52A8.18 8.18 0 0 0 22.46 6z"/>
        </svg>
      </a>
      <a href="#" aria-label="Instagram" class="hover:text-yellow-300 transition">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
          <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6zm4.5-.5a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
        </svg>
      </a>
    </div>
    </div>
  </div>
</footer>



    <script src="https://js.stripe.com/v3/"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
