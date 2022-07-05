

<!doctype html>
<html lang="en">


<head>
    <title>Datepicker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{url('assets/js/core/bootstrap.bundle.min.js')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('assets/vendor/jquery/dist/jquery.min.js')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('assets/vendor/@fortawesome/fontawesome-free/css/fontawesome.min.css')}}" >
    <script src="{{url('assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}"></script>
    <script src="{{url('assets/js/core/bootstrap.min.js')}}"></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/argon-dashboard.css')}}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body style="background-color: ivory;">
<section class="container">
    <h3 class="pt-4 pb-2">Bootstrap Datepicker</h3>
    <form>
        <div class="row form-group">
            <label for="date" class="col-sm-1 col-form-label">Date</label>
            <div class="col-sm-4">
                <div class="input-group date" id="datepicker">
                    <input type="text" />
                    <span class="input-group-append">

                        </span>
                </div>
            </div>
        </div>
    </form>
</section>

<script type="text/javascript">
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd', language:'es'
    });
    $('#datepicker').regional["es"];


</script>

<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<!-- Kanban scripts -->
<script src="{{asset('assets/js/plugins/dragula/dragula.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jkanban/jkanban.js')}}"></script>

<!-- Argon Scripts -->
<!-- Core -->

<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Optional JS -->
<script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>




</body>


</html>
