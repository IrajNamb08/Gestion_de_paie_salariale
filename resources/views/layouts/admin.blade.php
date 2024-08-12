<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link rel="icon" href="{{ asset('vendor/image.png') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">
    <style>
        .container{
            margin-top: 0 !important;
        }
        .table-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        .table thead th {
            border-bottom: none;
        }
        .table tbody tr {
            border-bottom: 1px solid #dee2e6;
            border-radius: 15px;
        }
        .table tbody td {
            vertical-align: middle;
        }
        .table tbody tr:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .progress-bar {
            background-color: #6f42c1;
        }
        .category span {
            display: inline-block;
            margin-right: 5px;
            padding: 2px 5px;
            border-radius: 5px;
            font-size: 12px;
        }
        .category span.arts {
            background-color: #ffc107;
            color: #fff;
        }
        .category span.books {
            background-color: #17a2b8;
            color: #fff;
        }
        .category span.travel {
            background-color: #28a745;
            color: #fff;
        }
        .category span.computers {
            background-color: #007bff;
            color: #fff;
        }
        .category span.kitchen {
            background-color: #dc3545;
            color: #fff;
        }
        .category span.furniture {
            background-color: #6f42c1;
            color: #fff;
        }
        .category span.beauty {
            background-color: #fd7e14;
            color: #fff;
        }
        .category span.apparel {
            background-color: #20c997;
            color: #fff;
        }
        .category span.sale {
            background-color: #f8f9fa;
            color: #343a40;
        }
        .actions i {
            color: #6c757d;
            cursor: pointer;
            margin-right: 10px;
        }
        .actions i:hover {
            color: #495057;
        }
        .form-container {
            justify-content: center;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            width: 100%;
        }
        .form-container h3 {
            font-weight: bold;
            color: #343a40;
        }
        .form-container p {
            color: #dc3545;
            margin-top: -10px;
            margin-bottom: 20px;
        }
        .form-control {
            background-color: #f1f3f5;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
        }
        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
            border-color: #80bdff;
        }
        .btn-submit {
            background: linear-gradient(to right, #f72585, #b5179e);
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .btn-submit:hover {
            background: linear-gradient(to right, #b5179e, #7209b7);
        }
        .form-group label {
            font-weight: bold;
            color: #343a40;
        }
        .custom-radio {
            display: inline-block;
            margin-right: 10px;
            cursor: pointer;
        }
        .custom-radio input[type="radio"] {
            display: none;
        }
        .custom-radio span {
            padding: 10px 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            color: #6c757d;
            font-weight: bold;
            background-color: #fff;
            transition: all 0.3s ease;
        }
        .custom-radio input[type="radio"]:checked + span {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
        
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('layouts.include.headermobile')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('layouts.include.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('layouts.include.headerdesktop')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    
    <!-- Jquery JS-->
    <script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>

    <script src="{{asset('vendor/sweetalert.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('js/main.js')}}"></script>

    <script>
            $(document).ready(function(){
            // Charger les fonctions lorsque la page est chargée si un département est déjà sélectionné
            var initialDepartementId = $('#departement_id').val();
            
            @if(isset($employer) && is_object($employer))
                var initialFonctionId = {{ $employer->fonction_id }};
                if (initialDepartementId) {
                    loadFonctions(initialDepartementId, initialFonctionId);
                }
            @endif
            $('#departement_id').change(function(event){
                var idDepartement = this.value;
                $('#fonction_id').html('<option value="">--Sélectionnez une fonction--</option>');
                if(idDepartement) {
                    loadFonctions(idDepartement);
                }
            });

            function loadFonctions(departementId, selectedFonctionId = null) {
                $.ajax({
                    url: '/departement/fonction',
                    type: 'POST',
                    dataType: 'json',
                    data: {departement_id: departementId, _token: "{{ csrf_token() }}"},
                    success: function(response){
                        $.each(response.fonctions, function(index, val){
                            $('#fonction_id').append('<option value="'+val.id+'" '+ (selectedFonctionId && val.id == selectedFonctionId ? 'selected' : '') +'> '+val.fonction+'</option>');
                        });
                    }
                });
            }
        });
    </script>
    @yield('scripts')
</body>

</html>
<!-- end document-->
