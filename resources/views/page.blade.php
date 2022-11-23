<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fish Management System</title> 
    
        <link rel="stylesheet" href="{{asset('css/style.css')}}">   
        <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}">
        
        
        <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
        <link href="{{asset('css/styles.css')}}" rel="stylesheet">

        <!--<h1 class="mt-4 mb-5 text-center">Clarin Freshwater Fish Farm Record Management System</h1>-->
        <script src="{{asset('js/jquery.js')}}"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('js/jquery.printPage.js')}}"></script>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
        <script src="{{asset('js/scripts.js')}}"></script>
            
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
        
        @yield('heads')
        
</head>
<body id="page-top">

    @yield('body')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    @yield('scripts')
    @yield('scripts2')

</body>

</html>