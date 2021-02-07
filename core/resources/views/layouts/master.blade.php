<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Virtual Machine Management {{  '| '.__($pt) }}  </title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/bootstrap.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">
    <!-- flaticon -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/flaticon.css">
    <!-- slicknav -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/slicknav.min.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/owl.carousel.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/magnific-popup.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/responsive.css">

    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/flipclock.css">

    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/custom.css">

    <link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">

    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/color.php?color=2ecc71&color2=e74c3c">
    @yield('style')


</head>

<body>
<!-- support bar area start -->
<div class="support-bar">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-9 col-md-12 col-sm-12 support-bar-curve">
                <div class="support-wrapper">
                    <div class="support-bar-left">
                        <span class="support-item"><i class="fa fa-envelope"></i> virtual.machine@manage.com</span>
                        <span class="support-item"><i class="fa fa-phone"></i> 01234564795</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- support bar area end -->
<div class="header-bottom">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="site-logo site-title" href="{{url('/')}}"><img style="max-width: 200px" src="{{asset('assets/images/logo/logo.png')}}" alt="site-logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu-toggle"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav main-menu ml-auto" id="primary-pranto">

                    @guest

                    @else

                    @endguest


                </ul>
            </div>
        </nav>
    </div>
</div><!-- header-bottom end -->

<div id="app">
    @yield('content')
</div>
<!-- footer area start -->

<!-- preloader area end -->

<!-- jquery -->
<script src="{{url('/')}}/assets/front/js/jquery.js"></script>
<!-- popper -->
<script src="{{url('/')}}/assets/front/js/popper.min.js"></script>
<!-- bootstrap -->
<script src="{{url('/')}}/assets/front/js/bootstrap.min.js"></script>
<!-- slicknav -->
<script src="{{url('/')}}/assets/front/js/jquery.slicknav.min.js"></script>

<script src="{{url('/')}}/assets/front/js/flipclock.min.js"></script>
<!-- owl carousel -->
<script src="{{url('/')}}/assets/front/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="{{url('/')}}/assets/front/js/jquery.magnific-popup.js"></script>
<!-- way poin js-->
<script src="{{url('/')}}/assets/front/js/waypoints.min.js"></script>
<!-- wow js-->
<script src="{{url('/')}}/assets/front/js/wow.min.js"></script>
<!-- counterup js-->
<script src="{{url('/')}}/assets/front/js/jquery.counterup.min.js"></script>
<!-- contact js-->
<script src="{{url('/')}}/assets/front/js/contact.js"></script>
<!-- main -->
<script src="{{url('/')}}/assets/front/js/main.js"></script>

<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>

<script src="{{url('/')}}/assets/vue/vue.js"></script>

<script src="{{url('/')}}/assets/vue/axios.js"></script>

<script>
    $(document).on('change', '#langSel', function () {
        var code = $(this).val();
        window.location.href = "{{url('/')}}/change-lang/"+code ;
    });
</script>

@yield('script')
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>


<script>
    $(document).ready(function(){
        var winheight = $(window).height() -150;
        $('#justify-height').css('min-height',winheight+'px');
    });
</script>


@if (Session::has('success'))
    <script type="text/javascript">
        $(document).ready(function () {
            iziToast.success({
                title: '{{__('Success!')}}',
                message: '{{__(Session::get('success'))}}',
            });

        });
    </script>
@endif

@if (Session::has('message'))
    <script type="text/javascript">
        $(document).ready(function () {
            iziToast.success({
                title: '{{__('Success!')}}',
                message: '{{__(Session::get('message'))}}',
            });

        });
    </script>
@endif

@if (Session::has('alert'))
    <script type="text/javascript">
        $(document).ready(function () {
            iziToast.error({
                title: '{{__('Opps!')}}',
                message: '{{__(Session::get('alert'))}}',
            });
        });
    </script>
@endif
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            $(document).ready(function(){
                iziToast.warning({
                    title: '{{__('Error!')}}',
                    message: '{{__($error)}}',
                    position: 'topRight',
                });
            });
        </script>
    @endforeach
@endif

</body>

</html>
