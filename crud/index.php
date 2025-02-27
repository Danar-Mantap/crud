<?php
   include 'koneksi.php';

   $query = "SELECT * FROM tb_siswa;";
   $sql = mysqli_query($conn, $query);
   $no = 0;
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js" ></script>
    
    
    <!-- Font awesoome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>cerud</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            CRUD
          </a>
        </div>
      </nav>

      <!-- Judul -->
       <div class="container">
        <h1>Data Siswa</h1>
        <figure>
          <blockquote class="blockquote">
            <p>Berisi data yang telah disimpan di database.</p>
          </blockquote>
          <figcaption class="blockquote-footer">
          CRUD  <cite title="Source Title">Create Read Update Delete</cite>
          </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i>
            Tambah data
        </a>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
              <thead>
                <tr>
                <th><center>No.</center></th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Jenis kelamin</th>
                <th>Foto Siswa</th>
                <th>Alamat</th>
                <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while($result = mysqli_fetch_assoc($sql)){
                ?>
                <tr>
                <td><center>
                  <?php echo ++$no; ?>
                </center></td>
                <td><?php echo $result['nisn']; ?></td>
                <td><?php echo $result['nama_siswa']; ?></td>
                <td><?php echo $result['jenis_kelamin']; ?></td>
                <td><img src="img/<?php echo $result['foto_siswa']; ?>" style="width: 150px;"></td>
                <td><?php echo $result['alamat']; ?></td>
                <td>
                    <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                    <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return  confirm('Aoakah anda yakin igin menghapus datatersebut?')"><i class="fa fa-trash"></i></button>
                    </td>
                    </tr>
                  <?php
                }
                ?>
                </tbody>
            </table>
            </div>
       </div>
</body>
</html>