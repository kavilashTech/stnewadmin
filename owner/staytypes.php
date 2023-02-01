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

`
<link rel="stylesheet" href="css/multi-form.css">
`<script type="application/javascript" src="js/multi-form.js"></script>
`<script type="application/javascript" src="js/jquery.form.js"></script>
<!-- `<script type="application/javascript" src="js/jquery.min.js"></script> -->

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
                                            <!-- <form id="msform"> -->
                                            <section>
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
                                                <fieldset name="FS1">
                                                    <form action="" id="form1" name="Form1">
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Basic Information</h2>
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <input type="text" name="txtStaytypeName" placeholder="Staytype name" />
                                                                </div>
                                                                <div class="col-4">
                                                                    <select class="list-dt" id="cmbStaytypeCategory" name="cmbStaytypeCategory">
                                                                        <option selected>Select...</option>
                                                                        <?php
                                                                        $selectSQL = "SELECT * FROM property_category ORDER BY sortorder";

                                                                        $result = mysqli_query($connection, $selectSQL);

                                                                        if (mysqli_num_rows($result) > 0) {

                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                                <option><?php echo $row['categoryname']; ?></option>
                                                                            <?php
                                                                            }
                                                                        } else { ?>
                                                                            <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                                                        <?php
                                                                        }
                                                                        ?>
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
                                                                    <select class="list-dt" id="cmbLocation" name="cmbLocation">
                                                                        <option selected>Select Location...</option>
                                                                        <?php
                                                                        $selectSQL = "SELECT * FROM locations";

                                                                        $result = mysqli_query($connection, $selectSQL);

                                                                        if (mysqli_num_rows($result) > 0) {

                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                                            <?php
                                                                            }
                                                                        } else { ?>
                                                                            <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <!-- Area Dropdown - Dependent on Location Selection -->
                                                                <!-- Area Dropdown - Dependent on Location Selection -->
                                                                <div class="col-3">
                                                                    <select class="list-dt" id="cmbArea" name="cmbArea">
                                                                        <option value='0' selected>Select Area</option>

                                                                    </select>
                                                                </div>
                                                                <!-- END Area Dropdown - Dependent on Location Selection -->
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
                                                                        <option selected>Select Exclusivity...</option>
                                                                        <?php
                                                                        $selectSQL = "SELECT * FROM exclusivity";

                                                                        $result = mysqli_query($connection, $selectSQL);

                                                                        if (mysqli_num_rows($result) > 0) {

                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                                            <?php
                                                                            }
                                                                        } else { ?>
                                                                            <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                                                        <?php
                                                                        }
                                                                        ?>
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
                                                    </form>
                                                </fieldset>
                                                <fieldset>
                                                    <form action="">
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Amenities Information</h2>
                                                            <div class="row">
                                                                <!-- <div class="col-8"> -->
                                                                Select Property Level Amenities<br><br>
                                                                <div class="row mb-5">
                                                                    <div class="col-3">
                                                                        <select class="list-dt" id="cmbAmenity" name="cmbAmenity" style="width:50%!important">
                                                                            <option selected>Select Amenity ...</option>
                                                                            <?php
                                                                            $selectSQL = "SELECT * FROM amenities where level=0";

                                                                            $result = mysqli_query($connection, $selectSQL);

                                                                            if (mysqli_num_rows($result) > 0) {

                                                                                while ($row = mysqli_fetch_array($result)) {
                                                                            ?>
                                                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                                                <?php
                                                                                }
                                                                            } else { ?>
                                                                                <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <select class="list-dt" id="cmbAmenityList" name="cmbAmenityList" style="width:100%!important" multiple>
                                                                            <option value='0' selected>Select Amenity List1...</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <input type="text" placeholder="value" hidden>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <input type="button" class="btn btn-primary" style="width:50px!important" value="Add">
                                                                    </div>
                                                                </div>

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
                                                                <!-- </div> -->

                                                            </div>
                                                        </div>
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                        <input type="button" name="next" class="next action-button" value="Next Step" />
                                                    </form>
                                                </fieldset>


                                                <fieldset>
                                                    <form method="post" id="uploadForm" name="uploadForm" enctype="multipart/form-data" action="img-upload.php">
                                                        <div class="form-card">
                                                            <script>
                                                                $(function() {
                                                                    $('#uploadForm').ajaxForm({
                                                                        target: '#imagesPreview',
                                                                        beforeSubmit: function() {
                                                                            // $('#uploadStatus').html('<img src="css/uploading.gif" />');
                                                                        },
                                                                        success: function() {
                                                                            $('#images').val('');
                                                                            $('#uploadStatus').html('');
                                                                        },
                                                                        error: function() {
                                                                            $('#uploadStatus').html('<p>Upload failed! Please try again.</p>');
                                                                        }
                                                                    });
                                                                });
                                                            </script>

                                                            <style>
                                                                .col-img {
                                                                    /* width:30px; */
                                                                    float: left;
                                                                }

                                                                .col-img img {
                                                                    max-height: 80px;
                                                                    height: 70px;
                                                                    object-fit: contain;
                                                                    padding: 5px;
                                                                    border: 1px solid #d9d9d9;
                                                                }

                                                                .img-wrap {
                                                                    position: relative;
                                                                    display: inline-block;
                                                                    /* border: 1px red solid; */
                                                                    font-size: 0;
                                                                }

                                                                .img-wrap .close {
                                                                    position: absolute;
                                                                    top: 2px;
                                                                    right: 2px;
                                                                    z-index: 100;
                                                                    background-color: red;
                                                                    padding: 2px 3px 5px;
                                                                    color: #000;
                                                                    font-weight: bold;
                                                                    cursor: pointer;
                                                                    opacity: .2;
                                                                    text-align: center;
                                                                    font-size: 22px;
                                                                    line-height: 10px;
                                                                    border-radius: 50%;
                                                                }

                                                                .img-wrap:hover .close {
                                                                    opacity: 1;
                                                                }

                                                                .uploadStatus {
                                                                    font-size: 12px;
                                                                    color: red !important;
                                                                }
                                                            </style>
                                                            <h2 class="fs-title">Media Information</h2>

                                                            Select Image Files to Upload (Max : 5):
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <!-- Upload controls column -->
                                                                    <div class="row">
                                                                        <!-- <div class="col-3"> -->
                                                                        <input type="file" name="images[]" id="images" multiple>
                                                                        <!-- </div> -->
                                                                    </div>
                                                                    <div class="row">
                                                                        <!-- <div class="col-3"> -->
                                                                        <input type="submit" name="imageUpload" id="imageUpload" value="UPLOAD">
                                                                        <!-- display upload status -->
                                                                        <div id="uploadStatus" style="color:red"></div>
                                                                        <div class="gallery" id="imagesPreview"></div>

                                                                        <!-- </div> -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-8">

                                                                    <!-- Gallery Column -->
                                                                    <?PHP
                                                                    // Get image data from database
                                                                    $result = $connection->query("SELECT img_file_name FROM property_images ORDER BY id DESC");
                                                                    $noOfImages = $result->num_rows;
                                                                    echo "images : " . $noOfImages;
                                                                    ?>

                                                                    <?php
                                                                    if ($noOfImages > 0) {
                                                                        if ($noOfImages < 6) { ?>
                                                                            <div class="gallery">

                                                                                <?php while ($row = $result->fetch_assoc()) { ?>

                                                                                    <div class="col-img img-wrap">
                                                                                        <span class="close" title="delete">&times;</span>
                                                                                        <img src="<?php echo 'uploads/' . $row['img_file_name']; ?>" />
                                                                                    </div>


                                                                                <?php } ?>

                                                                            </div>
                                                                        <?php } else {
                                                                            //Max image numbers reached.
                                                                            echo "<script>document.getElementById('imageUpload').hidden = true;</script>";
                                                                        }
                                                                    } else { ?>
                                                                        <p class="status error">Image(s) not found...</p>
                                                                    <?php }
                                                                    if ($noOfImages >= 5) {
                                                                        //Max image uploaded. cannot upload more.
                                                                        echo "<script>document.getElementById('imageUpload').hidden = true;</script>";
                                                                        echo "<script>document.getElementById('uploadStatus').innerHTML = 'Max Files Reached';</script>";
                                                                    }
                                                                    ?>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <form method="post" id="videoUploadForm" name="videoUploadForm" enctype="multipart/form-data" action="img-upload.php">
                                                        <div class="form-card">
                                                            <script>
                                                                $(function() {
                                                                    $('#videoUploadForm').ajaxForm({
                                                                        target: '#videoPreview',
                                                                        beforeSubmit: function() {
                                                                            // $('#uploadStatus').html('<img src="css/uploading.gif" />');
                                                                        },
                                                                        success: function() {
                                                                            $('#videoFile').val('');
                                                                            $('#uploadStatus').html('');
                                                                        },
                                                                        error: function() {
                                                                            $('#uploadStatus').html('<p>Upload failed! Please try again.</p>');
                                                                        }
                                                                    });
                                                                });
                                                            </script>
                                                            <P class="mb-2"> Select Video Files to Upload (One video only):</P>
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <div class="row">
                                                                        <input type="file" accept="video/mp4" name="videoFile" id="videoFile">
                                                                    </div>

                                                                    <div class="row">
                                                                        <input type="submit" name="btnVideoUpload" id="btnVideoUpload" value="UPLOAD">
                                                                    </div>

                                                                </div>
                                                                <div class="col-8 float-start">
                                                                    <div id="uploadStatus" style="color:red"></div>
                                                                    <div class="gallery" id="videoPreview"></div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                        <input type="button" name="next" class="next action-button" value="Next Step" />
                                                    </form>
                                                </fieldset>


                                                <fieldset>
                                                    <form action="">
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Room Information</h2>
                                                            <p>Create Rooms</p>
                                                            <div class="row mb-2">
                                                                <div class="col-6">
                                                                    <input type="text" placeholder="Room Name">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <select class="list-dt" id="cmbRoomAmenity" name="cmbRoomAmenity">
                                                                        <option selected>Select Amenity ...</option>
                                                                        <?php
                                                                        $selectSQL = "SELECT * FROM amenities where level=1";

                                                                        $result = mysqli_query($connection, $selectSQL);

                                                                        if (mysqli_num_rows($result) > 0) {

                                                                            while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                                            <?php
                                                                            }
                                                                        } else { ?>
                                                                            <td colspan="3" style="text-align:center;color:red;">No Records Found</td>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-3">
                                                                    <select class="list-dt" id="cmbRoomAmenityList" name="cmbRoomAmenityList">
                                                                        <option selected>Select Choices</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-3">
                                                                    <input type="text" name="txtRoomAmenityValue" id="txtRoomAmenityValue" placeholder="Value" hidden/>
                                                                </div>
                                                                <div class="col-2">
                                                                <input type="button" class="btn btn-primary" style="width:50px!important" value="Add">
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
                                                    </form>
                                                </fieldset>

                                                <fieldset>
                                                    <form action="">
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
                                                    </form>
                                                </fieldset>
                                                <fieldset>
                                                    <form action="">
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Terms</h2>
                                                            <textarea name="" id="tarTermas" cols="30" rows="10">Enter Terms</textarea>
                                                        </div>
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                        <input type="button" name="next" class="next action-button" value="Next Step" />
                                                    </form>
                                                </fieldset>

                                                <fieldset>
                                                    <form action="">
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
                                                        <input type="button" name="make_payment" class="next action-button" value="Submit" />
                                                    </form>
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
                                            </section>
                                            <!-- </form> -->
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