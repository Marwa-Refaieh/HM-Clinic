
<div class="sidebar" data-color="purple" data-background-color="black"
    data-image="{{ URL::asset('dashboard/assets/img/sidebar-2.jpg') }}">
    <div class="logo"><a href="#" class="simple-text logo-normal">

            HM-Clinc
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active  ">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- Dropdown-->
            <li class="nav-item" id="dropdown">
                <a class="nav-link" data-toggle="collapse" href="#dropdown-lvl1">
                    <i class="material-symbols-outlined">
                        groups
                    </i>
                    <p>Center Employees
                        <span class="caret"></span>
                    </p>

                </a>
                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('doctors.index') }}">
                                    <p>Doctors</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('secretary.index') }}">
                                    <p>Secretarys</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('paramedic.index') }}">
                                    <p>Paramedics</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <!-- Dropdown-->
            <li class="nav-item" id="dropdown">
                <a class="nav-link" data-toggle="collapse" href="#dropdown-lvl8" id="appointments">
                    {{-- <i class="fa fa-calendar" aria-hidden="true"></i> --}}
                    {{-- <p>Doctors Appointment
                        <span class="caret"></span>
                    </p> --}}
                    <i class="material-symbols-outlined">
                        clinical_notes
                    </i>
                    <p>Doctors Appointment
                        <span class="caret"></span>
                    </p>
                </a>
                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl8" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li class="nav-item neurologistBtn" id="dropdown">
                                <a class="nav-link neurologist-appoint" data-toggle="collapse" href="#dropdown-lvl9"
                                    data-category="2">
                                    <i class="glyphicon glyphicon-off"></i>
                                    <p> Neurologist <span class="caret"></span></p>
                                </a>
                                <div id="dropdown-lvl9" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav" id="doctor-neurologist"></ul>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item cardiologistBtn" id="dropdown">
                                <a class="nav-link cardiologist-appoint" data-toggle="collapse" href="#dropdown-lvl10"
                                    data-category="1">
                                    <i class="glyphicon glyphicon-off"></i>
                                    <p> Cardiologist <span class="caret"></span></p>
                                </a>
                                <div id="dropdown-lvl10" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav" id="doctor-cardiologist"></ul>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item endocrinologyBtn" id="dropdown">
                                <a class="nav-link endocrinology-appoint" data-toggle="collapse" href="#dropdown-lvl11"
                                    data-category="4">
                                    <i class="glyphicon glyphicon-off"></i>
                                    <p> Endocrinology <span class="caret"></span></p>
                                </a>
                                <div id="dropdown-lvl11" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav" id="doctor-endocrinology"></ul>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item psychologicalBtn" id="dropdown">
                                <a class="nav-link psychological-appoint" data-toggle="collapse" href="#dropdown-lvl12"
                                    data-category="3">
                                    <i class="glyphicon glyphicon-off"></i>
                                    <p> Psychological <span class="caret"></span></p>
                                </a>
                                <div id="dropdown-lvl12" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav" id="doctor-psychological"></ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <!-- Dropdown-->
            <li class="nav-item" id="dropdown">
                <a class="nav-link" data-toggle="collapse" href="#dropdown-lvl3" id="records">
                    <i class="material-icons">badge</i>
                    <p>Patient Records
                        <span class="caret"></span>
                    </p>

                </a>
                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <!-- Dropdown level 2 -->
                            <li class="nav-item cardiologistBtnRecord" id="dropdown">
                                <a class="nav-link cardiologist-records" data-toggle="collapse" href="#dropdown-lvl4"
                                    data-category="1">
                                    <i class="glyphicon glyphicon-off"></i>
                                    <p> Cardiology <span class="caret"></span></p>
                                </a>
                                <div id="dropdown-lvl4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav" id="doctor-cardiologist-records"></ul>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item neurologistBtnRecord" id="dropdown">
                                <a class="nav-link neurologist-records" data-toggle="collapse" href="#dropdown-lvl5"
                                    data-category="2">
                                    <i class="glyphicon glyphicon-off"></i>
                                    <p> Neurology <span class="caret"></span></p>
                                </a>
                                <div id="dropdown-lvl5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav" id="doctor-neurologist-records"></ul>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item psychologyBtnRecord" id="dropdown">
                                <a class="nav-link psychology-records" data-toggle="collapse" href="#dropdown-lvl6"
                                    data-category="3">
                                    <i class="glyphicon glyphicon-off"></i>
                                    <p> Psychology <span class="caret"></span></p>
                                </a>
                                <div id="dropdown-lvl6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav" id="doctor-psychology-records"></ul>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item endocrinologyBtnRecord" id="dropdown">
                                <a class="nav-link endocrinology-records" data-toggle="collapse"
                                    href="#dropdown-lvl7" data-category="4">
                                    <i class="glyphicon glyphicon-off"></i>
                                    <p> Endocinology <span class="caret"></span></p>
                                </a>
                                <div id="dropdown-lvl7" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav" id="doctor-endocrinology-records"></ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <!-- Dropdown-->
            <li class="nav-item" id="dropdown">
                <a class="nav-link" data-toggle="collapse" href="#dropdown-lvl15">
                    <i class="material-icons">library_books</i>
                    <p>Devices Manager
                        <span class="caret"></span>
                    </p>

                </a>
                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl15" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('devices') }}">
                                    <p>Device Show</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('deviceOrder') }}">
                                    <p>Device Request</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>


            <li class="nav-item ">
                <a class="nav-link" href="{{ route('articles.index', ['category' => 1]) }}">
                    <i class="material-symbols-outlined">
                        auto_stories
                    </i>
                    <p>Artical Management</p>
                </a>
            </li>


            <li class="nav-item ">
                <a class="nav-link" href="{{ route('ambulance_order') }}">
                    <i class="material-symbols-outlined">
                        local_shipping
                    </i>
                    <p>Ambulance Requests</p>
                </a>
            </li>

        </ul>
    </div>
</div>
