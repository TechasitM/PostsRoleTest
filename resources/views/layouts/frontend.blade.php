<!-- resources/views/layouts/frontend.blade.php -->
<!doctype html>
<html lang="{{ config('app.locale') }}">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Name - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet">
    @yield('css_before')
</head>

<body>
    <div class="b-example-divider"></div>
    <nav class="py-2 bg-light border-bottom">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link link-dark px-2 active"
                        aria-current="page">หน้าหลัก</a></li>
                <li class="nav-item"><a href="{{ url('/posts') }}" class="nav-link link-dark px-2">บทความ</a></li>
                <li class="nav-item"><a href="{{ url('/category') }}" class="nav-link link-dark px-2">ประเภทบทความ</a>
                </li>
                <li class="nav-item"><a href="{{ url('/products') }}" class="nav-link link-dark px-2">สินค้า</a></li>
                <li class="nav-item"><a href="{{ url('/aboute') }}" class="nav-link link-dark px-2">เกี่ยวกับเรา</a>
                </li>
            </ul>
            <ul class="nav">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link-dark px-2">เข้าระบบ</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link link-dark px-2">ลงทะเบียน</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                ออกจากระบบ
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
@if (Session::has('success'))
    <script>
        Swal.fire(
            'แจ้งเตือนการทํารายการ!',
            '{{ Session::get('success') }}',
            'success'
        )
    </script>
@endif
@yield('js_before')

</html>
