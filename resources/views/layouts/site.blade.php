<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>  HOME</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<br>
<div style="position:absolute; right:0;">
    <a href="{{route('home')}}">Home |</a>
    @guest
    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"> Log in</a>
    @endguest
    @auth
    <a href="{{route('showFavorites')}}"> {{Auth::user()->name}}|</a>
    <a href="{{route('user.logout')}}">LogOut</a>

    @endauth
  
</div>
<body>

@include('user.includes.header')
@yield('content')

</body>