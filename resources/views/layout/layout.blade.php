<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="
    garage management system with chart using highcharts
    and laravel framework to do the backend.
    ">
    <title>Project</title>
    <link rel="shortcut icon" href="/assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Latest compiled and minified CSS -->


    <!-- Optional theme -->


    <!-- Latest compiled and minified JavaScript -->


    <!-- Mohammad -->
    <style>
        #search2 {
            text-indent: 18px;
            outline: none;
        }

        #search2:focus {
            background-color: rgb(222, 227, 233);
        }

        @font-face {
            font-family: "NRT-Reg";
            src: url("NRT-Reg.eot");
            /* IE9 Compat Modes */
            src: url("NRT-Reg.eot?#iefix") format("embedded-opentype"),
                /* IE6-IE8 */
                url("NRT-Reg.ttf") format("truetype"),
                /* Safari, Android, iOS */
                url("NRT-Reg.woff") format("woff");
            /* Modern Browsers */
            font-weight: normal;
            font-style: normal;
        }

        * {
            font-family: 'NRT-Reg';
            letter-spacing: 2px;
        }

    </style>

</head>

<body style="overflow: hidden; margin-right: 15vw;">
    <div class="sidebar" dir="rtl" style="padding: 20px;">
        <div class="sidebar-logo">
            <img src="/assets/img/logo.png" alt="Comapny logo">
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-left-arrow-alt'></i>
            </div>
        </div>
        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu" style="margin-top: 22px;">
            <li>
                <a href="/">
                    <i class="fas fa-chart-bar" style="margin-right: 8px;"></i>
                    <span style="margin-right: 22px" class="dark">پەڕەی سەرەکی</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class="fas fa-user-friends" style="margin-right: 6px"></i>
                    <span style="margin-right: 18px;">بەکارهێنەرەکان </span>&nbsp;
                    <div class="dropdown-icon" style="position: relative; right: 20px;"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="{{ route('customer.index') }}" style="margin-right: 32px">
                            موشتەریەکان
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('employee.index') }}" style="margin-right: 32px">
                            کارمەندەکان
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('invoice.index') }}">
                    <i class="fas fa-file-invoice-dollar" style="margin-right: 10px"></i>
                    <span style="margin-right: 20px">وەسڵەکان</span>
                </a>
            </li>
            <li>
                <a href="{{ route('jobcard.index') }}">
                    <i class="fas fa-briefcase" style="margin-right: 8px"></i>
                    <span style="margin-right: 20px">ئیشەکان</span>
                </a>
            </li>
            <li>
                <a href="{{ route('notification.index') }}">
                    <i class="far fa-bell" style="margin-right: 8px"></i>
                    <span style="margin-right: 20px">پەیوەندیەکان</span>
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" style="height: 23px; width: 24px; margin-right: 4px;">
                        <path d="M248 167.5l64.9 98.8H183.1l64.9-98.8zM496 256c0 136.9-111.1 248-248 248S0 392.9 0 256 111.1 8 248 8s248 111.1 248 248zm-99.8 82.7L248 115.5 99.8 338.7h30.4l33.6-51.7h168.6l33.6 51.7h30.2z"/>
                    </svg>
                    <span style="margin-right: 20px">ئەدمین</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <main class="container" class="style">
        @yield('content')
    </main>
    
    <script src="/assets/js/app.js"></script>
    
</body>

</html>
