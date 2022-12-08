<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data</title>
</head>
<body>
  <div class="header-4-3 container-xxl mx-auto p-0 position-relative" style="font-family: 'Poppins', sans-serif;">
        <div class="container" style="color: rgb(0, 0, 0);">
          <div class="row header-title">
            <h1 style="text-align: center;"><b>CV. TRIJAYA ABADI ELECTRIC</b></h1>
            <p style="text-align: center;"><i>Pusat Fabrication MDP dan LVMDP, Genset Syncrone, Capastior Bank Installation</i></p>
            <p style="text-align: center; margin-top: -10px;"><i>General Trading, Electrical Component Supplier, Mechanical Component Supplier</i></p>
          </div>
          <b><hr style="width: 100%; height: 5px; color: rgb(0, 0, 0);"></b>
        </div>
    <div class="container">
        <h1 style="text-align: center">WORK ORDER</h1>

          <!-- <div class="mx-auto d-flex flex-lg-row flex-column hero">
            <!-- Left Column -->
<!-- <b><hr style="width: 100%; height: 5px; color: rgb(0, 0, 0);"></b> -->
     
    </div>

    <table>
            <tr>
                <td>Nama Pekerja</td>
                <td>:</td>
                <td><?php echo $order['nama'];?></td>
            </tr>
            <tr>
                <td>Jenis Pekerjaan</td>
                <td>:</td>
                <td><?php echo $order['jenis_pekerjaan'];?></td>
            </tr>
            <tr>
                <td>Lokasi Pekerjaan</td>
                <td>:</td>
                <td><?php echo $order['lokasi'];?></td>
            </tr>
            <tr>
                <td>Durasi Pekerjaan</td>
                <td>:</td>
                <td><?php echo $order['durasi'];?></td>
            </tr>
        </table>
    <br>
    <div class="container">
        <table class="table" style="color: rgb(0, 0, 0); border-collapse: collapse;width: 100%;" border="1">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Material</th>
                <th scope="col">Satuan</th>
                <th scope="col">Jumlah Material</th>
                <!-- <th scope="col">Aksi</th> -->
              </tr>
            </thead>
            <?php $no = 1;
                $total_y = 0;
                $total_yy = 0;
            ?>
          <!-- @foreach ($kode as $item) -->
            <tbody style="text-align: center;">
            <?php 
            foreach ($material as $item) :
            $total_y = $item['jumlah'] * $item['harga'];
            $total_yy += $total_y;
            ?>
              <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $item['nama']?></td>
                <td><?php echo $item['satuan']?></td>
                <td><?php echo $item['jumlah']?></td>
              </tr>
              <!-- Total keseluruhan -->
              
              <?php endforeach;?>
            </tbody>
            
          </table>
    </div>
    <div class="container" style="margin-top: 40px;">
        <table class="table" style="color: rgb(0, 0, 0); border-collapse: collapse;width: 100%;" border="1">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Alat</th>
                <th scope="col">Jenis Alat</th>
                <th scope="col">Tipe Alat</th>
                <th scope="col">Kondisi Alat</th>
                <th scope="col">Harga Alat</th>
              </tr>
            </thead>
            <?php $no = 1;
                $total_y = 0;
                $total_yy = 0;
            ?>
          <!-- @foreach ($kode as $item) -->
            <tbody style="text-align: center;">
            <?php 
            foreach ($alat as $item) :
            $total_y = $item['harga'];
            $total_yy += $total_y;
            ?>
              <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $item['nama_alat']?></td>
                <td><?php echo $item['jenis']?></td>
                <td><?php echo $item['tipe']?></td>
                <td><?php echo $item['kondisi']?></td>
              </tr>
              <!-- Total keseluruhan -->
              
              <?php endforeach;?>
            </tbody>
           
          </table>
    </div>
    <div class="container"> 
      <div class="row">
        <p>
          Pembayaran untuk invoice ini mohon ditransfer ke rekening <br>
          Bank BCA Cab. Kliwon<br>
          No. Rekening 000000000 <br>
          Atas Nama CV. TRIJAYA ELECTRIC ABADI
        </p>
      </div>  
    </div>
    <div class="container">
      <div class="row">
        <table style="margin-left: 80%;">
          <tr>
            <td>
              <div style="text-align: center;">
                Hormat Kami,
              </div>
              <div style="text-align: center;">
                  <p style="    margin-top: 60%;"><u>Mr. X</u> <br>
                  General Manager
                  </p>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
<script>
    // window.print();
</script>
</body>
</html>