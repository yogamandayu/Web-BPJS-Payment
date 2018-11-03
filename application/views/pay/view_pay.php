<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <title>Pembayaran BPJS</title>
  </head>
  <body>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo site_url(''); ?>">Indomerit</a>
      </nav>
    </div>
    <table align="center">
      <form class="form" action="<?php echo site_url('pay_controller/show')?>"  method="post">
        <tr>
          <td><input type="text" class="form-control" name="id_account" placeholder="ID Account"></td>
          <td><input type="submit" class="btn btn-primary" name="submit" value="Search"></td>
        </tr>
      </form>
    </table>
    <?php
    if(isset($status)){
      if($status=='1'){
        ?>
        <div class="container">
          <table>
            <tr>
              <td>No. BPJS</td>
              <td>:</td>
              <td><?php echo $id_account ?></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><?php echo $name ?></td>
            </tr>
            <tr>
              <td>Tunggakan</td>
              <td>:</td>
              <td><?php echo ($price * $debt_month); ?></td>
            </tr>
          </table>
          <a href="<?php echo site_url('pay_controller/pay?id_account='); echo $id_account;?>">Bayar</a>
        </div>
      <?php }
      elseif($status=='0'){
        ?>
        <br>
        <br>
        <p align="center">User Not Found</p>
        <?php
      }
      elseif($status=='2'){
        ?>
        <br>
        <br>
        <p align="center">Pembayaran Berhasil</p>
        <?php
      }
      elseif($status=='3'){
        ?>
        <br>
        <br>
        <p align="center">Pembayaran Gagal</p>
        <?php
      }
    }
    ?>
  </body>
</html>
