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

                echo "<h4>All users:</h4>";
                $users = User::find_all_users();

                foreach ($users as $user) {
                    echo $user->username . "<br>";
                }

                $user = User::find_user_by_id(3);
                echo "<br><h4>User $user->id</h4>";

                echo "<strong>username: </strong>$user->username<br>";
                echo "<strong>first_name: </strong>$user->first_name<br>";
                echo "<strong>last_name: </strong>$user->last_name<br>";


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
