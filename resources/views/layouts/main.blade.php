<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset("/storage/taartely-assets/logo.png") }}"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- * Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    {{-- * Custome CSS LINK --}}
    <link rel="stylesheet" href="/css/styles.css">

    {{-- * Bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    {{-- * Google font --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">

    {{-- * AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <title>{{ empty($title) ? "Taartely" : "Taartely | " . $title }}</title>

</head>
<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    @yield('container')
    @include('layouts.footer')

    {{-- ! DO NOT TOUCH, EDIT, OR DELETE --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 

    {{-- ! Only use the code below on pages that use it --}}
    {{-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script> --}}
  
</body>
</html>