<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Hasil Pencarian Data Pekerja</h2>
  <p></p>
  <table class="table">
    <thead>
      <tr>
        <th>Nama</th>
        <th>gender</th>
        <th>phone</th>
        <th>address</th>
        <th>Email</th>
        <th>Status Pesan</th>
      </tr>
    </thead>
    <tbody>
     <?php
        if(count($cari)>0)
          {
            foreach ($cari as $data) {
              // echo "<td>" . $user['email'] . "</td>";
           echo "<tr>";
            echo "<td>". $data->name . "<br>";
            echo "<td>". $data->gender . "<br>";
            echo "<td>". $data->phone. "<br>";
            echo "<td>". $data->address . "<br>";
            echo "<td>". $data->email . "<br>";
            echo "<td>". $data->status_pesan . "<br>";
            echo "</tr>";
            }
          }
      
          else
          {
            echo "Data tidak ditemukan";
            echo "<script>window.location='".site_url('customer')."';</script>";
          }
     ?>
    </tbody>
  </table>
</div>

</body>
</html>

