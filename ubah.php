<?php
    require 'functions.php';
    
    $id = $_GET["id"];

    $pm = query("SELECT * FROM project_monitoring WHERE id_projectname = $id")[0];

    if(isset($_POST["submit"])){        
        if(ubah($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <h1 class="container pm mt-4">Ubah Data Project Monitoring</h1>

    <div class="container p-5 bg-light bg-opacity-75 rounded my-5 container-form">
        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $pm["id_projectname"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $pm["gambar"]; ?>">
            <div class="mb-3">
                <label class="form-label ms-4" for="project_name">Project name : </label>
                <input class="form-control" type="text" name="project_name" id="project_name" required value="<?= $pm["project_name"]; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="client">Client : </label>
                <input class="form-control" type="text" name="client" id="client" required value="<?= $pm["client"]; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="project_leader">Project leader : </label>
                <input class="form-control" type="text" name="project_leader" id="project_leader" required value="<?= $pm["project_leader"]; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="email_project_leader">Email project leader : </label>
                <input class="form-control" type="email" name="email_project_leader" id="email_project_leader" required value="<?= $pm["email_project_leader"]; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="start_date">Start date : </label>
                <input class="form-control" type="date" name="start_date" id="start_date" required value="<?= $pm["start_date"]; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="end_date">End date : </label>
                <input class="form-control" type="date" name="end_date" id="end_date" required value="<?= $pm["end_date"]; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="progress">progress : </label>
                <input class="form-control" type="int" name="progress" id="progress" required value="<?= $pm["progress"]; ?>">
            </div>
            <div class="mb-3">
                <label src="img/<?= $pm['gambar']; ?>" class="form-label mx-4" for="gambar">Gambar : </label>
                <input type="file" name="gambar" id="gambar">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary my-3 mx-5" type="submit" name="submit">Ubah Data!</button>
            </div>
        </form>
    </div>
</body>
</html>
