<?php
$role = $_SESSION['lvl'];
$sno =  $_SESSION['id'];
?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Montessori</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href=""><i class="fas fa-bars"></i></button><!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="./dashboard.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <?php
                    if ($role == 1) {
                    ?>
                        <a class="nav-link" href="./users.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Users
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudents" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Students
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseStudents" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./students.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    College Students Enrolled
                                </a>
                                <a class="nav-link" href="./PendingStudents.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    College Students Pending
                                </a>
                                <a class="nav-link" href="./shsStudents.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    SHS Student Enrolled
                                </a>
                                <a class="nav-link" href="./shsStudentsPend.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    SHS Student Pending
                                </a>
                            </nav>
                        </div>

                        <a class="nav-link" href="./course.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Courses
                        </a>
                        <a class="nav-link" href="./strands.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Strand
                        </a>
                        <a class="nav-link" href="./subjects.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Subjects
                        </a>
                        <a class="nav-link" href="./accounts.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Accounts
                        </a>
                        <a class="nav-link" href="./sections.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Section Offering
                        </a>
                        <a class="nav-link" href="./fees.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Fees
                        </a>
                        <a class="nav-link" href="./schoolyear.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            School Year
                        </a>
                        <a class="nav-link" href="./sem.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Semester
                        </a>
                        <a class="nav-link" href="./message.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Message
                        </a>
                    <?php
                    } else {
                    ?>

                        <?php
                        $isShs = strpos($sno, 'shs') !== false ? 'shs' : 'college';
                        ?>

                        <a class="nav-link" href="./message.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Message
                        </a>
                        <?php
                        if ($isShs == 'college') {
                        ?>
                            <a class="nav-link" href="./StudentProfile.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                profile
                            </a>
                            <a class="nav-link" href="./sectionoffering.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Section Offering
                            </a>
                            <a class="nav-link" href="./registration.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Registration
                            </a>
                            <a class="nav-link" href="./studentaccounts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                My Accounts
                            </a>

                        <?php } else {
                        ?>
                            <a class="nav-link" href="./sectionoffering.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                SHS Section Offering
                            </a>

                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                //role
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">