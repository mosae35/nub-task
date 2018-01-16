
<div class="container">
    <div class="row">
        <button type="button" style="margin-left: 33px;" class=" btn btn-primary" 
                data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo">New Post  <span class="glyphicon glyphicon-plus"></span>
        </button>  
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="app/posts/add_control.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">New Post</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Title:</label>
                        <input name="title" required="required" type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Post Content:</label>
                        <textarea name="content" required="required" class="form-control" id="message-text"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Send message">

                </div>
            </form>
        </div>
    </div>
</div>