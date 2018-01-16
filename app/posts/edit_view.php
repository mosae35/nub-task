<?php
session_start();
include 'app/layout/nav.php';

// get data for update 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from `posts` where id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        $data = $stmt->fetch();
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="?page=posts/update_control.php&&id=<?php echo $_GET['id']; ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">New Post</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Title:</label>
                        <input name="title"  value="<?php echo $data['title']; ?>" 
                               type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Post Content:</label>
                        <textarea style="height: 200px;"  name="content" 
                                  class="form-control"> <?php echo $data['conten']; ?>
                        </textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                </div>
            </form>

        </div>
    </div>
</div>

<?php include 'app/layout/footer.php'; ?>