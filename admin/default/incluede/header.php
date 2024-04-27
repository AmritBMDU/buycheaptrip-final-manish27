<!DOCTYPE html>
<html lang="en">

<head>
  <title>Administor of Bycheaptrip Travels</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="./dist/css/adminx.css" media="screen" />
  <style>
    .pb-3 {
      text-align: center;
    }
  </style>
</head>

<body class=" virat">
  <div class="adminx-container">
    <?php
    $query = "select * from admin_login";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <nav class="navbar navbar-expand justify-content-between fixed-top virat_1">
        <a class="navbar-brand mb-0 h1 d-none d-md-block" href="admin">
          <img src="../upload/<?php echo $row['image']; ?>" class="navbar-brand-image d-inline-block align-top mr-2" class="circle" alt="">

        </a>
        <div class="d-flex flex-1 d-block d-md-none">
          <a href="#" class="sidebar-toggle ml-3">
            <i data-feather="menu"></i>
          </a>
        </div>
        <ul class="navbar-nav d-flex justify-content-end mr-2">
          <li class="nav-item dropdown">
            <a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
              <img src="../upload/<?php echo $row['image']; ?>" class="d-inline-block align-top" class="rounded" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="admin_account">My Profile</a>
              <a class="dropdown-item" href="change_password">Change Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="../logout">Sign out</a>
            </div>
          </li>
        </ul>
      <?php
    }
      ?>
      </nav>
      <!-- expand-hover push -->
      <!-- Sidebar -->
      <div class="adminx-sidebar expand-hover push">
        <ul class="sidebar-nav">
          <li class="sidebar-nav-item">
            <a href="admin" class="sidebar-nav-link <?php if ($page == 'home') {
                                                      echo 'active';
                                                    } ?>">
              <span class="sidebar-nav-icon">
                <i data-feather="grid"></i>
              </span>
              <span class="sidebar-nav-name">
                Dashboard
              </span>
              <span class="sidebar-nav-end">
              </span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a class="sidebar-nav-link <?php if ($page == 'thailand') {
                                          echo 'active';
                                        } ?> collapsed" data-toggle="collapse" href="#examplepackage" aria-expanded="false" aria-controls="examplepackage">
              <span class="sidebar-nav-icon">
                <i data-feather="home"></i>
              </span>
              <span class="sidebar-nav-name">
              Thailand Package
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>
            <ul class="sidebar-sub-nav collapse" id="examplepackage">
              <!-- slider start -->
              <li class="sidebar-nav-item">
                <a href="../default/thailand_package" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Thailand Package Details
                  </span>
                </a>
              </li>
              <li class="sidebar-nav-item">
                <a href="../default/final_customer" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="edit-3"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Final Customer 
                  </span>
                </a>
              </li>
            </ul>
          </li>
          <!-- part1 Home -->
          <li class="sidebar-nav-item">
            <a class="sidebar-nav-link <?php if ($page == 'slider') {
                                          echo 'active';
                                        } ?> collapsed" data-toggle="collapse" href="#example" aria-expanded="false" aria-controls="example">
              <span class="sidebar-nav-icon">
                <i data-feather="home"></i>
              </span>
              <span class="sidebar-nav-name">
                City
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>
            <ul class="sidebar-sub-nav collapse" id="example">
              <!-- slider start -->
              <li class="sidebar-nav-item">
                <a href="../default/city_all" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    City All
                  </span>
                </a>
              </li>
              <li class="sidebar-nav-item">
                <!-- <a href="../default/all_slider" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="edit-3"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Show Slider
                  </span>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- slider end -->
          <!-- part home end -->
          <!-- part2 About -->
          <li class="sidebar-nav-item">
            <a class=" sidebar-nav-link <?php if ($page == 'about') {
                                          echo 'active';
                                        } ?> collapsed" data-toggle="collapse" href="#exampl_a" aria-expanded="false" aria-controls="exampl_a">
              <span class="sidebar-nav-icon">
                <i data-feather="user"></i>
              </span>
              <span class="sidebar-nav-name">
                Hotel
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>

            <ul class="sidebar-sub-nav collapse" id="exampl_a">
              <li class="sidebar-nav-item">
                <a href="../default/hotel_all" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Hotel All
                  </span>
                </a>
              </li>
              <!-- <li class="sidebar-nav-item">
                <a href=../default/all_about class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="edit-3"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    All About
                  </span>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- part about end -->
          <!-- part4  Our_Initatives -->
          <li class="sidebar-nav-item">
            <a class=" sidebar-nav-link <?php if ($page == 'our') {
                                          echo 'active';
                                        } ?> collapsed" data-toggle="collapse" href="#examp" aria-expanded="false" aria-controls="examp">
              <span class="sidebar-nav-icon">
                <i data-feather="pie-chart"></i>
              </span>
              <span class="sidebar-nav-name">
                hotel Categories
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>
            <ul class="sidebar-sub-nav collapse" id="examp">
              <li class="sidebar-nav-item">
                <a href="../default/hotel_category_all" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Hotel Categories
                  </span>
                </a>
              </li>
              <!--  <li class="sidebar-nav-item">
                <a href="../default/all_our_initatives" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="edit-3"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    All_Our_Initatives
                  </span>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- part Our_Initatives end -->
          <!-- part4  Events -->

          <!-- part News end -->
          <!-- part6  TEAM -->
          <li class="sidebar-nav-item">
            <a class=" sidebar-nav-link <?php if ($page == 'transport') {
                                          echo 'active';
                                        } ?> collapsed" data-toggle="collapse" href="#exa_team" aria-expanded="false" aria-controls="exa_team">
              <span class="sidebar-nav-icon">
                <i data-feather="users"></i>
              </span>
              <span class="sidebar-nav-name">
                Transport
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>
            <ul class="sidebar-sub-nav collapse" id="exa_team">
              <li class="sidebar-nav-item">
                <a href="../default/transport_all" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Transport All
                  </span>
                </a>
              </li>
              <!-- <li class="sidebar-nav-item">
                <a href="../default/all_team" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="edit-3"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    All Team
                  </span>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="sidebar-nav-item">
            <a class=" sidebar-nav-link <?php if ($page == 'transport') {
                                          echo 'active';
                                        } ?> collapsed" data-toggle="collapse" href="#exa_team89" aria-expanded="false" aria-controls="exa_team89">
              <span class="sidebar-nav-icon">
                <i data-feather="users"></i>
              </span>
              <span class="sidebar-nav-name">
                Transport Category
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>
            <ul class="sidebar-sub-nav collapse" id="exa_team89">
              <li class="sidebar-nav-item">
                <a href="../default/transport_category_all" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Transport Category
                  </span>
                </a>
              </li>
              <!-- <li class="sidebar-nav-item">
                <a href="../default/all_team" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="edit-3"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    All Team
                  </span>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- part donate end -->
          <li class="sidebar-nav-item">
            <a class=" sidebar-nav-link <?php if ($page == 'transport') {
                                          echo 'active';
                                        } ?> collapsed" data-toggle="collapse" href="#exa_team99" aria-expanded="false" aria-controls="exa_team99">
              <span class="sidebar-nav-icon">
                <i data-feather="users"></i>
              </span>
              <span class="sidebar-nav-name">
                SightSeeing
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>
            <ul class="sidebar-sub-nav collapse" id="exa_team99">
              <li class="sidebar-nav-item">
                <a href="../default/sightseeing_all" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    SightSeeing All
                  </span>
                </a>
              </li>
              <!-- <li class="sidebar-nav-item">
                <a href="../default/all_team" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="edit-3"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    All Team
                  </span>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="sidebar-nav-item">
            <a class=" sidebar-nav-link <?php if ($page == 'users') {
                                          echo 'active';
                                        } ?> collapsed" data-toggle="collapse" href="#exa_team98" aria-expanded="false" aria-controls="exa_team98">
              <span class="sidebar-nav-icon">
                <i data-feather="users"></i>
              </span>
              <span class="sidebar-nav-name">
                Users
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>
            <ul class="sidebar-sub-nav collapse" id="exa_team98">
              <li class="sidebar-nav-item">
                <a href="../default/users_active" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Active Users
                  </span>
                </a>
              </li>
              <li class="sidebar-nav-item">
                <a href="../default/users_pending_all" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Pending Users
                  </span>
                </a>
              </li>
              <li class="sidebar-nav-item">
                <a href="../default/users_reject" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="edit-3"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Reject User
                  </span>
                </a>
              </li>
            </ul>
          </li>
          <!-- part donate end -->

          <!-- part News end -->
          <!-- part7  Setting -->
          <li class="sidebar-nav-item">
            <a class=" sidebar-nav-link <?php if ($page == 'setting') {
                                          echo 'active';
                                        } ?> collapsed" data-toggle="collapse" href="#ex" aria-expanded="false" aria-controls="ex">
              <span class="sidebar-nav-icon">
                <i data-feather="settings"></i>
              </span>
              <span class="sidebar-nav-name">
                Setting
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>
            <ul class="sidebar-sub-nav collapse" id="ex">
              <!-- <li class="sidebar-nav-item">
                <a href="../default/all_logo" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="box"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Company Logo
                  </span>
                </a>
              </li> -->
              <li class="sidebar-nav-item">
                <a href="../default/background" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="disc"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Admin Backgound Images
                  </span>
                </a>
              </li>
              <!-- <li class="sidebar-nav-item">
                <a href="../default/all_footer" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="target"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Footer
                  </span>
                </a>
              </li> -->
              <!-- footer -->
            </ul>
            <!-- part Setting end -->
            <li class="sidebar-nav-item">
                <a href="../default/users_wallet" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="disc"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Wallet Details
                  </span>
                </a>
              </li>
              <li class="sidebar-nav-item">
                <a href="../default/thailand_payment" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="target"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Request Payments
                  </span>
                </a>
              </li>
              <li class="sidebar-nav-item">
                <a href="../default/manage_offer" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i data-feather="target"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Manage Offers
                  </span>
                </a>
              </li>
      </div><!-- Sidebar End -->