<?php
include "../connection.php";
session_start();
if (($_SESSION["usersID"] == "")) {
  header("Location:../index");
}
?>

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="index.h">Home</a></li> -->
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
    </main><!-- End #main -->

   <?php include('footer.php'); ?>