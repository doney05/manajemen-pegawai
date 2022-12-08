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
        <h1 style="text-align: center">SLIP GAJI</h1>
        <div>
          <div style="    text-align: left;
          margin-right: 3%;">
          <table style="    margin-left: 65%;">
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?php echo $all_bulan ;?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $user['name']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $user['alamat'];?></td>
            </tr>
            <tr>
                <td>Divisi</td>
                <td>:</td>
                <td><?php echo $user['divisi'];?></td>
            </tr>
        </table>
              
          </div>
        </div>

          <!-- <div class="mx-auto d-flex flex-lg-row flex-column hero">
            <!-- Left Column -->
            
    </div>
    </div>
    <br>
    <div class="container">
        <table class="table" style="color: rgb(0, 0, 0); border-collapse: collapse;width: 100%;" border="1">
            <thead>
              <tr>
                <th scope="col">Hari</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam Pulang</th>
                <th scope="col">Gaji Per Jam</th>
                <th scope="col">Gaji Per Hari</th>
                <th scope="col">Uang Makan</th>
                <th scope="col">Uang Lembur</th>
                <th scope="col">Kas Bon</th>
                <th scope="col">Total</th>
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
            foreach ($absen as $item) : 
            ?>
            <?php if ($item['keterangan'] == 'Pulang') {
            $total_y = ($item['gajiperhari'] + $item['uangmakan'] + $item['uanglembur']) - $item['kasbon'];
            $total_yy += $total_y;
                ?>

              <tr>
                <td><?php echo $item['hari']?></td>
                <td><?php echo $item['tanggal']?></td>
                <td><?php echo $item['waktu']?></td>
                <td style="text-align: right;">Rp. <?php echo $item['gajiperjam']?></td>
                <td style="text-align: right;">Rp. <?php echo $item['gajiperhari']?></td>
                <td style="text-align: right;">Rp. <?php echo $item['uangmakan']?></td>
                <td style="text-align: right;">Rp. <?php echo $item['uanglembur']?></td>
                <td style="text-align: right;">Rp. <?php echo $item['kasbon']?></td>
                <td style="text-align: right;">Rp. <?php echo $total_y ?></td>
              </tr>
              <!-- Total keseluruhan -->
              <?php 
            } ?>
              <?php endforeach;?>
            </tbody>
              <td colspan="7"></td>
              <th style="text-align: center;">Grand Total</th>
              <td style="text-align: right;">Rp. <?php echo $total_yy; ?></td>
          </table>
    </div>
<script>
    // window.print();
</script>
</body>
</html>