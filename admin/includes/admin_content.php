<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page
                <small>Subheading</small>
            </h1>

            <!-- this is just to demonstrate that the database methods are working -->
            <!-- TODO remove it -->
            <?php

                $sql = 'SELECT * FROM users WHERE id=1';
                $result = $database->query($sql);
                $user_found = mysqli_fetch_array($result);

                echo $user_found['username'] . '\'s real name is ' . $user_found['first_name'] . ' ' . $user_found['last_name'];

            ?>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
