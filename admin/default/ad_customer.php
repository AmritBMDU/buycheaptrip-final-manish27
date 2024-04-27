<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php $page = "customer";
include("./incluede/header.php") ?>
<!-- Main Content -->
<style>
    .form-row {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
        text-align: center;
    }

    .form-row label {
        margin-bottom: 5px;
    }

    .form-row select,
    .form-row input[type="date"] {
        width: 200px;
    }
</style>

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>Customers Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label" for="name">Customer Name</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter Customer Name" name="name">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Phone Number</label>
                                    <input type="number" class="form-control" id="phone" placeholder="Enter Phone Number" name="date">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Date</label>
                                    <input type="date" class="form-control" id="phone" placeholder="" name="date">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="pax">NO of PAX</label>
                                    <input type="number" class="form-control" id="pax" placeholder="" name="pax">
                                </div>
                                <br>
                                <h1 class="text-center">Thailand</h1>
                                <div class="main bg-info">
                                    <div class="d-flex justify-content-center satyam">
                                        <div class="form-row mx-1 ">
                                            <label for="city">City:</label>
                                            <select id="city" name="city">
                                            <option value="desabled">Select City</option>
                                                <?php
                                                $query = "SELECT * FROM cities";
                                                $result = mysqli_query($conn, $query);
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>">
                                                            <?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No city found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                                <!-- <option value="newyork">New York</option>
                                                <option value="london">London</option>
                                                <option value="paris">Paris</option> -->
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select id="hotel" name="hotel">
                                                <!-- <option value="hotel1">Hotel 1</option>
                                                <option value="hotel2">Hotel 2</option>
                                                <option value="hotel3">Hotel 3</option> -->
                                                <option value="disabled">Select Hotel</option>
                                        <?php
                                        $query = "SELECT * FROM hotels";
                                        $result = mysqli_query($conn, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <option value="<?php echo $row['hotel_id']; ?>">
                                                    <?php echo $row['hotel_name']; ?></option>

                                        <?php
                                            }
                                        } else {
                                            echo '<option disabled>No hotels found</option>';
                                        }
                                        mysqli_free_result($result);
                                        ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select id="category" name="category">
                                                <option value="disabled">Select Category</option>
                                                <option value="deluxe">Deluxe</option>
                                                <option value="premium">Premium</option>
                                                <option value="superior">Superior</option>
                                                <option value="suite">Suite</option>
                                                <!-- <option value="economy">Economy</option>
                                                <option value="standard">Standard</option>
                                                <option value="luxury">Luxury</option> -->
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select id="rooms" name="rooms">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select id="nights" name="nights">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select id="adults" name="adults">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" id="checkinDate" name="checkinDate">
                                        </div>
                                        <!-- <p id="addRowBtn">Add</p>
                                        <div class="" id="formContainer"></div> -->
                                    </div>
                                    <div class="d-flex justify-content-center manish">
                                        <div class="form-row mx-1 ">
                                            <label for="city">City:</label>
                                            <select id="city" name="city">
                                                <option value="newyork">New York</option>
                                                <option value="london">London</option>
                                                <option value="paris">Paris</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select id="hotel" name="hotel">
                                                <option value="hotel1">Hotel 1</option>
                                                <option value="hotel2">Hotel 2</option>
                                                <option value="hotel3">Hotel 3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select id="rooms" name="rooms">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" id="checkinDate" name="checkinDate">
                                        </div>
                                        <!-- <p id="addRowBtn">Add</p>
                                        <div class="" id="formContainer"></div> -->
                                    </div>
                                    <div class="d-flex justify-content-center ">
                                        <div class="form-row mx-1 ">
                                            <label for="city">City:</label>
                                            <select id="city" name="city">
                                                <option value="newyork">New York</option>
                                                <option value="london">London</option>
                                                <option value="paris">Paris</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select id="hotel" name="hotel">
                                                <option value="hotel1">Hotel 1</option>
                                                <option value="hotel2">Hotel 2</option>
                                                <option value="hotel3">Hotel 3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select id="rooms" name="rooms">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" id="checkinDate" name="checkinDate">
                                        </div>
                                    </div>
                                </div>
                                <!-- main div close -->
                                <table>
                                    <tr class="">
                                        <th>Remarks:</th>
                                        <td><input type="text" name="remarks"><br></td>
                                    </tr>
                                    <tr class="p-3">
                                        <th>Total THB:
                                        <th>
                                            <!-- <td>12334</td> -->

                                    </tr>
                                    <tr>
                                        <th>THB TO INR Rate:</th>
                                        <!-- <td>15</td> -->
                                    </tr>
                                    <tr>
                                        <th>Srvice per person INR Rate:</th>
                                        <!-- <td>1522</td> -->
                                    </tr>
                                    <tr>
                                        <th>Total INR:</th>
                                        <!-- <td>1522</td> -->
                                    </tr>
                                </table>
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Calculate</button>
                            </form>

                        </div>
                    </div>
                    <?php include("./incluede/footer.php") ?>
                    <script>
                        $(document).ready(function() {
                            // Add form row
                            $('#addRowBtn').click(function() {
                                var formRow = $('.satyam').clone();
                                $('#formContainer').append(formRow);
                            });
                            $(document).on('click', '#removeRowBtn', function() {
                                $(this).closest('.satyam').remove();
                            });
                        });
                    </script>