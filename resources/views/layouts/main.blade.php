<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/theme.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
@include('partials.navbarAdmin')
@yield('container')

<!-- ===============================================-->
                <!--    JavaScripts-->
                <!-- ===============================================-->
                <script src="vendors/@popperjs/popper.min.js"></script>
                <script src="vendors/bootstrap/bootstrap.min.js"></script>
                <script src="vendors/is/is.min.js"></script>
                <script
                    src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
                <script src="vendors/fontawesome/all.min.js"></script>
                <script src="assets/js/theme.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script
                    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                    crossorigin="anonymous"></script>
                <link
                    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap"
                    rel="stylesheet">

</body>

<script>
@if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
@endif
</html>
