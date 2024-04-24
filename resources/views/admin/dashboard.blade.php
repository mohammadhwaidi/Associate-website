<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">


    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">


</head>


<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">

            <div class="sidebar-brand-text mx-3">Welcome Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
     {{--   <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>--}}
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('welcome') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Home</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Posts -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePosts"
               aria-expanded="true" aria-controls="collapsePosts">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Posts</span>
            </a>
            <div id="collapsePosts" class="collapse" aria-labelledby="headingPosts" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Posts Components:</h6>
                    <a class="collapse-item" href="{{ route('admin.posts.index') }}">Show All</a>
                    <a class="collapse-item" href="{{ route('admin.posts.create') }}">Create New</a>
                </div>
            </div>
        </li>


        <!-- Contact -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContact"
               aria-expanded="true" aria-controls="collapseContact">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Contact</span>
            </a>
            <div id="collapseContact" class="collapse" aria-labelledby="headingContact" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Contact Components:</h6>
                    <a class="collapse-item" href="{{ route('admin.contact.index') }}">Show All</a>
                </div>
            </div>
        </li>

        <!-- Testimonials -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTestimonials"
               aria-expanded="true" aria-controls="collapseTestimonials">
                <i class="fas fa-fw fa-comment"></i>
                <span>Testimonials</span>
            </a>
            <div id="collapseTestimonials" class="collapse" aria-labelledby="headingTestimonials"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Testimonial Management:</h6>
                    <a class="collapse-item" href="{{ route('admin.testimonials.index') }}">Show All</a>
                    <a class="collapse-item" href="{{ route('admin.testimonials.create') }}">Create New</a>
                </div>
            </div>
        </li>

        <!-- Users -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
               aria-expanded="true" aria-controls="collapseUsers">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Users</span>
            </a>
            <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="{{ route('users.index') }}">Show All</a>
                    <a class="collapse-item" href="{{ route('users.create') }}">Create New</a>
                </div>
            </div>
        </li>

        <!-- Activities -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseActivities"
               aria-expanded="true" aria-controls="collapseActivities">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Activities</span>
            </a>
            <div id="collapseActivities" class="collapse" aria-labelledby="headingActivities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Activity Management:</h6>
                    <a class="collapse-item" href="{{ route('admin.activities.index') }}">Show All</a>
                    <a class="collapse-item" href="{{ route('admin.activities.create') }}">Create New</a>
                </div>
            </div>
        </li>

        <!-- Slideshows -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSlideshows"
               aria-expanded="true" aria-controls="collapseSlideshows">
                <i class="fas fa-fw fa-images"></i>
                <span>Slideshows</span>
            </a>
            <div id="collapseSlideshows" class="collapse" aria-labelledby="headingSlideshows"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Slideshow Management:</h6>
                    <a class="collapse-item" href="{{ route('admin.slideshows.index') }}">Show All</a>
                    <a class="collapse-item" href="{{ route('admin.slideshows.create') }}">Create New</a>
                </div>
            </div>
        </li>

        <!-- Events -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvents"
               aria-expanded="true" aria-controls="collapseEvents">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Events</span>
            </a>
            <div id="collapseEvents" class="collapse" aria-labelledby="headingEvents"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Event Management:</h6>
                    <a class="collapse-item" href="{{ route('admin.events.index') }}">Show All</a>
                    <a class="collapse-item" href="{{ route('admin.events.create') }}">Create New</a>
                </div>
            </div>
        </li>

        <!-- Events Enrollments -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEnrollments"
               aria-expanded="true" aria-controls="collapseEnrollments">
                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Events Enrollments</span>
            </a>
            <div id="collapseEnrollments" class="collapse" aria-labelledby="headingEnrollments"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Enrollment Management:</h6>
                    <a class="collapse-item" href="{{ route('admin.events.enrollments.index') }}">Show All</a>
                    <a class="collapse-item" href="{{ route('admin.events.enrollments.create') }}">Create New</a>
                </div>
            </div>
        </li>

        <!-- Internships -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInternships"
               aria-expanded="true" aria-controls="collapseInternships">
                <i class="fas fa-fw fa-briefcase"></i>
                <span>Internships</span>
            </a>
            <div id="collapseInternships" class="collapse" aria-labelledby="headingInternships"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Internship Management:</h6>
                    <a class="collapse-item" href="{{ route('admin.internships.index') }}">Show All</a>
                    <a class="collapse-item" href="{{ route('admin.internships.create') }}">Create New</a>
                </div>
            </div>
        </li>

        <!-- Internship Enrollments -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInternshipEnrollments"
               aria-expanded="true" aria-controls="collapseInternshipEnrollments">
                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Internship Enrollments</span>
            </a>
            <div id="collapseInternshipEnrollments" class="collapse" aria-labelledby="headingInternshipEnrollments"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Enrollment Management:</h6>
                    <a class="collapse-item" href="{{ route('admin.internships.enrollments.index') }}">Show All</a>
                    <a class="collapse-item" href="{{ route('admin.internships.enrollments.create') }}">Create New</a>
                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">





                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                            <img class="img-profile rounded-circle"
                                 src="{{ asset('admin_assets/img/undraw_profile.svg') }}">

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            <form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('content')

            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript -->
<script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages -->
<script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('admin_assets/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('admin_assets/js/demo/chart-pie-demo.js') }}"></script>


</body>

</html>
