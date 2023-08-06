<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Sleek | @yield('title')</title>

  <meta name="description" content="" />

  @include('admin.layouts-styles')
  @yield('page_css')


</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      @include('admin.sidebar')
      @include('admin.navbar')

      @yield('content')


      @include('admin.layouts-scripts')
      @yield('page_js')
    </div>

  </div>
</body>

</html>