<!-- MENU Start -->
<div class="navbar-custom">
    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-dark bg-light">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav nav-pills nav-fill">
                    <li class="nav-item {{(Request::is(['admin', 'recept', 'doctor', 'nurse']) ? 'active' : '')}}">
                        @if(Request::is(['admin', 'admin/*']))
                            <a class="nav-link" href="/admin">DASHBOARD</a>
                        @elseif(Request::is(['recept', 'recept/*']))
                            <a class="nav-link" href="/recept">DASHBOARD</a>
                        @elseif(Request::is(['doctor', 'doctor/*']))
                            <a class="nav-link" href="/doctor">DASHBOARD</a>
                        @elseif(Request::is(['nurse', 'nurse/*']))
                            <a class="nav-link" href="/nurse">DASHBOARD</a>
                        @else
                            <a><i></i></a>
                        @endif
                    </li>
                    <li class="nav-item {{(Request::is(['admin/user_register', 'recept/queue', 'nurse/make_appointment']) ? 'active' : '')}}">
                        @if(Request::is(['admin', 'admin/*']))
                            <a class="nav-link" href="/admin/user_register"></i>USER REGISTRATION</a>
                        @elseif(Request::is(['recept', 'recept/*']))
                            <a class="nav-link" href="/recept/queue"><i class="ti-home"></i>QUEUE</a>
                        @elseif(Request::is(['doctor', 'doctor/*']))
                            <a class="nav-link" href="#"><i class="ti-home"></i>PATIENTS</a>
                        @elseif(Request::is(['nurse', 'nurse/*']))
                            <a class="nav-link" href="/nurse/make_appointment"><i class="ti-home"></i>APPOINTMENTS</a>
                        @endif
                    </li>
                    <li class="nav-item {{(Request::is(['admin/users', 'recept/patient_register']) ? 'active' : '')}}">
                        @if(Request::is(['admin', 'admin/*']))
                            <a class="nav-link" href="/admin/users"></i>USERS</a>
                        @elseif(Request::is(['recept', 'recept/*']))
                            <a class="nav-link" href="/recept/patient_register"><i class="ti-home"></i>PATIENT REGISTRATION</a>
                        @elseif(Request::is(['doctor', 'doctor/*']))
                            <a class="nav-link" href="#"><i class="ti-home"></i>PHARMACY</a>
                        @endif
                    </li>

                    <li class="nav-item {{(Request::is(['admin/patients', 'recept/patients']) ? 'active' : '')}}">
                        @if(Request::is(['admin', 'admin/*']))
                            <a class="nav-link" href="/admin/patients"></i>PATIENTS</a>
                        @elseif(Request::is(['recept', 'recept/*']))
                            <a class="nav-link" href="/recept/patients"><i class="ti-home"></i>PATIENTS</a>
                        @elseif(Request::is(['doctor', 'doctor/*']))
                            <a class="nav-link" href="#"><i class="ti-home"></i>LAB REPORTS</a>
                        @endif
                    </li>

                    <li class="nav-item {{(Request::is(['admin/appointments']) ? 'active' : '')}}">
                        @if(Request::is(['admin', 'admin/*']))
                            <a class="nav-link" href="/admin/appointments""></i>APPOINTMENTS</a>
                        @elseif(Request::is(['recept', 'recept/*']))
                            <a class="nav-link" href="#"><i class="ti-home"></i>APPOINTMENTS</a>
                        @endif
                    </li>

                    @if(Request::is(['admin', 'admin/*']))
                    <li class="nav-item {{(Request::is(['admin/pharmacy']) ? 'active' : '')}}">    
                        <a class="nav-link" href="#"></i>PHARMACY</a>
                    </li>
                    @endif
                </ul>
            </div>
</nav>









        <!-- <div id="navigation"> -->
            <!-- Navigation Menu-->
            <!-- <ul class="navigation-menu">

                <li class="{{(Request::is(['admin', 'recept', 'doctor', 'nurse']) ? 'has-submenu active' : '')}}">
                    @if(Request::is(['admin', 'admin/*']))
                        <a href="/admin">Dashboard</a>
                    @elseif(Request::is(['recept', 'recept/*']))
                        <a href="/recept">Dashboard</a>
                    @elseif(Request::is(['doctor', 'doctor/*']))
                        <a href="/doctor">Dashboard</a>
                    @elseif(Request::is(['nurse', 'nurse/*']))
                        <a href="/nurse">Dashboard</a>
                    @else
                        <a><i></i></a>
                    @endif
                </li>
                
                <li class="{{(Request::is(['admin/user_register', 'recept/patient_register', 'nurse/make_appointment']) ? 'has-submenu active' : '')}}">
                    @if(Request::is(['admin', 'admin/*']))
                        <a href="/admin/user_register"></i>User Registration</a>
                    @elseif(Request::is(['recept', 'recept/*']))
                        <a href="/recept/patient_register"><i class="ti-home"></i>Patient Registration</a>
                    @elseif(Request::is(['doctor', 'doctor/*']))
                        <a href="#"><i class="ti-home"></i>Patients</a>
                    @elseif(Request::is(['nurse', 'nurse/*']))
                        <a href="/nurse/make_appointment"><i class="ti-home"></i>Appointments</a>
                    @endif
                </li>

                <li class="{{(Request::is(['admin/users', 'recept/patients']) ? 'has-submenu active' : '')}}">
                    @if(Request::is(['admin', 'admin/*']))
                        <a href="/admin/users"></i>Users</a>
                    @elseif(Request::is(['recept', 'recept/*']))
                        <a href="/recept/patients"><i class="ti-home"></i>Patients</a>
                    @elseif(Request::is(['doctor', 'doctor/*']))
                        <a href="index.html"><i class="ti-home"></i>Pharmacy</a>
                    @endif
                </li>

                <li class="{{(Request::is(['admin/patients']) ? 'has-submenu active' : '')}}">
                    @if(Request::is(['admin', 'admin/*']))
                        <a href="/admin/patients"></i>Patients</a>
                    @elseif(Request::is(['recept', 'recept/*']))
                        <a href="index.html"><i class="ti-home"></i>Appointments</a>
                    @elseif(Request::is(['doctor', 'doctor/*']))
                        <a href="index.html"><i class="ti-home"></i>Lab Reports</a>
                    @endif
                </li>

                <li class="has-submenu" >
                    @if(Request::is(['admin', 'admin/*']))
                        <a href="index.html"></i>Appointments</a>
                    @endif
                </li>

                <li class="has-submenu" >
                    @if(Request::is(['admin', 'admin/*']))
                        <a href="index.html"></i>Pharmacy</a>
                    @endif
                </li>
                
            </ul> -->
            <!-- End navigation menu -->
        <!-- </div> end #navigation -->
    </div> <!-- end container -->
</div> <!-- end navbar -->

<style>
.navbar {
    padding: 0;
}
.bg-light {
    background-color:#212121!important;
}
.navbar-custom .container-fluid {
    padding-left: 0;
    padding-right: 0;
}
.navbar-dark .navbar-nav .nav-link {
    padding: 15px 30px;
}
.nav-pills .nav-link {
    transition:0.2s;
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 18px;
}
.active {
    background: #0064b7;
}
.nav-item::after{
    content:'';
    display:block;
    width:0px;
    height:2px;
    background:#fff;
    transition: 0.2s;
}
.nav-item:hover::after{
    width:100%;
}
</style>