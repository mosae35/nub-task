<?php
session_start();
include 'app/layout/nav.php';
?>

<div class="place container" style="margin-bottom: 20px;">
    <!-- ajax used for search  --> 
    <script>

        $(document).ready(function () {
            $("#search").keyup(function () {
                var search = $('#search').val();
                $.ajax({
                    url: '?page=posts/search.php',
                    type: 'POST',
                    data: {search: search},
                    success: function (data) {
                        if (!data.error) {
                            $('.place').html(data);
                        }
                    }
                });
            });

        });
    </script>

    <?php
    include 'app/posts/display_control.php';


    foreach ($data as $value) {
        $sql_2 = "select * from `users` where id =:user_id";
        //protect data from sql inj by pdo bindparam
        $stmt = $dbh->prepare($sql_2);
        $stmt->bindParam(':user_id', $value['user_id'], PDO::PARAM_STR);
        if ($stmt->execute()) {
            $data = $stmt->fetch();
        }
        ?>
        <div class=" col-md-12">
            <h1><?php echo $value['title']; ?></h1>
            <p> <?php echo $value['conten']; ?>  </p>
            <div>
                <span class="badge">Posted <?php echo $value['date']; ?></span><div class="pull-right">
                    <span class="badge">Posted by <?php echo $data['username']; ?></span><div class="pull-left">
                    </div>
                </div>     
                <hr>
            </div>
            <?php
        }
        ?>
    </div>






