<?php
    require 'functions.php';
    
    if(isset($_POST["submit"])){

        if(tambah($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan!');
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
    <title>Tambah data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <h1 class="container pm mt-5">Tambah data Project Monitoring</h1>
    <div class="container p-5 bg-light bg-opacity-75 rounded my-5 container-form">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label ms-4" for="project_name">Project name : </label>
                <input class="form-control" type="text" name="project_name" id="project_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="client">Client : </label>
                <input class="form-control" type="text" name="client" id="client" required>
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="project_leader">Project leader : </label>
                <input class="form-control" type="text" name="project_leader" id="project_leader" required>
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="email_project_leader">Email project leader : </label>
                <input class="form-control" type="email" name="email_project_leader" id="email_project_leader" required>
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="start_date">Start date : </label>
                <input class="form-control" type="date" name="start_date" id="start_date" required>
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="end_date">End date : </label>
                <input class="form-control" type="date" name="end_date" id="end_date" required>
            </div>
            <div class="mb-3">
                <label class="form-label ms-4" for="progress">progress : </label>
                <input class="form-control" type="int" name="progress" id="progress" required>
            </div>
            <div class="mb-3">
                <label class="form-label mx-4" for="gambar">Gambar : </label>
                <input type="file" name="gambar" id="gambar">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary my-3 mx-5" type="submit" name="submit">Tambah Data!</button>
            </div>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
