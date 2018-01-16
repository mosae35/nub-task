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
        ?>
        <div class=" col-md-12">
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
    ?>
</div>




