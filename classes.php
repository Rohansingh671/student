<?php

session_start();

require_once 'php/databaseConnection.php';

if (!isset($_SESSION['userEmail'])) {
    header("Location: login-2.php");
    exit();
}
$userEmail = $_SESSION['userEmail'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Preskool - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
    <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Preskool Admin Template</title>

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <script src="js/theme-script.js" type="6bf8b19fe6833c5e9d01c30b-text/javascript"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/feather.css">

    <link rel="stylesheet" href="css/tabler-icons.css">

    <link rel="stylesheet" href="css/daterangepicker.css">

    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="css/select2.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="index.php" class="logo logo-normal">
                    <img src="images/logo.svg" alt="Logo">
                </a>
                <a href="index.php" class="logo-small">
                    <img src="images/logo-small.svg" alt="Logo">
                </a>
                <a href="index.php" class="dark-logo">
                    <img src="images/logo-dark.svg" alt="Logo">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                    <i class="ti ti-menu-deep"></i>
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <div class="header-user">
                <div class="nav user-menu">

                    <div class="nav-item nav-search-inputs me-auto">
                        <div class="top-nav-search">
                            <a href="javascript:void(0);" class="responsive-search">
                                <i class="fa fa-search"></i>
                            </a>
                            <form action="#" class="dropdown">
                                <div class="searchinputs" id="dropdownMenuClickable">
                                    <input type="text" placeholder="Search">
                                    <div class="search-addon">
                                        <button type="submit"><i class="ti ti-command"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown me-2">
                            <a href="#" class="btn btn-outline-light fw-normal bg-white d-flex align-items-center p-2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-calendar-due me-1"></i>Academic Year : 2024 / 2025
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
                                    Academic Year : 2023 / 2024
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
                                    Academic Year : 2022 / 2023
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
                                    Academic Year : 2021 / 2022
                                </a>
                            </div>
                        </div>
                        <div class="pe-1 ms-1">
                            <div class="dropdown">
                                <a href="#" class="btn btn-outline-light bg-white btn-icon d-flex align-items-center me-1 p-2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="images/us.png" alt="Language" class="img-fluid rounded-pill">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0);" class="dropdown-item active d-flex align-items-center">
                                        <img class="me-2 rounded-pill" src="images/us.png" alt="Img" height="22" width="22"> English
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
                                        <img class="me-2 rounded-pill" src="images/fr.png" alt="Img" height="22" width="22"> French
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
                                        <img class="me-2 rounded-pill" src="images/es.png" alt="Img" height="22" width="22"> Spanish
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
                                        <img class="me-2 rounded-pill" src="images/de.png" alt="Img" height="22" width="22"> German
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="pe-1">
                            <div class="dropdown">
                                <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-square-rounded-plus"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right border shadow-sm dropdown-md">
                                    <div class="p-3 border-bottom">
                                        <h5>Add New</h5>
                                    </div>
                                    <div class="p-3 pb-0">
                                        <div class="row gx-2">
                                            <div class="col-6">
                                                <a href="add-student.php" class="d-block bg-primary-transparent ronded p-2 text-center mb-3 class-hover">
                                                    <div class="avatar avatar-lg mb-2">
                                                        <span class="d-inline-flex align-items-center justify-content-center w-100 h-100 bg-primary rounded-circle"><i class="ti ti-school"></i></span>
                                                    </div>
                                                    <p class="text-dark">Students</p>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="add-teacher.php" class="d-block bg-success-transparent ronded p-2 text-center mb-3 class-hover">
                                                    <div class="avatar avatar-lg mb-2">
                                                        <span class="d-inline-flex align-items-center justify-content-center w-100 h-100 bg-success rounded-circle"><i class="ti ti-users"></i></span>
                                                    </div>
                                                    <p class="text-dark">Teachers</p>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="add-staff.php" class="d-block bg-warning-transparent ronded p-2 text-center mb-3 class-hover">
                                                    <div class="avatar avatar-lg rounded-circle mb-2">
                                                        <span class="d-inline-flex align-items-center justify-content-center w-100 h-100 bg-warning rounded-circle"><i class="ti ti-users-group"></i></span>
                                                    </div>
                                                    <p class="text-dark">Staffs</p>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="add-invoice.php" class="d-block bg-info-transparent ronded p-2 text-center mb-3 class-hover">
                                                    <div class="avatar avatar-lg mb-2">
                                                        <span class="d-inline-flex align-items-center justify-content-center w-100 h-100 bg-info rounded-circle"><i class="ti ti-license"></i></span>
                                                    </div>
                                                    <p class="text-dark">Invoice</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pe-1">
                            <a href="#" id="dark-mode-toggle" class="dark-mode-toggle activate btn btn-outline-light bg-white btn-icon me-1">
                                <i class="ti ti-moon"></i>
                            </a>
                            <a href="#" id="light-mode-toggle" class="dark-mode-toggle btn btn-outline-light bg-white btn-icon me-1">
                                <i class="ti ti-brightness-up"></i>
                            </a>
                        </div>
                        <div class="pe-1" id="notification_item">
                            <a href="#" class="btn btn-outline-light bg-white btn-icon position-relative me-1" id="notification_popup">
                                <i class="ti ti-bell"></i>
                                <span class="notification-status-dot"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end notification-dropdown p-4">
                                <div class="d-flex align-items-center justify-content-between border-bottom p-0 pb-3 mb-3">
                                    <h4 class="notification-title">Notifications (2)</h4>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="text-primary fs-15 me-3 lh-1">Mark all as read</a>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="bg-white dropdown-toggle" data-bs-toggle="dropdown"><i class="ti ti-calendar-due me-1"></i>Today
                                            </a>
                                            <ul class="dropdown-menu mt-2 p-3">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                                        This Week
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                                        Last Week
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                                        Last Week
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti-content">
                                    <div class="d-flex flex-column">
                                        <div class="border-bottom mb-3 pb-3">
                                            <a href="activities.php">
                                                <div class="d-flex">
                                                    <span class="avatar avatar-lg me-2 flex-shrink-0">
                                                        <img src="images/avatar-27.jpg" alt="Profile">
                                                    </span>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1"><span class="text-dark fw-semibold">Shawn</span> performance in Math is
                                                            below the threshold.</p>
                                                        <span>Just Now</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="border-bottom mb-3 pb-3">
                                            <a href="activities.php" class="pb-0">
                                                <div class="d-flex">
                                                    <span class="avatar avatar-lg me-2 flex-shrink-0">
                                                        <img src="images/avatar-23.jpg" alt="Profile">
                                                    </span>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1"><span class="text-dark fw-semibold">Sylvia</span> added appointment on
                                                            02:00 PM</p>
                                                        <span>10 mins ago</span>
                                                        <div class="d-flex justify-content-start align-items-center mt-1">
                                                            <span class="btn btn-light btn-sm me-2">Deny</span>
                                                            <span class="btn btn-primary btn-sm">Approve</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="border-bottom mb-3 pb-3">
                                            <a href="activities.php">
                                                <div class="d-flex">
                                                    <span class="avatar avatar-lg me-2 flex-shrink-0">
                                                        <img src="images/avatar-25.jpg" alt="Profile">
                                                    </span>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">New student record <span class="text-dark fw-semibold"> George</span> is
                                                            created by <span class="text-dark fw-semibold"> Teressa</span></p>
                                                        <span>2 hrs ago</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="border-0 mb-3 pb-0">
                                            <a href="activities.php">
                                                <div class="d-flex">
                                                    <span class="avatar avatar-lg me-2 flex-shrink-0">
                                                        <img src="images/avatar-01.jpg" alt="Profile">
                                                    </span>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">A new teacher record for <span class="text-dark fw-semibold">Elisa</span>
                                                        </p>
                                                        <span>09:45 AM</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex p-0">
                                    <a href="#" class="btn btn-light w-100 me-2">Cancel</a>
                                    <a href="activities.php" class="btn btn-primary w-100">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="pe-1">
                            <a href="chat.php" class="btn btn-outline-light bg-white btn-icon position-relative me-1">
                                <i class="ti ti-brand-hipchat"></i>
                                <span class="chat-status-dot"></span>
                            </a>
                        </div>
                        <div class="pe-1">
                            <a href="#" class="btn btn-outline-light bg-white btn-icon me-1">
                                <i class="ti ti-chart-bar"></i>
                            </a>
                        </div>
                        <div class="pe-1">
                            <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" id="btnFullscreen">
                                <i class="ti ti-maximize"></i>
                            </a>
                        </div>
                        <div class="dropdown ms-1">
                            <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                                <span class="avatar avatar-md rounded">
                                    <img src="images/avatar-27.jpg" alt="Img" class="img-fluid">
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="d-block">
                                    <div class="d-flex align-items-center p-2">
                                        <span class="avatar avatar-md me-2 online avatar-rounded">
                                            <img src="images/avatar-27.jpg" alt="img">
                                        </span>
                                        <div>
                                            <h6 class="">Kevin Larry</h6>
                                            <p class="text-primary mb-0">Administrator</p>
                                        </div>
                                    </div>
                                    <hr class="m-0">
                                    <a class="dropdown-item d-inline-flex align-items-center p-2" href="login.php"><i class="ti ti-login me-2"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="profile.php">My Profile</a>
                    <a class="dropdown-item" href="profile-settings.php">Settings</a>
                    <a class="dropdown-item" href="login.php">Logout</a>
                </div>
            </div>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="javascript:void(0);" class="d-flex align-items-center border bg-white rounded p-2 mb-4">
                                <img src="./images/arialogo.jpg" class="avatar avatar-md img-fluid rounded" alt="Profile">
                                <span class="text-dark ms-2 fw-normal">Aria Education</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-layout-dashboard"></i><span>Dashboard</span><span class="menu-arrow" hidden></span></a>
                                    <ul>
                                        <li><a href="index.php" class="active">Admin Dashboard</a></li>
                                        <li hidden><a href="teacher-dashboard.php">Teacher Dashboard</a></li>
                                        <li hidden><a href="student-dashboard.php">Student Dashboard</a></li>
                                        <li hidden><a href="parent-dashboard.php">Parent Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);"><i class="ti ti-layout-list"></i><span>Application</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="chat.php">Chat</a></li>
                                        <li><a href="call.php">Call</a></li>
                                        <li><a href="calendar.php">Calendar</a></li>
                                        <li><a href="email.php">Email</a></li>
                                        <li><a href="todo.php">To Do</a></li>
                                        <li><a href="notes.php">Notes</a></li>
                                        <li><a href="file-manager.php">File Manager</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li hidden>
                            <h6 class="submenu-hdr"><span>Layout</span></h6>
                            <ul>
                                <li><a href="layout-default.php"><i class="ti ti-layout-sidebar"></i><span>Default
                                        </span></a></li>
                                <li><a href="layout-mini.php"><i class="ti ti-layout-align-left"></i><span>Mini</span></a></li>
                                <li><a href="layout-rtl.php"><i class="ti ti-text-direction-rtl"></i><span>RTL</span></a></li>
                                <li><a href="layout-box.php"><i class="ti ti-layout-distribute-vertical"></i><span>Box</span></a></li>
                                <li><a href="layout-dark.php"><i class="ti ti-moon"></i><span>Dark</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-school"></i><span>Students</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="student-grid.php">All Students</a></li>
                                        <li><a href="students.php">Student List</a></li>
                                        <li hidden><a href="student-details.php">Student Details</a></li>
                                        <li hidden><a href="student-promotion.php">Student Promotion</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);"><i class="ti ti-user-bolt"></i><span>Parents</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="parent-grid.php">All Parents</a></li>
                                        <li><a href="parents.php">Parent List</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);"><i class="ti ti-user-shield"></i><span>Guardians</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="guardian-grid.php">All Guardians</a></li>
                                        <li><a href="guardians.php">Guardian List</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-users"></i><span>Teachers</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="teacher-grid.php">All Teachers</a></li>
                                        <li><a href="teachers.php">Teacher List</a></li>
                                        <li hidden><a href="teacher-details.php">Teacher Details</a></li>
                                        <li hidden><a href="routine-teachers.php">Routine</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                            <li class="active">
                                    <a href="classes.php"><i
                                            class="ti ti-school-bell"></i><span>Classes</span></a>
                                    <ul hidden>
                                        <li><a href="classes.php">All Classes</a></li>
                                        <li><a href="schedule-classes.php">Schedule</a></li>
                                    </ul>
                                </li>
                                <li hidden><a href="class-room.php"><i class="ti ti-building"></i><span>Class Room</span></a>
                                </li>
                                <li hidden><a href="class-routine.php"><i class="ti ti-bell-school"></i><span>Class
                                            Routine</span></a></li>
                                <li hidden><a href="class-section.php"><i class="ti ti-square-rotated-forbid-2"></i><span>Section</span></a></li>
                                <li><a href="class-subject.php"><i class="ti ti-book"></i><span>Subject</span></a></li>
                                <li hidden><a href="class-syllabus.php"><i class="ti ti-book-upload"></i><span>Syllabus</span></a></li>
                                <li hidden><a href="class-time-table.php"><i class="ti ti-table"></i><span>Time
                                            Table</span></a></li>
                                <li hidden><a href="class-home-work.php"><i class="ti ti-license"></i><span>Home
                                            Work</span></a></li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);"><i class="ti ti-hexagonal-prism-plus"></i><span>Examinations</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="exam.php">Exam</a></li>
                                        <li><a href="exam-schedule.php">Exam Schedule</a></li>
                                        <li><a href="grade.php">Grade</a></li>
                                        <li><a href="exam-attendance.php">Exam Attendance</a></li>
                                        <li><a href="exam-results.php">Exam Results</a></li>
                                    </ul>
                                </li>
                                <li hidden><a href="academic-reasons.php"><i class="ti ti-lifebuoy"></i><span>Reasons</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-report-money"></i><span>Fees
                                            Collection</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="fees-group.php">Fees Group</a></li>
                                        <li hidden><a href="fees-type.php">Fees Type</a></li>
                                        <li><a href="fees-master.php">Fees Master</a></li>
                                        <li hidden><a href="fees-assign.php">Fees Assign</a></li>
                                        <li hidden><a href="collect-fees.php">Collect Fees</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);"><i class="ti ti-notebook"></i><span>Library</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="library-members.php">Library Members</a></li>
                                        <li><a href="library-books.php">Books</a></li>
                                        <li><a href="library-issue-book.php">Issue Book</a></li>
                                        <li><a href="library-return.php">Return</a></li>
                                    </ul>
                                </li>
                                <li hidden><a href="sports.php"><i class="ti ti-run"></i><span>Sports</span></a></li>
                                <li hidden><a href="players.php"><i class="ti ti-play-football"></i><span>Players</span></a>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);"><i class="ti ti-building-fortress"></i><span>Hostel</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="hostel-list.php">Hostel List</a></li>
                                        <li><a href="hostel-rooms.php">Hostel Rooms</a></li>
                                        <li><a href="hostel-room-type.php">Room Type</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);"><i class="ti ti-bus"></i><span>Transport</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="transport-routes.php">Routes</a></li>
                                        <li><a href="transport-pickup-points.php">Pickup Points</a></li>
                                        <li><a href="transport-vehicle-drivers.php">Vehicle Drivers</a></li>
                                        <li><a href="transport-vehicle.php">Vehicle</a></li>
                                        <li><a href="transport-assign-vehicle.php">Assign Vehicle</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li hidden>
                            <h6 class="submenu-hdr"><span>HRM</span></h6>
                            <ul>
                                <li><a href="staffs.php"><i class="ti ti-users-group"></i><span>Staffs</span></a></li>
                                <li><a href="departments.php"><i class="ti ti-layout-distribute-horizontal"></i><span>Departments</span></a>
                                </li>
                                <li><a href="designation.php"><i class="ti ti-user-exclamation"></i><span>Designation</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-calendar-share"></i><span>Attendance</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="student-attendance.php">Student Attendance</a></li>
                                        <li><a href="teacher-attendance.php">Teacher Attendance</a></li>
                                        <li><a href="staff-attendance.php">Staff Attendance</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);"><i class="ti ti-calendar-stats"></i><span>Leaves</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="list-leaves.php">List of leaves</a></li>
                                        <li><a href="approve-request.php">Approve Request</a></li>
                                    </ul>
                                </li>
                                <li><a href="holidays.php"><i class="ti ti-briefcase"></i><span>Holidays</span></a>
                                </li>
                                <li><a href="payroll.php"><i class="ti ti-moneybag"></i><span>Payroll</span></a></li>
                            </ul>
                        </li>
                        <li hidden>
                            <h6 class="submenu-hdr"><span>Finance &amp; Accounts</span></h6>
                            <ul>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-swipe"></i><span>Accounts</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="expenses.php">Expenses</a></li>
                                        <li><a href="expenses-category.php">Expense Category</a></li>
                                        <li><a href="accounts-income.php">Income</a></li>
                                        <li><a href="accounts-invoices.php">Invoices</a></li>
                                        <li><a href="invoice.php">Invoice View</a></li>
                                        <li><a href="accounts-transactions.php">Transactions</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li hidden>
                            <h6 class="submenu-hdr"><span>Announcements</span></h6>
                            <ul>
                                <li><a href="notice-board.php"><i class="ti ti-clipboard-data"></i><span>Notice
                                            Board</span></a></li>
                                <li><a href="events.php"><i class="ti ti-calendar-question"></i><span>Events</span></a>
                                </li>
                            </ul>
                        </li>
                        <li hidden>
                            <h6 class="submenu-hdr"><span>Reports</span></h6>
                            <ul>
                                <li><a href="attendance-report.php"><i class="ti ti-calendar-due"></i><span>Attendance
                                            Report</span></a></li>
                                <li><a href="class-report.php"><i class="ti ti-graph"></i><span>Class Report</span></a>
                                </li>
                                <li><a href="student-report.php"><i class="ti ti-chart-infographic"></i><span>Student
                                            Report</span></a></li>
                                <li><a href="grade-report.php"><i class="ti ti-calendar-x"></i><span>Grade
                                            Report</span></a></li>
                                <li><a href="leave-report.php"><i class="ti ti-line"></i><span>Leave Report</span></a>
                                </li>
                                <li><a href="fees-report.php"><i class="ti ti-mask"></i><span>Fees Report</span></a>
                                </li>
                            </ul>
                        </li>
                        <li hidden>
                            <h6 class="submenu-hdr"><span>User Management</span></h6>
                            <ul>
                                <li><a href="users.php"><i class="ti ti-users-minus"></i><span>Users</span></a></li>
                                <li><a href="roles-permission.php"><i class="ti ti-shield-plus"></i><span>Roles &amp;
                                            Permissions</span></a></li>
                                <li><a href="delete-account.php"><i class="ti ti-user-question"></i><span>Delete
                                            Account Request</span></a></li>
                            </ul>
                        </li>
                        <li hidden>
                            <h6 class="submenu-hdr"><span>Membership</span></h6>
                            <ul>
                                <li><a href="membership-plans.php"><i class="ti ti-user-plus"></i><span>Membership
                                            Plans</span></a></li>
                                <li><a href="membership-addons.php"><i class="ti ti-cone-plus"></i><span>Membership
                                            Addons</span></a></li>
                                <li><a href="membership-transactions.php"><i class="ti ti-file-power"></i><span>Transactions</span></a></li>
                            </ul>
                        </li>
                        <li hidden>
                            <h6 class="submenu-hdr"><span>Content</span></h6>
                            <ul>
                                <li><a href="pages.php"><i class="ti ti-page-break"></i><span>Pages</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-brand-blogger"></i><span>Blog</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="blog.php">All Blogs</a></li>
                                        <li><a href="blog-categories.php">Categories</a></li>
                                        <li><a href="blog-comments.php">Comments</a></li>
                                        <li><a href="blog-tags.php">Tags</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-map-pin-search"></i><span>Location</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="countries.php">Countries</a></li>
                                        <li><a href="states.php">States</a></li>
                                        <li><a href="cities.php">Cities</a></li>
                                    </ul>
                                </li>
                                <li><a href="testimonials.php"><i class="ti ti-quote"></i><span>Testimonials</span></a>
                                </li>
                                <li><a href="faq.php"><i class="ti ti-question-mark"></i><span>FAQ</span></a></li>
                            </ul>
                        </li>
                        <li hidden>
                            <h6 class="submenu-hdr"><span>Support</span></h6>
                            <ul>
                                <li><a href="contact-messages.php"><i class="ti ti-message"></i><span>Contact
                                            Messages</span></a></li>
                                <li><a href="tickets.php"><i class="ti ti-ticket"></i><span>Tickets</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li hidden><a href="profile.php"><i class="ti ti-user"></i><span>Profile</span></a></li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-lock-open"></i><span>Authentication</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="login-2.php" class="">Login<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li hidden><a href="login.php">Cover</a></li>
                                                <li hidden><a href="login-2.php">Illustration</a></li>
                                                <li hidden><a href="login-3.php">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);" class="">Register<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="register.php">Cover</a></li>
                                                <li><a href="register-2.php">Illustration</a></li>
                                                <li><a href="register-3.php">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot
                                                Password<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="forgot-password.php">Cover</a></li>
                                                <li><a href="forgot-password-2.php">Illustration</a></li>
                                                <li><a href="forgot-password-3.php">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Reset
                                                Password<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="reset-password.php">Cover</a></li>
                                                <li><a href="reset-password-2.php">Illustration</a></li>
                                                <li><a href="reset-password-3.php">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two" hidden><a href="javascript:void(0);">Email
                                                Verification<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="email-verification.php">Cover</a></li>
                                                <li><a href="email-verification-2.php">Illustration</a></li>
                                                <li><a href="email-verification-3.php">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two" hidden><a href="javascript:void(0);">2 Step
                                                Verification<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="two-step-verification.php">Cover</a></li>
                                                <li><a href="two-step-verification-2.php">Illustration</a></li>
                                                <li><a href="two-step-verification-3.php">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="lock-screen.php">Lock Screen</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-error-404"></i><span>Error Pages</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="404-error.php">404 Error</a></li>
                                        <li><a href="500-error.php">500 Error</a></li>
                                    </ul>
                                </li>
                                <li hidden><a href="blank-page.php"><i class="ti ti-brand-nuxt"></i><span>Blank
                                            Page</span></a></li>
                                <li hidden><a href="coming-soon.php"><i class="ti ti-file"></i><span>Coming Soon</span></a>
                                </li>
                                <li hidden><a href="under-maintenance.php"><i class="ti ti-moon-2"></i><span>Under
                                            Maintenance</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-shield-cog"></i><span>General Settings</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="profile-settings.php">Profile Settings</a></li>
                                        <li><a href="security-settings.php">Security Settings</a></li>
                                        <li><a href="notifications-settings.php">Notifications Settings</a></li>
                                        <li><a href="connected-apps.php">Connected Apps</a></li>
                                    </ul>
                                </li>

                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-device-laptop"></i><span>Website Settings</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="company-settings.php">Company Settings</a></li>
                                        <li><a href="localization.php">Localization</a></li>
                                        <li><a href="prefixes.php">Prefixes</a></li>
                                        <li><a href="preferences.php">Preferences</a></li>
                                        <li><a href="social-authentication.php">Social Authentication</a></li>
                                        <li><a href="language.php">Language</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-apps"></i><span>App Settings</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="invoice-settings.php">Invoice Settings</a></li>
                                        <li><a href="custom-fields.php">Custom Fields</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-file-symlink"></i><span>System Settings</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="email-settings.php">Email Settings</a></li>
                                        <li><a href="email-templates.php">Email Templates</a></li>
                                        <li><a href="sms-settings.php">SMS Settings</a></li>
                                        <li><a href="otp-settings.php">OTP</a></li>
                                        <li><a href="gdpr-cookies.php">GDPR Cookies</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-zoom-money"></i><span>Financial Settings</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="payment-gateways.php">Payment Gateways </a></li>
                                        <li><a href="tax-rates.php">Tax Rates</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-calendar-repeat"></i><span>Academic Settings</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="school-settings.php">School Settings </a></li>
                                        <li><a href="religion.php">Religion</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-flag-cog"></i><span>Other Settings</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="storage.php">Storage</a></li>
                                        <li><a href="ban-ip-address.php">Ban IP Address</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li hidden>
                            <h6 class="submenu-hdr"><span>UI Interface</span></h6>
                            <ul>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-hierarchy-2"></i><span>Base UI</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="ui-alerts.php">Alerts</a></li>
                                        <li><a href="ui-accordion.php">Accordion</a></li>
                                        <li><a href="ui-avatar.php">Avatar</a></li>
                                        <li><a href="ui-badges.php">Badges</a></li>
                                        <li><a href="ui-borders.php">Border</a></li>
                                        <li><a href="ui-buttons.php">Buttons</a></li>
                                        <li><a href="ui-buttons-group.php">Button Group</a></li>
                                        <li><a href="ui-breadcrumb.php">Breadcrumb</a></li>
                                        <li><a href="ui-cards.php">Card</a></li>
                                        <li><a href="ui-carousel.php">Carousel</a></li>
                                        <li><a href="ui-colors.php">Colors</a></li>
                                        <li><a href="ui-dropdowns.php">Dropdowns</a></li>
                                        <li><a href="ui-grid.php">Grid</a></li>
                                        <li><a href="ui-images.php">Images</a></li>
                                        <li><a href="ui-lightbox.php">Lightbox</a></li>
                                        <li><a href="ui-media.php">Media</a></li>
                                        <li><a href="ui-modals.php">Modals</a></li>
                                        <li><a href="ui-offcanvas.php">Offcanvas</a></li>
                                        <li><a href="ui-pagination.php">Pagination</a></li>
                                        <li><a href="ui-popovers.php">Popovers</a></li>
                                        <li><a href="ui-progress.php">Progress</a></li>
                                        <li><a href="ui-placeholders.php">Placeholders</a></li>
                                        <li><a href="ui-spinner.php">Spinner</a></li>
                                        <li><a href="ui-sweetalerts.php">Sweet Alerts</a></li>
                                        <li><a href="ui-nav-tabs.php">Tabs</a></li>
                                        <li><a href="ui-toasts.php">Toasts</a></li>
                                        <li><a href="ui-tooltips.php">Tooltips</a></li>
                                        <li><a href="ui-typography.php">Typography</a></li>
                                        <li><a href="ui-video.php">Video</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-hierarchy-3"></i><span>Advanced UI</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="ui-ribbon.php">Ribbon</a></li>
                                        <li><a href="ui-clipboard.php">Clipboard</a></li>
                                        <li><a href="ui-drag-drop.php">Drag &amp; Drop</a></li>
                                        <li><a href="ui-rangeslider.php">Range Slider</a></li>
                                        <li><a href="ui-rating.php">Rating</a></li>
                                        <li><a href="ui-text-editor.php">Text Editor</a></li>
                                        <li><a href="ui-counter.php">Counter</a></li>
                                        <li><a href="ui-scrollbar.php">Scrollbar</a></li>
                                        <li><a href="ui-stickynote.php">Sticky Note</a></li>
                                        <li><a href="ui-timeline.php">Timeline</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);"><i class="ti ti-chart-line"></i>
                                        <span>Charts</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="chart-apex.php">Apex Charts</a></li>
                                        <li><a href="chart-c3.php">Chart C3</a></li>
                                        <li><a href="chart-js.php">Chart Js</a></li>
                                        <li><a href="chart-morris.php">Morris Charts</a></li>
                                        <li><a href="chart-flot.php">Flot Charts</a></li>
                                        <li><a href="chart-peity.php">Peity Charts</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);"><i class="ti ti-icons"></i>
                                        <span>Icons</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li><a href="icon-fontawesome.php">Fontawesome Icons</a></li>
                                        <li><a href="icon-feather.php">Feather Icons</a></li>
                                        <li><a href="icon-ionic.php">Ionic Icons</a></li>
                                        <li><a href="icon-material.php">Material Icons</a></li>
                                        <li><a href="icon-pe7.php">Pe7 Icons</a></li>
                                        <li><a href="icon-simpleline.php">Simpleline Icons</a></li>
                                        <li><a href="icon-themify.php">Themify Icons</a></li>
                                        <li><a href="icon-weather.php">Weather Icons</a></li>
                                        <li><a href="icon-typicon.php">Typicon Icons</a></li>
                                        <li><a href="icon-flag.php">Flag Icons</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);">
                                        <i class="ti ti-input-search"></i><span>Forms</span><span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);">Form Elements<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="form-basic-inputs.php">Basic Inputs</a></li>
                                                <li><a href="form-checkbox-radios.php">Checkbox &amp; Radios</a></li>
                                                <li><a href="form-input-groups.php">Input Groups</a></li>
                                                <li><a href="form-grid-gutters.php">Grid &amp; Gutters</a></li>
                                                <li><a href="form-select.php">Form Select</a></li>
                                                <li><a href="form-mask.php">Input Masks</a></li>
                                                <li><a href="form-fileupload.php">File Uploads</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two" hidden>
                                            <a href="javascript:void(0);">Layouts<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="form-horizontal.php">Horizontal Form</a></li>
                                                <li><a href="form-vertical.php">Vertical Form</a></li>
                                                <li><a href="form-floating-labels.php">Floating Labels</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="form-validation.php">Form Validation</a></li>
                                        <li><a href="form-select2.php">Select2</a></li>
                                        <li><a href="form-wizard.php">Form Wizard</a></li>
                                    </ul>
                                </li>
                                <li class="submenu" hidden>
                                    <a href="javascript:void(0);"><i class="ti ti-table-plus"></i><span>Tables</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="tables-basic.php">Basic Tables </a></li>
                                        <li><a href="data-tables.php">Data Table </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li hidden>
                            <h6 class="submenu-hdr"><span>Help</span></h6>
                            <ul>
                                <li><a href="https://preschool.dreamstechnologies.com/documentation/index.php"><i class="ti ti-file-text"></i><span>Documentation</span></a></li>
                                <li><a href="https://preschool.dreamstechnologies.com/documentation/changelog.php"><i class="ti ti-exchange"></i><span>Changelog</span><span class="badge badge-primary badge-xs text-white fs-10 ms-auto">v1.8.3</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-menu-2"></i><span>Multi
                                            Level</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="javascript:void(0);">Multilevel 1</a></li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Multilevel 2<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="javascript:void(0);">Multilevel 2.1</a></li>
                                                <li class="submenu submenu-two submenu-three"><a href="javascript:void(0);">Multilevel 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                                    <ul>
                                                        <li><a href="javascript:void(0);">Multilevel 2.2.1</a></li>
                                                        <li><a href="javascript:void(0);">Multilevel 2.2.2</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);">Multilevel 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="page-wrapper">
            <div class="content">

                <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                    <div class="my-auto mb-2">
                        <h3 class="page-title mb-1">Classes List</h3>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Classes </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All Classes</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                        <div class="pe-1 mb-2">
                            <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                                <i class="ti ti-refresh"></i>
                            </a>
                        </div>
                        <div class="pe-1 mb-2">
                            <button type="button" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print">
                                <i class="ti ti-printer"></i>
                            </button>
                        </div>
                        <div class="dropdown me-2 mb-2">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-light fw-medium d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                <i class="ti ti-file-export me-2"></i>Export
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-2">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_class"><i class="ti ti-square-rounded-plus-filled me-2"></i>Add
                                Class</a>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                        <h4 class="mb-3">Classes List</h4>
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="input-icon-start mb-3 me-2 position-relative">
                                <span class="icon-addon">
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <input type="text" class="form-control date-range bookingrange" placeholder="Select" value="Academic Year : 2024 / 2025">
                            </div>
                            <div class="dropdown mb-3 me-2">
                                <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="ti ti-filter me-2"></i>Filter</a>
                                <div class="dropdown-menu drop-width">
                                    <form action="classes.php">
                                        <div class="d-flex align-items-center border-bottom p-3">
                                            <h4>Filter</h4>
                                        </div>
                                        <div class="p-3 border-bottom pb-0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Class</label>
                                                        <select class="select">
                                                            <option>Select</option>
                                                            <option>I</option>
                                                            <option>II</option>
                                                            <option>III</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Section</label>
                                                        <select class="select">
                                                            <option>Select</option>
                                                            <option>A</option>
                                                            <option>B</option>
                                                            <option>C</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Status</label>
                                                        <select class="select">
                                                            <option>Select</option>
                                                            <option>Active</option>
                                                            <option>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 d-flex align-items-center justify-content-end">
                                            <a href="#" class="btn btn-light me-3">Reset</a>
                                            <button type="submit" class="btn btn-primary">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="dropdown mb-3">
                                <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle" data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort by A-Z
                                </a>
                                <ul class="dropdown-menu p-3">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1 active">
                                            Ascending
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Descending
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Recently Viewed
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Recently Added
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 py-3">

                        <div class="custom-datatable-filter table-responsive">
                            <table class="table datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="no-sort">
                                            <div class="form-check form-check-md">
                                                <input class="form-check-input" type="checkbox" id="select-all">
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Courses </th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    require_once 'php/classDataFromDatabase.php';
                                    foreach ($classes as $class) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-md">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                            </td>
                                            <td><a href="#" class="link-primary" data-bs-toggle="modal" data-bs-target="#view_class"><?php echo $class['classID']; ?></a></a></td>
                                            <td><?php echo $class['className']; ?></a></td>
                                            <td>
                                                <span class="badge badge-soft-success d-inline-flex align-items-center"><i class="ti ti-circle-filled fs-5 me-1"></i><?php echo $class['classStatus']; ?></a></span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-white btn-icon btn-sm d-flex align-items-center justify-content-center rounded-circle p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ti ti-dots-vertical fs-14"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right p-3">
                                                            <li>
                                                                <a class="dropdown-item rounded-1" href="classwise-student-list.php?class=<?php echo $class['className']; ?>"><i class="ti ti-menu me-2"></i>View Student</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item rounded-1" href="edit-class.php?id=<?php echo $class['ID']; ?>"><i class="ti ti-edit-circle me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item rounded-1" href="php/deleteClass.php?id=<?php echo $class['ID']; ?>"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>


        <div class="modal fade" id="add_class">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Class</h4>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>
                    <form action="php/addClass.php" method="POSt">
                        <div class="modal-body">
                            <div class="row">
                                <?php
                                require_once 'php/databaseConnection.php';

                                $mysqli = db_connect();

                                $result = $mysqli->query("SELECT classID FROM classdata ORDER BY ID DESC LIMIT 1");
                                $row = $result->fetch_row();

                                if ($row == null) {
                                    $total_class_id = 1; // Initialize $total_class_id here for the case where no rows are found
                                } else {
                                    $class_id = substr($row[0], 3);
                                    $total_class_id = $class_id + 1; // Correct variable used here
                                }
                                ?>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Class ID</label>
                                        <input type="text" class="form-control" name="classID" value="CID<?php echo $total_class_id ?>" readonly>
                                    </div>

                                <div class="mb-3">
                                    <label class="form-label">Class Name</label>
                                    <input type="text" class="form-control" name="className">
                                </div>
                                <div class="col-xxl col-xl-3 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="select" name="classStatus">
                                            <option value="">Select</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-primary">Add Class</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="edit_class">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Class</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="php/updateClass.php" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Class ID</label>
                                    <input type="text" class="form-control" placeholder="Enter Class ID" value="<?php echo htmlspecialchars($classID); ?>" name="classID" id="classID" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Class Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Class Name" value="<?php echo htmlspecialchars($className); ?>" name="className" id="className" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Section</label>
                                    <select class="select" name="classSection" id="classSection" required>
                                        <option disabled>Select</option>
                                        <option value="A" <?php if ($classSection == 'A') echo 'selected'; ?>>A</option>
                                        <option value="B" <?php if ($classSection == 'B') echo 'selected'; ?>>B</option>
                                        <option value="C" <?php if ($classSection == 'C') echo 'selected'; ?>>C</option>
                                        <option value="D" <?php if ($classSection == 'D') echo 'selected'; ?>>D</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No of Students</label>
                                    <input type="number" class="form-control" placeholder="Enter No of Students" value="<?php echo htmlspecialchars($numberOfStudent); ?>" name="numberOfStudent" id="numberOfStudent" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No of Subjects</label>
                                    <input type="number" class="form-control" placeholder="Enter No of Subjects" value="<?php echo htmlspecialchars($numberOfSubject); ?>" name="numberOfSubject" id="numberOfSubject" required>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="status-title">
                                        <h5>Status</h5>
                                        <p>Change the Status by toggling</p>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="classStatus" name="classStatus" <?php echo ($classStatus == 'Active') ? 'checked' : ''; ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="classes.php">
                    <div class="modal-body text-center">
                        <span class="delete-icon">
                            <i class="ti ti-trash-x"></i>
                        </span>
                        <h4>Confirm Deletion</h4>
                        <p>You want to delete all the marked items, this cant be undone once you delete.</p>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="view_class">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <h4 class="modal-title">Class Details</h4>
                        <span class="badge badge-soft-success ms-2"><i class="ti ti-circle-filled me-1 fs-5"></i>Active</span>
                    </div>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="classes.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="class-detail-info">
                                    <p>Class Name</p>
                                    <span>III</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="class-detail-info">
                                    <p>Section</p>
                                    <span>A</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="class-detail-info">
                                    <p>No of Subjects</p>
                                    <span>05</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="class-detail-info">
                                    <p>No of Students</p>
                                    <span>25</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>


    <script src="js/jquery-3.7.1.min.js" type="6bf8b19fe6833c5e9d01c30b-text/javascript"></script>

    <script src="js/bootstrap.bundle.min.js" type="6bf8b19fe6833c5e9d01c30b-text/javascript"></script>

    <script src="js/moment.js" type="6bf8b19fe6833c5e9d01c30b-text/javascript"></script>
    <script src="js/daterangepicker.js" type="6bf8b19fe6833c5e9d01c30b-text/javascript"></script>

    <script src="js/feather.min.js" type="6bf8b19fe6833c5e9d01c30b-text/javascript"></script>

    <script src="js/jquery.slimscroll.min.js" type="6bf8b19fe6833c5e9d01c30b-text/javascript"></script>

    <script src="js/jquery.dataTables.min.js" type="6bf8b19fe6833c5e9d01c30b-text/javascript"></script>
    <script src="js/dataTables.bootstrap5.min.js" type="6bf8b19fe6833c5e9d01c30b-text/javascript"></script>

    <script src="js/select2.min.js" type="6bf8b19fe6833c5e9d01c30b-text/javascript"></script>

    <script src="js/script.js" type="6bf8b19fe6833c5e9d01c30b-text/javascript"></script>
    <script src="js/rocket-loader.min.js" data-cf-settings="6bf8b19fe6833c5e9d01c30b-|49" defer=""></script>
</body>

</html>
<script>
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            const classID = this.getAttribute('data-id');

            // AJAX request to fetch class details
            fetch(`fetch_class.php?classID=${classID}`)
                .then(response => response.json())
                .then(data => {
                    // Populate modal form with fetched data
                    document.getElementById('classID').value = data.classID;
                    document.getElementById('className').value = data.className;
                    document.getElementById('classSection').value = data.classSection;
                    document.getElementById('numberOfStudent').value = data.numberOfStudent;
                    document.getElementById('numberOfSubject').value = data.numberOfSubject;
                    document.getElementById('classStatus').checked = data.classStatus === 'Active';
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    });
</script>