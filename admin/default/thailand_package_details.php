<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php $page = "";
include("./incluede/header.php") ?>

<form action="" method="post">
                            <section class="content">
                                <br>
                                <div class="box box-default">
                                    <br>
                                    <div class="row">
                                        <?php
                                        if(isset($_GET['reff_id'])) {
                                            $reff_id = $_GET['reff_id'];
                                            $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
                                            $sql = "SELECT * FROM thailand_customers WHERE reff_id = '$escaped_reff_id'";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                               ?>
                                        <div class="container">
                                            <div class="col-md-2">
                                                <b>Customer :</b>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo $row['customer_name']?> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <div class="col-md-2"> <b>Phone Number :</b> </div>
                                            <div class="col-md-4">
                                                <?php  echo $row['phone']?> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <div class="col-md-2">
                                                <b>Ref# :</b>
                                            </div>
                                            <div class="col-md-4">
                                                <?php echo $row['reff_id']?> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <div class="col-md-2">
                                                <b>Message :</b>
                                            </div>
                                            <div class="col-md-4">
                                                <textarea rows="30" cols="100" name="message" id="message" readonly>

Ref. No.: <?php echo $row['reff_id'] ?>

Dear <?php echo $row['customer_name'] ?>, Thank you as per our discussion please find below given package details.

<?php
$timestamp = strtotime($row['travel_date']);
$formatted_date = date("d M Y", $timestamp);
?>
*Travel Date: <?php echo $formatted_date; ?>*
*Passengers Details:- <?php echo $row['pax']; ?>


<?php
 if(isset($_GET['reff_id'])) {
    $reff_id = $_GET['reff_id'];
    $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
    $sql = "SELECT th.*, c.*, h.*,hc.*  
        FROM thailand_hotel th 
        JOIN cities c ON c.city_id = th.hotelcity_name
        JOIN hotels h ON h.hotel_id = th.hotels
        JOIN hotel_categories hc ON hc.prices = th.category_name
        WHERE th.reff_id = '$escaped_reff_id'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($hot = mysqli_fetch_assoc($result)) {
            ?>
<?php echo $hot['nights']  ?> Nights <?php echo $hot['city_name'] ?> (<?php echo $hot['hotel_name'] ?> * - <?php echo $hot['category_name'] ?> - <?php echo $hot['rooms'] ?> room Date - <?php echo $hot['hotelCheckinDate'] ?>)
<?php 
 }
} else {
    echo "No results";
}
}
?>


*Includes*
<?php
 if(isset($_GET['reff_id'])) {
    $reff_id = $_GET['reff_id'];
    $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
    $sql = "SELECT ts.*, c.*, s.*  
        FROM thailand_sightseeing ts 
        JOIN cities c ON c.city_id = ts.sight_city
        JOIN sightseeing s ON s.prices = ts.sightseeing
        WHERE ts.reff_id = '$escaped_reff_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($sight = mysqli_fetch_assoc($result)) {
   ?>
✨<?php 
  echo $sight['sight_name']?>
<?php
    }
}
} else {
    echo "No results";
}
echo "\n";
?>
*Transfer*
<?php
 if(isset($_GET['reff_id'])) {
    $reff_id = $_GET['reff_id'];
    $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
    $sql = "SELECT tt.*, c.*, t.*  
        FROM thailand_transport tt 
        JOIN cities c ON c.city_id = tt.transport_city
        JOIN transport t ON t.trans_id = tt.transport
        WHERE tt.reff_id = '$escaped_reff_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($trans = mysqli_fetch_assoc($result)) {
       ?>
       
✨<?php 
 echo $trans['transport_name']?>
<?php
        }
    }
    } else {
        echo "No results";
    }
?>


*All transfer on private basis and sightseeing on SIC basis.*


😍 *Cost: <?php echo $row['persion_inr'] ?>/- inr per person* 😍

*Total Package cost <?php echo $row['package_inr'] ?>/- inr Excluding GST*


 </textarea>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="container">
                                            <div class="col-md-2"> &nbsp;</div>
                                            <div class="col-md-8">
                                                <!-- <table>
                                                    <tr>
                                                        <td style="padding: 15px;">
                                                            <a id="aWhatsapp" name="aWhatsapp" href="https://wa.me/<?php echo $row['phone'] ?>" target="_blank" class="btn btn-primary">Open Whatsapp With Message</a>
                                                        </td>
                                                        <td style="padding: 15px;">
                                          
                       <a href="calculator_b2b.php?elid=1&edid=36940" class="btn btn-primary">
                      Edit Information
                      </a>
                  </td>
                                                        check_user_type_and_converted_type_and_payment_status_and_customer_id
                                                        <td>
                                                            <form action="" method="POST" id="send_confirmation_frm">
                      <button type="submit" name="send_confirmation" id="send_confirmation" class="btn btn-primary" ><i class="fa fa-envelope"></i> Send for Confirmation</button>                                
                    </form>  
                                                        </td>

                                                        check_user_type_and_converted_type_and_payment_status

                                                    </tr>
                                                </table> -->
                                            </div>
                                        </div>
                                    </div><br><br><br><br><br>
                                </div>
                            </section>
                            <?php 
 }
} else {
    echo "No results";
}
}

?>
                        </form>
                            
                        <?php include("./incluede/footer.php") ?>