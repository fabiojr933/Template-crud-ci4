<?php
$session = session();
$email = $session->get('usuario');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Bem-Vindo <?php echo $email ?></h1>
        </div>
        <!--   <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div>   -->
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">

    </div>
  </div>
</div>
<!-- /.content-wrapper -->