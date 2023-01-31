<?php
    require 'functions.php';
    $project_monitoring = query("SELECT * FROM project_monitoring");

    if(isset($_POST["cari"])) {
        $project_monitoring = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Monitoring</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <div class="container-title">
        <h1 class="my-5 pm">Project Monitoring</h1>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="btn btn-primary" href="tambah.php">Tambah data</a>
                <form class="d-flex" role="search" action="" method="post">
                    <input class="form-control me-2" type="search" name="keyword"placeholder="Cari data ..." aria-label="Search" autofocus>
                    <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
                </form>
            </div>
        </nav>
    </div>

    <div class="container-table">
        <table class="table">
            <tr>
                <th>PROJECT NAME</th>
                <th>CLIENT</th>
                <th>PROJECT LEADER</th>
                <th>START DATE</th>
                <th>END DATE</th>
                <th>PROGRESS</th>
                <th>ACTION</th>
            </tr>
    
            <?php foreach( $project_monitoring as $row) : ?>
            <tr>
                <td>
                    <div class="my-4"><?= $row["project_name"]; ?></div>
                </td>
                <td>
                <div class="my-4"><?= $row["client"]; ?></td></div>
                <td>
                <div class="pl-display">
                    <div class="m-2">
                        <img src="img/<?= $row["gambar"] ?>" alt="" class="foto-icon rounded-circle" width="40">
                    </div>
                    <div class="m-1">
                        <span href="" class="float-start fw-bold"><?= $row['project_leader'] ?></span><br>
                        <p href="" class="float-start me-1"><?= $row['email_project_leader'] ?></p>
                    </div>
                </div>
                </td>
                <td>
                    <div class="my-3"><?= $row["start_date"]; ?></div>    
                </td>
                <td>
                <div class="my-3"><?= $row["end_date"]; ?></div>        
                </td>
                <td>
                    <div class="progress-display my-3">
                        <div class="progress-container">
                            <div class="progress-bar" style="width:<?= $row['progress'] ?>%"></div>
                        </div>
                        <div class="progress-text mx-1"> <?= $row['progress'] ?>%</div>
                    </div>
                </td>
                <td>
                    <div class="icons-display">
                        <div class="m-1">
                            <a href="hapus.php?id=<?= $row["id_projectname"]; ?>" type="button" class="btn bg-danger" onclick="return confirm('Data akan dihapus ?');">
                            <i data-feather="trash" class="icon"></i>
                            </a>
                        </div>
                        <div class="m-1">
                            <a href="ubah.php?id=<?= $row["id_projectname"]; ?>" type="button" class="btn bg-success">
                            <i data-feather="edit-2" class="icon"></i>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach ; ?>
        </table>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script>
        feather.replace()
    </script>
</body>
</html>