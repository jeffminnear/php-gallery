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

                echo '<h4>All users:</h4>';
                $result_set = User::find_all_users();

                while ($row = mysqli_fetch_array($result_set)) {
                    echo $row['username'] . '<br>';
                }

                echo '<br><h4>User 3</h4>';
                $user = User::find_user_by_id(3);

                echo '<strong>username: </strong>' . $user['username'] . '<br>';
                echo '<strong>first_name: </strong>' . $user['first_name'] . '<br>';
                echo '<strong>last_name: </strong>' . $user['last_name'] . '<br>';


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
