<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a href="/inicio" class="brand-link">
    <img src=<?php echo base_url('theme/dist/img/AdminLTELogo.png') ?> alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">FOX</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src=<?php echo base_url('theme/dist/img/user2-160x160.jpg') ?> class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

        <li class="nav-item menu-open">
          <a href="/inicio" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="nav-icon fas fa-home"></i>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Cadastros
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/receita" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
                <p>Receita</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/search/enhanced.html" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
                <p>Enhanced</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item">
          <a href="/usuario/trocar_senha" class="nav-link">
            <p>
              Trocar senha
              <i class="fas fa-lock right"></i>
            </p>
          </a>          
        </li>

      </ul>
    </nav>
  </div>
</aside>