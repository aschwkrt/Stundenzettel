<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fontawesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row my-5">
        <div class="col">
            <h1 class="text-center">Telefonbuch App</h1>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col">
            <h2>Neuer Eintrag</h2>
            <form action="create.php" method="post">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="phone" placeholder="Telefonnummer">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col">
            <h2>Suche</h2>
            <form action="index.php" method="get">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $_GET["name"] ?>">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Einträge</h2>
        </div>
    </div>
    <?php
        require_once('./read.php');

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) { ?>
                <div class="row mb-3">
                    <div class="col">
                        <form action="update.php" method="post">
                            <div class="form-row">
                                <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                <div class="col">
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $row["name"] ?>">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="phone" placeholder="Telefonnummer" value="<?php echo $row["phone"] ?>">
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-danger btn-block" formaction="delete.php">
                                        <i class="fa fa-close"></i>
                                    </button>
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-success btn-block">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="row">
                <div class="col">
                    <p>Keine Einträge in der Datenbank!</p>
                </div>
            </div>
        <?php }
    ?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>