<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>CV. Trijaya Abadi Electric</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
       <section class="abovefold overflow-hidden">
        <style scoped>
            @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap");
            @import url('https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;600;700;800;900&display=swap');

            * {
                font-family: 'Inter', sans-serif !important;
            }

            @media screen and (min-width: 768px) {
                body nav .navigation {
                    margin-left: 80px;
                }
            }

            body nav .navigation li {
                margin-right: 32px;
            }

            body nav .navigation a {
                font-size: 16px;
                font-weight: 400 !important;
                color: #16171C !important;
            }

            body nav .authentication li {
                margin-right: 38px;
            }

            body nav .authentication a {
                font-size: 16px;
                font-weight: 700 !important;
            }

            @media screen and (min-width: 768px) {
                body nav .authentication .cl-white {
                    color: #FFFFFF !important;
                }
            }

            @media screen and (max-width: 768px) {
                body nav .authentication .login {
                    width: 100%;
                }
            }

            @media screen and (max-width: 768px) {
                body nav .authentication .login a {
                    background: #518CFF;
                    border-radius: 8px;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    color: #FFFFFF !important;
                    padding: 14px 14px 14px 14px !important;
                }
            }

            body nav .authentication .signup {
                background: #FFFFFF;
                border-radius: 8px;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                color: #518CFF !important;
                padding: 14px 14px 14px 14px !important;
            }

            body .abovefold {
                background: #E4E6EB;
            }

            body .abovefold .header {
                margin-top: 50px;
                margin-bottom: 100px;
            }
            body .abovefold .headline {
                font-family: 'Red Hat Display', sans-serif !important;
                /* font-weight: 700 !important; */
                color: #16171C;
                font-size: 12px;
            }

            @media screen and (max-width: 768px) {
                body .abovefold .headline {
                    /* font-size: 54px; */
                    line-height: 80px !important;
                }
            }

            body .abovefold .sub-headline {
                font-family: 'Red Hat Display', sans-serif !important;
                font-weight: 400 !important;
                font-size: 26px;
                line-height: 38px;
                color: #494C57;
                margin-top: 30px;
                width: 75%;
            }

            @media screen and (min-width: 768px) {
                body .abovefold .sub-headline {
                    width: 373px;
                }
            }

            body .abovefold .four-point {
                margin-top: 80px;
            }

            body .abovefold .card {
                background: #FFFFFF;
                -webkit-box-shadow: -32px 48px 60px rgba(22, 23, 28, 0.04);
                box-shadow: -32px 48px 60px rgba(22, 23, 28, 0.04);
                border-radius: 12px;
                padding: 52px 52px 40px;
                border: 1px solid bla;
            }

            @media screen and (min-width: 768px) {
                body .abovefold .card {
                    width: 464px;
                }
            }

            body .abovefold .card .form-control {
                background: #F8F8FC;
                border-radius: 8px;
                border: none;
                padding: 16px 20px;
                height: 56px;
                font-weight: 600 !important;
            }

            body .abovefold .card .input-title {
                color: #494C57;
                font-size: 16px;
                margin-bottom: 12px;
            }

            body .abovefold .card .btn-card {
                margin-top: 36px;
                background: #000000;
                border-radius: 20px;
                height: 56px;
                padding: 10px;
                color: #FFFFFF;
                font-size: 16px;
                font-weight: 700 !important;
            }

            body .abovefold .card .award {
                font-size: 12px;
                line-height: 18px;
                color: #8D8F98;
            }
        </style>

        <div class="container position-relative" style="color: #E4E6EB">

        </div>


        <div class="container header">
            <div class="row">
                <div class="col-lg-6 mt-md-0">
                    <?php echo form_open_multipart('auth/register', array('method' => 'POST')); ?>    
                    
                    <?php echo $this->session->flashdata('message'); ?>
                        <div class="card card-body">
                            <h1 style="text-align: center; margin-top: -5%;"><b>Sign Up</b> </h1>
                            <div class="input-group mb-4">
                                <label for="input" class="w-100">
                                    <input id="name" type="text" class="form-control mt-2" name="name" value="<?= set_value('name'); ?>" required autocomplete="name" 
                                    placeholder="Nama" autofocus>

                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </label>
                            </div>

                            <div class="input-group mb-4">
                                <label for="input" class="w-100">
                                    <input id="image" type="file" class="form-control mt-2" name="image" value="<?= set_value('image'); ?>"  required autocomplete="image"
                                     placeholder="Image...">Pilih Foto
                                    <?= form_error('image', '<small class="text- danger pl-3">', '</small>'); ?>
                                </label>
                            </div>

                            <div class="input-group mb-4">
                                <label for="input" class="w-100">
                                    <input id="alamat" type="text" class="form-control mt-2" name="alamat" value="<?= set_value('alamat'); ?>"  required autocomplete="alamat"
                                     placeholder="Alamat">
                                     
                                    <?= form_error('alamat', '<small class="text- danger pl-3">', '</small>'); ?>
                                </label>
                            </div>
                            <div class="input-group mb-4">
                                <label for="input" class="w-100">
                                    <input id="jekel" type="text" class="form-control mt-2" name="jekel" value="<?= set_value('jekel'); ?>" required autocomplete="jekel" 
                                    placeholder="Jenis Kelamin">

                                    <?= form_error('jekel', '<small class="text-danger pl-3">', '</small>'); ?>
                                </label>
                            </div>
                            <div class="input-group mb-4">
                                <label for="input" class="w-100">
                                    <input id="ttl" type="text" class="form-control mt-2" name="ttl" value="<?= set_value('ttl'); ?>" required autocomplete="ttl" 
                                    placeholder="TTL">

                                    <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
                                </label>
                            </div>

                            <div class="input-group mb-4">
                                <label for="input" class="w-100">
                                    <input id="email" type="text" class="form-control mt-2" name="email" value="<?= set_value('email'); ?>" required autocomplete="email"
                                     placeholder="Email">

                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </label>
                            </div>
                            <div class="input-group mb-4">
                                <label for="password1" class="w-100">
                                    <input id="password1" type="password" class="form-control mt-2" name="password1" required autocomplete="new-password"
                                     placeholder="Password">

                                     <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </label>
                            </div>   
                            
                            <div class="input-group mb-4">
                                <label for="password2" class="w-100">
                                    
                                    <input id="password2" type="password" class="form-control mt-2" name="password2" required autocomplete="new-password"
                                    placeholder="Konfirmasi Password">
                                </label>
                            </div>  

                            <div class="input-group mb-4">
                                <label for="input" class="w-100">
                                    <input id="divisi" type="text" class="form-control mt-2" name="divisi" value="<?= set_value('divisi'); ?>" required autocomplete="divisi"
                                     placeholder="Divisi">

                                    <?= form_error('divisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </label>
                            </div>


                            <div class="input-group">
                                <label for="input" class="w-100">
                                    <input id="noHP" type="text" class="form-control mt-2" name="noHP" value="<?= set_value('noHP'); ?>" required autocomplete="noHP"
                                     placeholder="No. HP">

                                    <?= form_error('noHP', '<small class="text-danger pl-3">', '</small>'); ?>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-card">Sign Up</button>
                        </div>
                    <?php echo form_close();?>

                </div>
                <div class="col-lg-6 px-md-0 my-auto position-relative">
                    <div class="headline">
                        <h2>Welcome,</h2>
                        <h1 style="    font-size: 38px;">
                            <b>CV. TRIJAYA ABADI ELECTRIC</b>
                        </h1>
                    </div>
                    <div class="sub-headline">
                      <p style="font-size: 13px;
                      width: 139%;     margin-top: -8%;color: #000000;">
                          <i>Pusat Fabrication MDP dan LVMDP, Genset Syncrone, Capasitor Bank Installation,</i>
                          <br>
                        </p>
                     <p style="font-size: 13px;
                        width: 139%;     margin-top: -8%;color: #000000;"><i>General Trading, Electrical Component Supplier, Mechanical Component Supplier</i>
                      </p>
                    </div>
                </div>
            </div>
        </div>
    </section> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
  </html>