<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Application Title --}}
        <title>@yield('title', config('app.name'))</title>

        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        {{-- Initial Application stylesheet & scripts --}}
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div id="application">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                            aria-controls="navbar" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <x-navlink :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-navlink>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            @guest
                                <li class="nav-item">
                                    <a class="btn btn-sm btn-success" href="{{ route('register') }}">
                                        {{ __('Create an account') }}
                                    </a>
                                    <a class="btn btn-sm btn-light" href="{{ route('login') }}">
                                        {{ __('Sign in') }}
                                    </a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" role="button" data-bs-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf

                                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                                {{ __('Profile') }}
                                            </a>

                                            <button type="submit" form="logout-form" class="dropdown-item">
                                                {{ __('Logout') }}
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            {{-- Page Content --}}
            <main {{ $attributes }}>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
