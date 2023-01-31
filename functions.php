<?php
    $conn = mysqli_connect("localhost", "root", "", "dbcrud_promon");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data) {
        global $conn;
        $project_name = htmlspecialchars($data["project_name"]);
        $client = htmlspecialchars($data["client"]);
        $project_leader = htmlspecialchars($data["project_leader"]);
        $email_project_leader = htmlspecialchars($data["email_project_leader"]);
        $start_date = htmlspecialchars($data["start_date"]);
        $end_date = htmlspecialchars($data["end_date"]);
        $progress = htmlspecialchars($data["progress"]);

        $gambar = upload();
        if( !$gambar ) {
            return false;
        }

        $query = "INSERT INTO project_monitoring
                    VALUES
                    ('', '$project_name', '$client', '$project_leader', '$email_project_leader', '$start_date', '$end_date', '$progress', '$gambar')";  
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload() {

        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        if( $error === 4 ) {
            echo "<script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('yang anda upload bukan gambar!');
                </script>";
            return false;
        }

        if( $ukuranFile > 1000000) {
            echo "<script>
                    alert('ukuran gambar terlalu besar!');
                </script>";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar ;

        move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

        return $namaFileBaru;

    }


    function hapus($id_projectname) {
        global $conn;
        mysqli_query($conn, "DELETE FROM project_monitoring WHERE id_projectname= $id_projectname");

        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;

        $id = $data["id"];
        $project_name = htmlspecialchars($data["project_name"]);
        $client = htmlspecialchars($data["client"]);
        $project_leader = htmlspecialchars($data["project_leader"]);
        $email_project_leader = htmlspecialchars($data["email_project_leader"]);
        $start_date = htmlspecialchars($data["start_date"]);
        $end_date = htmlspecialchars($data["end_date"]);
        $progress = htmlspecialchars($data["progress"]);

        if( $_FILES['gambar']['error'] === 4 ) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }
        
        $query = "UPDATE project_monitoring SET
                    project_name = '$project_name',
                    client = '$client',
                    project_leader = '$project_leader',
                    email_project_leader = '$email_project_leader',
                    start_date = '$start_date',
                    end_date = '$end_date',
                    progress = '$progress',
                    gambar = '$gambar'
                    WHERE id_projectname = $id
                ";  
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword) {
        $query = "SELECT * FROM project_monitoring WHERE project_name LIKE '%$keyword%' OR
                    client LIKE '%$keyword%' OR 
                    project_leader LIKE '%$keyword%' OR 
                    email_project_leader LIKE '%$keyword%'
                ";
        return query($query);
    }
?>