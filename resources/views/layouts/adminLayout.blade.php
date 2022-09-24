@include('componentsAdmin.head')

<body class="theme-red">
    <!-- Page Loader -->
        @include('componentsAdmin.loader')
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    {{-- navbar --}}
        @include('componentsAdmin.navbar')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
            @include('componentsAdmin.leftSidebar')
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        @yield('master')
    </section>

    @include('componentsAdmin.js')

</body>

</html>