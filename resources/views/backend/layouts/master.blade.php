<!DOCTYPE HTML>
<html lang="en">

@include('backend.layouts.header.header')

<body>
    <div class="screen-overlay"></div>
    @include('backend.layouts.partials.side_nave')
    <main class="main-wrap">
        @yield('page_content') <!-- content-main end// -->
        @include('backend.layouts.footer.footer')
    </main>
    @include('backend.layouts.footer.footer_assets')
</body>

</html>
