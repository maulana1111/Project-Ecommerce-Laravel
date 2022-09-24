@include('components.head')
<body>
    
<div class="container">

    <!--header-->
    @include('components.header')

    <!--navbar-->
    @include('components.navbar')    


    <!--content-->
    <div class="row py-4">

        <div class="col-3">
            <!--category-->
            @include('components.sidebar_category')
        </div>

        <div class="col-9">
            <!--pages-->
           
            @yield('body')
            
        </div>
    </div>

    @include('components.footer')

</div>

</body>
</html>