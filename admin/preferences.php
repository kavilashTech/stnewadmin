<?php
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/sidenav.php';
?>


    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-5">
                    <div class="row justify-content-start">
                        <div class="col-lg-9">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Preferences
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Key</th>
                                                <th>Value</th>
                                                <th>Description</th>
                                                <th width="15%"">Status</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Key</th>
                                                <th>Value</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Max Images per property</td>
                                                <td>5</td>
                                                <td>Enter the number of images allowed per property. Shown in Gallery Images.</td>
                                                <td>Active</td>

                                            </tr>
                                            <tr>
                                                <td>Max Videos per property</td>
                                                <td>1</td>
                                                <td>Enter the number of videos allower per property.</td>
                                <td>Active</td>
                                            <tr>
                                                <td>Facebook</td>
                                                <td>http://facebook.com</td>
                                                <td>Facebook URL</td>
                                                <td>Active</td>

                                            </tr>
                                            <tr>
                                                <td>Instagram</td>
                                                <td>http://instagram.com</td>
                                                <td>Instagram URL</td>
                                                <td>Active</td>

                                            </tr>


  

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
 
                    <!-- footer -->
        <?php
        include 'includes/footer.php';
        ?>