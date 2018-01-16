<html>
    <head>
        <title> NUB </title> 
        <link href="app/resources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css
              "rel="stylesheet" type="text/css"/>

        <script src="app/resources/js/jquery.js" type="text/javascript"></script>
        <script src="app/resources/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" 
                type="text/javascript">
        </script>


    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="?page=home.php">Control</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="?page=posts/index.php">All Posts 
                                <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <form  class="  navbar-form navbar-left">
                        <div class="form-group">
                            <input id="search" type="text" class="form-control" placeholder="Search by title">
                        </div>

                    </form>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" 
                               data-toggle="dropdown" role="button" aria-haspopup="true" 
                               aria-expanded="false">
                                   <?php echo $_SESSION['username']; ?> 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="app/users/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>




