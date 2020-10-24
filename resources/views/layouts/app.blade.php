<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
    
    <livewire:styles />
    <livewire:scripts />

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/lightbox-plus-jquery.min.js')}}"></script>    
</head>

<body class="flex flex-wrap justify-center">
    <div class="flex w-full px-4 bg-blue-900 text-white fixed">
        <a class="mx-3 py-4" href="/">Home</a>
        </div>
        @auth
        <div class="dropdown mx-3 py-4">
        <button class="dropbtn mx-3 py-4">SIMONEB
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
        <a class="mx-3 py-4" href="/akademik">Prestasi Akademik</a>
        <a class="mx-3 py-4" href="/karya">Karya Tulis</a>
        <a class="mx-3 py-4" href="/kajian">Kajian, Seminar, Bedah Buku</a>       
        <a class="mx-3 py-4" href="/prestasi">Prestasi Kompetisi</a>
        <a class="mx-3 py-4" href="/organisasi">Organisasi Kemahasiswaan</a>
        <a class="mx-3 py-4" href="/sosial">Sosial Kemahasiswaan</a>       
        <a class="mx-3 py-4" href="/mentoring">Mentoring Keislaman</a>
        <a class="mx-3 py-4" href="/tahsin">Sertifikasi Tahsin/Tahfidz</a>
        <a class="mx-3 py-4" href="/beasiswa">Kekhasan Beasiswa</a>       
        </div>
         <a class="mx-3 py-4" href="/userlist">User Lists</a>
         <a class="mx-3 py-4" href="/album">Album</a>
        <livewire:logout />
        @endauth
        @guest
        <div class="py-4">
            <a class="mx-3" href="/login">Login</a>
            <a class="mx-3" href="/register">Register</a>
        </div>
        @endguest
    </div>
    <div class="my-10 w-full justify-center">
        @yield('content')
    </div>

</body>

</html>