<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

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
        // $(document).ready(function(){
        //     $('#departement_id').change(function(event){
        //         var idDepartement = this.value;
        //         // alert(idDepartement);
        //         $('#fonction_id').html('');

        //         $.ajax({
        //             url:'/departement/fonction',
        //             type : 'POST',
        //             dataType : 'json',
        //             data : {departement_id: idDepartement,_token:"{{ csrf_token() }}"},
        //             success : function(response){
        //                 $('#fonction_id').html('<option value="">--Fonction--</option>');
        //                 $.each(response.fonctions,function(index, val){
        //                     $('#fonction_id').append('<option value="'+val.id+'"> '+val.fonction+'</option>');
        //                 });
        //             }
        //         });
        //     });
        // });
            $(document).ready(function(){
            // Charger les fonctions lorsque la page est chargée si un département est déjà sélectionné
            var initialDepartementId = $('#departement_id').val();
            @if(isset($employer))
                var initialFonctionId = {{ $employer->fonction_id }};
                if(initialDepartementId) {
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

</body>

</html>
<!-- end document-->
