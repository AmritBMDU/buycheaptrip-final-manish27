<?php
include "../../connection.php";
session_start();
if (($_SESSION["userid"] == "")) {
  header("Location:../index");
}
?>
<style>
  iframe {
    width: 100%;
    height: 400px;
    background-size: 100% 100%;
  }

  .about {
    background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
  }

  .our {
    background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);

  }

  .donate {
    background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
  }

  .event {
    background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
  }

  .team {
    background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
  }

  .news {
    background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
  }

  .setting {
    background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
  }

  .home {
    background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
  }
</style>
<?php $page = 'home';
include("./incluede/header.php") ?>
<!-- adminx-content-aside -->
<div class="adminx-content">
  <!-- <div class="adminx-aside">

        </div> -->
  <div class="adminx-main-content">
    <div class="container-fluid">
      <!-- BreadCrumb -->

      <div class="pb-3 text-center">
        <h1 style=" font-weight: 900;"><b><i>Welcome to Dashboard</i></b></h1>
        <hr>
      </div>
      <!-- BreadCrumb  end-->
      <!-- <div class="row">
        <div class="col-md-6 col-lg-3 d-flex">
          <div class="card border-0 home  text-white text-center mb-grid w-100 ">
            <div class="d-flex flex-row align-items-center h-100">
              <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                <i data-feather="home"></i>
              </div>
              <div class="card-body">
                <a href="../default/all_slider"><span style="color:white;font-size:20px;display:block;font-weight:300px;">Home</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex">
          <div class="card border-0 about text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
              <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                <i data-feather="user"></i>
              </div>
              <div class="card-body">
                <a href="../default/all_about"><span style="color:white;font-size:20px;display:block; font-weight:300px;">About</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex">
          <div class="card border-0 our text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
              <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                <i data-feather="pie-chart"></i>
              </div>
              <div class="card-body">
                <a href="../default/all_our_initatives"><span style="color:white;font-size:20px;display:block; font-weight:300px;">Our Initatives</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex">
          <div class="card border-0 event text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
              <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                <i data-feather="zap"></i>
              </div>
              <div class="card-body">
                <a href="../default/all_event_current"><span style="color:white;font-size:20px;display:block; font-weight:300px;">Events</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex">
          <div class="card border-0 news text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
              <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                <i data-feather="tv"></i>
              </div>
              <div class="card-body">
                <a href="../default/all_news"><span style="color:white;font-size:20px;display:block; font-weight:300px;">News</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex">
          <div class="card border-0 team text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
              <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                <i data-feather="users"></i>
              </div>
              <div class="card-body">
                <a href="../default/all_team"><span style="color:white;font-size:20px;display:block; font-weight:300px;">Team</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex">
          <div class="card border-0 donate text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
              <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                <i data-feather="bell"></i>
              </div>
              <div class="card-body">
                <a href="../default/all_donate"><span style="color:white;font-size:20px;display:block; font-weight:300px;">Donate</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex">
          <div class="card border-0 setting text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
              <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                <i data-feather="settings"></i>
              </div>
              <div class="card-body">
                <a href="../default/all_logo"><span style="color:white;font-size:20px;display:block; font-weight:300px;">Setting</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-12 d-flex">
          <iframe src="https://www.google.com/maps/embed?pb=!1m22!1m8!1m3!1d3559.812242883345!2d80.99595371504356!3d26.845923533156387!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d26.8460012!2d80.9982661!4m5!1s0x399be371dfa4585d%3A0xe643138598743932!2sanchtechnologies!3m2!1d26.8459552!2d80.9980842!5e0!3m2!1sen!2sin!4v1683116548676!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div> -->
    </div>
  </div>

</div>
</div>
</div>
<?php include("./incluede/footer.php"); ?>