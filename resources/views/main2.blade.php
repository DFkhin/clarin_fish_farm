@extends('page')

@section('body')

<!-- Page Wrapper -->
    <!-- Sidebar -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->

        <!-- Main Content -->

            <!-- Topbar -->
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
                @include('messages')

                @yield('content')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->>

    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->

<!-- Logout Modal-->

@endsection
