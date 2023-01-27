<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';



// Check if user has propertly logged in
// TODO : once login is created, remove comments from below block

if (!isset($_SESSION['user'])) {
    echo '<meta http-equiv="Refresh" content="0; url=login.php">';
    exit(0);
}


?>

<!-- TODO : Bed type should be part of Room Level Amenities and code should be similar to Bathroom and Bathroom List -->

<style>
    .admin-msg {
        width: 300px;
        background-color: rgb(1, 73, 1) !important;
        color: #fff !important;
        text-align: center;
        font-weight: bold;
    }

    .table-time tr td {
        padding: 10px;
        color: black !important;

    }
</style>

<link rel="stylesheet" href="css/multi-form.css">
<script type="application/javascript" src="js/multi-form.js"></script>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <!-- <div class="container-fluid px-4 mt-5"> -->
            <div class="card" style="width:100%;">
                <div class="card-header d-flex" style="font-size:25px; color:grey">
                    <span><strong>Add Staytype</strong></span>
                </div>
                <div>
                    <!-- //Show error Mesage -->
                    <?php if (isset($_SESSION['message'])) : ?>
                        <div class="admin-msg mx-auto" id="admin-msg" style="color:green">
                            <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="card-body">
                    <!-- Start ----- Add Step form in this space -->

                    <!-- MultiStep Form -->
                    <div class="container-fluid" id="grad1">
                        <div class="row justify-content-center mt-0">
                            <div class="col-11 text-center p-0 mt-3 mb-2">
                                <!-- <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2"> -->
                                <div class="card">
                                    <!-- <div class="card px-0 pt-4 pb-0 mt-3 mb-3"> -->
                                    <!-- <h2><strong>Sign Up Your User Account</strong></h2>
                    <p>Fill all form field to go to next step</p> -->
                                    <div class="row">
                                        <div class="col-md-12 mx-0">
                                            <form id="msform">
                                                <!-- progressbar -->
                                                <ul id="progressbar">
                                                    <li class="active" id="account"><strong>Basic</strong></li>
                                                    <li id="Amenities"><strong>Amenities</strong></li>
                                                    <li id="Media"><strong>Media</strong></li>
                                                    <li id="Rooms"><strong>Rooms</strong></li>
                                                    <li id="Worktime"><strong>Work Time</strong></li>
                                                    <li id="Terms"><strong>Terms</strong></li>
                                                    <li id="Acceptance"><strong>Acceptance</strong></li>
                                                    <li id="confirm"><strong>Finish</strong></li>
                                                </ul>
                                                <!-- fieldsets -->
                                                <fieldset>
                                                    <div class="form-card">
                                                        <h2 class="fs-title">Basic Information</h2>
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <input type="text" name="txtStaytypeName" placeholder="Staytype name" />
                                                            </div>
                                                            <div class="col-4">
                                                                <select class="list-dt" id="cmbStaytypeCategory" name="cmbStaytypeCategory">
                                                                    <option selected>Stay Type</option>
                                                                    <option>Hostel</option>
                                                                    <option>Paying Guest</option>
                                                                    <option>Apartment</option>
                                                                    <option>Guest House</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input type="text" name="txtAddress1" placeholder="Address" />
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="text" name="txtAddress2" placeholder="Address 2" />
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-3">
                                                                <select class="list-dt" id="cmbState" name="cmbState">
                                                                    <option selected>State</option>
                                                                    <option>Tamilnadu</option>
                                                                    <option>Karnataka</option>
                                                                    <option>Kerala</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-3">
                                                                <select class="list-dt" id="cmbCity" name="cmbCity">
                                                                    <option selected>City</option>
                                                                    <option>Chennai</option>
                                                                    <option>Bangalore</option>
                                                                    <option>Coimbatore</option>
                                                                    <option>Trivandrum</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-3">
                                                                <select class="list-dt" id="cmbArea" name="cmbArea">
                                                                    <option selected>Area</option>
                                                                    <option>Annanagar</option>
                                                                    <option>Kilpauk</option>
                                                                    <option>J P Nagar</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-3">
                                                                <input type="text" name="txtPincode" placeholder="Pincode" />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="text" name="txtPhone" placeholder="Phone" />
                                                            </div>
                                                            <div class="col-3">
                                                                <input type="text" name="txtAlternatePhone" placeholder="Alternate Phone" />
                                                            </div>
                                                            <div class="col-3">
                                                                <select class="list-dt" id="cmbExclusivity" name="cmbExclusivity">
                                                                    <option selected>Exclusivity</option>
                                                                    <option>NEET Aspirants</option>
                                                                    <option>Working People</option>
                                                                    <option>IT Professionals</option>
                                                                    <option>Only Students</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-3">
                                                                <select class="list-dt" id="cmbAccomodationPref" name="cmbAccomodationPref">
                                                                    <option selected>Preferred Guests</option>
                                                                    <option>Male Only</option>
                                                                    <option>Female Only</option>
                                                                    <option>Male & Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <textarea name="" id="" cols="30" rows="3">Salient Features</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">
                                                        <h2 class="fs-title">Amenities Information</h2>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                Select Property Level Amenities<br><br>
                                                                <div class="row">
                                                                    <select class="list-dt" id="cmbAccomodationPref" name="cmbAccomodationPref">
                                                                        <option selected>Select Amenity</option>
                                                                        <option>Nearby Places</option>
                                                                        <option>Internet</option>
                                                                        <option>Food Packing</option>
                                                                    </select>
                                                                </div>
                                                                <select class="list-dt" id="cmbAccomodationPref" name="cmbAccomodationPref">
                                                                    <option selected>Select Choices</option>
                                                                    <option>Stationary Stores</option>
                                                                    <option>Bus Stand</option>
                                                                    <option>Shankar IAS Academy</option>
                                                                </select>
                                                                <table>
                                                                    <tr>
                                                                        <td>Amenity</td>
                                                                        <td>Choices</td>
                                                                        <td>Value</td>
                                                                        <td>Action</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nearby Places</td>
                                                                        <td>Railway Station</td>
                                                                        <td></td>
                                                                        <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                    <tr>
                                                                        <td>Nearby Places</td>
                                                                        <td>Restaurant</td>
                                                                        <td></td>
                                                                        <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Parking</td>
                                                                        <td>Bike Parking</td>
                                                                        <td></td>
                                                                        <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Internet</td>
                                                                        <td>Broadband</td>
                                                                        <td>100 Mbps</td>
                                                                        <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Food Packing</td>
                                                                        <td>Lunch Only</td>
                                                                        <td></td>
                                                                        <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                    </tr>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">
                                                        <h2 class="fs-title">Media Information</h2>
                                                        Select Image Files to Upload:
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="file" name="files[]" multiple>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="submit" name="submit" value="UPLOAD">
                                                            </div>
                                                        </div>
                                                        Select Video Files to Upload:
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="file" name="files[]" multiple>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="submit" name="submit" value="UPLOAD">
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">
                                                        <h2 class="fs-title">Room Information</h2>
                                                        <p>Create Rooms</p>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <select class="list-dt" id="cmbAccomodationPref" name="cmbAccomodationPref">
                                                                    <option selected>Select Amenity</option>
                                                                    <option>Nearby Places</option>
                                                                    <option>Internet</option>
                                                                    <option>Food Packing</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-3">
                                                                <select class="list-dt" id="cmbAccomodationPref" name="cmbAccomodationPref">
                                                                    <option selected>Select Choices</option>
                                                                    <option>Nearby Places</option>
                                                                    <option>Internet</option>
                                                                    <option>Food Packing</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-3">
                                                                <input type="text" name="txtAvalue" placeholder="Value" />
                                                            </div>
                                                            <div class="col-2">
                                                                <a href="">Add</a>
                                                            </div>
                                                        </div>

                                                        <div class="row ">
                                                            <p>Selected Room Amenities</p>
                                                            <table class="table-worktime">
                                                                <tr>
                                                                    <td>Amenity</td>
                                                                    <td>Choices</td>
                                                                    <td>Value</td>
                                                                    <td>Action</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nearby Places</td>
                                                                    <td>Railway Station</td>
                                                                    <td></td>
                                                                    <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nearby Places</td>
                                                                    <td>Restaurant</td>
                                                                    <td></td>
                                                                    <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Parking</td>
                                                                    <td>Bike Parking</td>
                                                                    <td></td>
                                                                    <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Internet</td>
                                                                    <td>Broadband</td>
                                                                    <td>100 Mbps</td>
                                                                    <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Food Packing</td>
                                                                    <td>Lunch Only</td>
                                                                    <td></td>
                                                                    <td style="text-align:center;"><span style="color:red;">X</span></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">
                                                        <h2 class="fs-title">Work Timings</h2>
                                                        <table>
                                                            <tr>
                                                                <td width="50%">Weekday</td>
                                                                <td>Start Time</td>
                                                                <td>End Time</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Monday</td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                <!-- <td><input type="time" id="txtMonTime" /></td> -->
                                                            </tr>
                                                            <tr>
                                                                <td>Tuesday</td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Wednesday</td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Thursday</td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Friday</td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Saturday</td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sunday</td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                                <td><input type="time" class="txtMonTime" style="border:none;margin-bottom:1px;" /></td>
                                                            </tr>
                                                        </table>


                                                    </div>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">
                                                        <h2 class="fs-title">Terms</h2>
                                                        <textarea name="" id="tarTermas" cols="30" rows="10">Enter Terms</textarea>
                                                    </div>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                                </fieldset>

                                                <fieldset>
                                                    <div class="form-card text-left">
                                                        <h2 class="fs-title">Acceptance</h2>
                                                        <!-- <div class="radio-group">
                                                            <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px">
                                                            </div>
                                                            <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px">
                                                            </div>
                                                            <br>
                                                        </div> 
                                                        <label class="pay">Card Holder Name*</label>
                                                        <input type="text" name="holdername" placeholder="" />
                                                        <div class="row">
                                                            <div class="col-9">
                                                                <label class="pay">Card Number*</label>
                                                                <input type="text" name="cardno" placeholder="" />
                                                            </div>
                                                            <div class="col-3">
                                                                <label class="pay">CVC*</label>
                                                                <input type="password" name="cvcpwd" placeholder="***" />
                                                            </div>
                                                        </div>-->
                                                        <!-- <div class="row">
                                                            <div class="col-3">
                                                                <label class="pay">Expiry Date*</label>
                                                            </div>
                                                            <div class="col-9">
                                                                <select class="list-dt" id="month" name="expmonth">
                                                                    <option selected>Month</option>
                                                                    <option>January</option>
                                                                    <option>February</option>
                                                                    <option>March</option>
                                                                    <option>April</option>
                                                                    <option>May</option>
                                                                    <option>June</option>
                                                                    <option>July</option>
                                                                    <option>August</option>
                                                                    <option>September</option>
                                                                    <option>October</option>
                                                                    <option>November</option>
                                                                    <option>December</option>
                                                                </select>
                                                                <select class="list-dt" id="year" name="expyear">
                                                                    <option selected>Year</option>
                                                                </select>
                                                            </div>
                                                        </div> -->
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <input type="checkbox">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="vehicle1">We have read the Terms & Conditions of Stayteller and accept by checking this checkbox.</label><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                    <input type="button" name="make_payment" class="next action-button" value="Confirm" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">
                                                        <h2 class="fs-title text-center">Success !</h2>
                                                        <br><br>
                                                        <div class="row justify-content-center">
                                                            <div class="col-3">
                                                                <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row justify-content-center">
                                                            <div class="col-7 text-center">
                                                                <h5>Your Staytype Created. Please wait for Stayteller Approval.</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End ----- Add Step form in this space -->
                </div>
            </div>
            <!-- </div> -->
            <!-- </div> -->
        </main>
    </div>
</div>



<script type="application/javascript">
    $('#admin-msg').delay(5000).fadeOut(300);

    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: '10',
        maxTime: '6:00pm',
        defaultTime: '11',
        startTime: '10:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
</script>

<?php
include 'includes/footer.php';
?>