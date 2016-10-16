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

                $sql = "SELECT * FROM users WHERE username='jeff'";
                $user = array_shift(User::find_this_query($sql));

                echo "<h2>Hello, {$user->first_name} {$user->last_name}!</h2>";
                // $user = new User();
                // $user->username = "jeff";
                // $user->password = "hello";
                // $user->first_name = "Jeff";
                // $user->last_name = "Minnear";
                //
                // if ($user->create()) {
                //     show_success("User {$user->username} created successfully!");
                // } else {
                //     show_error("Failed to create User!");
                // }


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
