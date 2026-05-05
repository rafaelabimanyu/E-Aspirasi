<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Aspirasi | Portal Integritas & Pelayanan Publik</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .hero-gradient {
            background: radial-gradient(circle at top right, #eff6ff 0%, #ffffff 100%);
        }
    </style>
</head>

<body class="bg-[#fcfdfe] text-slate-900 antialiased selection:bg-blue-100 selection:text-blue-900">

    @include('components.landing.navbar')
    @include('components.landing.hero')
    @include('components.landing.features')
    @include('components.landing.stats', ['totalSelesai' => $totalSelesai, 'totalProses' => $totalProses])
    @include('components.landing.news-section', ['news' => $news])
    @include('components.landing.faq')
    @include('components.landing.footer')

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>
</html>
