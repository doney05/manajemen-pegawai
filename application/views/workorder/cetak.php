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
        <h1 style="text-align: center">INVOICE</h1>
        <div>
          <div style="    text-align: left;
          margin-right: 3%;">
          <table style="    margin-left: 65%;">
            <tr>
                <td>Nomor Invoice</td>
                <td>:</td>
                <td><?php echo $workorder['id_workorder'].' '.'-'.' '.$workorder['no_invoice'];?></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?php echo $workorder['tgl_po'];?></td>
            </tr>
            <tr>
                <td>Nomor PO</td>
                <td>:</td>
                <td><?php echo $workorder['id_workorder'].' '.'-'.' '.$workorder['no_po'];?></td>
            </tr>
            <tr>
                <td>Tanggal PO</td>
                <td>:</td>
                <td><?php echo $workorder['tgl_po'];?></td>
            </tr>
        </table>
              
                <!-- <a href="<?php echo base_url()."index.php/home/tambah"?>" class="btn btn-primary">
                  <i class="fas fa-plus fa-sm text-white-50"></i> Ganti Foto
                </a> -->
          </div>
          <div class="mx-auto d-flex flex-lg-row flex-column hero" style="margin-top: -70px;">
            <!-- Left Column -->
            <div
              class="left-column d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
              <p style="    margin-top: -5%;
    margin-bottom: 5%;">Kepada Yth. <br>
                <b><?php echo $workorder['order_dari'];?></b> <br>
                <?php echo $workorder['alamat'];?>
                </p>
              
            </div>
            <!-- Right Column -->
            <div class="slickshow right-column-medium  d-flex justify-content-lg-end justify-content-center pe-0" >
            </div>
          </div>
        </div>

          <!-- <div class="mx-auto d-flex flex-lg-row flex-column hero">
            <!-- Left Column -->
            
    </div>

    <b><hr style="width: 100%; height: 5px; color: rgb(0, 0, 0);"></b>
        <table>
            <tr>
                <td>Nama Pekerjaan</td>
                <td>:</td>
                <td><?php echo $workorder['nama'];?></td>
            </tr>
            <tr>
                <td>Jenis Pekerjaan</td>
                <td>:</td>
                <td><?php echo $workorder['jenis'];?></td>
            </tr>
            <tr>
                <td>Lokasi Pekerjaan</td>
                <td>:</td>
                <td><?php echo $workorder['lokasi'];?></td>
            </tr>
            <tr>
                <td>Anggaran Pekerjaan</td>
                <td>:</td>
                <td><?php echo $workorder['anggaran'];?></td>
            </tr>
            <tr>
                <td>Durasi Pekerjaan</td>
                <td>:</td>
                <td><?php echo $workorder['durasi'];?></td>
            </tr>
        </table>
    </div>
    <br>
    <div class="container">
        <table class="table" style="color: rgb(0, 0, 0); border-collapse: collapse;width: 100%;" border="1">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Material</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga Material</th>
                <th scope="col">Jumlah Material</th>
                <th scope="col">Total Biaya</th>
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
                <td style="text-align: right;">Rp. <?php echo $item['harga']?></td>
                <td><?php echo $item['jumlah']?></td>
                <td style="text-align: right;">Rp. <?php echo $total_y; ?></td>
              </tr>
              <!-- Total keseluruhan -->
              
              <?php endforeach;?>
            </tbody>
            <td style="text-align: center;"><?php echo $no++;?></td>
    
              <td colspan="3"></td>
              <th style="text-align: center;">Sub Total</th>
              <td style="text-align: right;">Rp. <?php echo $total_yy?></td>

              <tr>
              <td style="text-align: center;"><?php echo $no++;?></td>
              <td colspan="3"></td>
              <th style="text-align: center;">Diskon</th>
              <td style="text-align: right;">0.00</td>
            </tr>
            <tr >
            <td style="text-align: center;"><?php echo $no++;?></td>
            <td colspan="3"></td>
              <th style="text-align: center;"> Total</th>
              <td style="text-align: right;">Rp. <?php echo $total_yy?></td>
            </tr>
            <tr >
            <td style="text-align: center;"><?php echo $no++;?></td>
            <td colspan="3"></td>
              <th style="text-align: center;"> PPN</td>
              <td style="text-align: right;">Rp. <?php echo $total_yy * 11 / 100?> </td>
            </tr>
            <tr >
            <td style="text-align: center;"><?php echo $no++;?></td>
            <td colspan="3"></td>
              <th style="text-align: center;"> Grand Total</th>
              <td style="text-align: right;">Rp. <?php echo $total_yy + ($total_yy * 11 / 100)?> </td>
            </tr>
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
                <td style="text-align: right;">Rp. <?php echo $item['harga']?></td>
              </tr>
              <!-- Total keseluruhan -->
              
              <?php endforeach;?>
            </tbody>
            <td style="text-align: center;"><?php echo $no++;?></td>
    
              <td colspan="3"></td>
              <th style="text-align: center;">Sub Total</th>
              <td style="text-align: right;">Rp. <?php echo $total_yy?></td>

              <tr>
              <td style="text-align: center;"><?php echo $no++;?></td>
              <td colspan="3"></td>
              <th style="text-align: center;">Diskon</th>
              <td style="text-align: right;">0.00</td>
            </tr>
            <tr >
            <td style="text-align: center;"><?php echo $no++;?></td>
            <td colspan="3"></td>
              <th style="text-align: center;"> Total</th>
              <td style="text-align: right;">Rp. <?php echo $total_yy?></td>
            </tr>
            <tr >
            <td style="text-align: center;"><?php echo $no++;?></td>
            <td colspan="3"></td>
              <th style="text-align: center;"> PPN</td>
              <td style="text-align: right;">Rp. <?php echo $total_yy * 11 / 100?> </td>
            </tr>
            <tr >
            <td style="text-align: center;"><?php echo $no++;?></td>
            <td colspan="3"></td>
              <th style="text-align: center;"> Grand Total</th>
              <td style="text-align: right;">Rp. <?php echo $total_yy + ($total_yy * 11 / 100)?> </td>
            </tr>
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