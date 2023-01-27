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
</style>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-5">
                <div class="card" style="width:80%;">
                    <div class="card-header d-flex" style="font-size:25px; color:grey">
                        <span><strong>Staytypes
                                <span style="color:red;font-size:12px;"></span>

                            </strong></span>
                        <span class="ms-auto"><a href="staytypes.php" name="Add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
                    </div>
                    <div style="height:50px;">
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
                        <table class="table ">
                            <thead>
                                <th>Title</th>
                                <th>City</th>
                                <th>Area</th>
                                <th>Active</th>
                                <th width="20%">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                // include('includes/conn.php');

                                $query = mysqli_query($connection, "select * from `property`");

                                if (mysqli_num_rows($query) > 0) {

                                    while ($row = mysqli_fetch_array($query)) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['property_title']; ?></td>
                                            <td><?php echo $row['city']; ?></td>
                                            <td><?php echo $row['area']; ?></td>
                                            <td><?php echo $row['active']; ?></td>
                                            <td>
                                                <a href="" class="btn btn-status-positive btn-rounded btn-icon" title="Edit"><i class="fas fa-sm fa-edit"></i></a>
                                                <a href="" data-toggle="modal" class="btn btn-danger btn-rounded btn-icon" class="btn btn-status-negative btn-rounded btn-icon" title="Delete"><i class="fas fa-sm fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else { ?>
                                    <td colspan="5" style="text-align:center;color:red;">No Records Found</td>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </main>
    </div>
</div>



<script type="application/javascript">
    $('#admin-msg').delay(5000).fadeOut(300);
</script>

<?php
include 'includes/footer.php';
?>