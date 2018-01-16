<div class="container" style="margin-bottom: 20px;">
    <?php
    if (!empty($_POST['search'])) {

        $search = $_POST['search'];
        //query statment
        $sql = "select * from `posts` where title like '%$search%'";

        //protect data from sql inj by pdo bindparam
        $stmt = $dbh->prepare($sql);

        //check query if true go to dashboard//
        if ($stmt->execute()) {
            $data = $stmt->fetchAll();

            foreach ($data as $value) {
                ?>
                <div class="  col-md-12">
                    <h1><?php echo $value['title']; ?></h1>
                    <p> <?php echo $value['conten']; ?>  </p>
                    <div>
                        <span class="badge">Posted <?php echo $value['date']; ?></span><div class="pull-right">

                            <span class="label label-info">
                                <a style="color: white;" 
                                   href="?page=posts/edit_view.php&&id=<?php echo $value['id']; ?>" >
                                    Edit
                                </a>
                            </span> 
                            <span>|</span>
                            <span class="label label-danger">
                                <a style="color: white;" href="?page=posts/delete_control.php&&id=<?php echo $value['id']; ?>">
                                    delete
                                </a> 
                            </span>

                        </div>
                    </div>     
                    <hr>
                </div>
                <?php
            }
        }
    } else {
        include 'all_posts.php';
    }
    ?>
</div>