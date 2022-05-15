</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-navbar-dark bg-dark">
  
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
  <a class="btn btn-outline-light mr-sm-1" href="./">Imobiliária</a>
      <div class="navbar-header">
  <a class="btn btn-outline-light mr-sm-1" href="casas.php">Casas</a>
  <a class="btn btn-outline-light mr-sm-1" href="apartamentos.php">Apartamentos</a>
  </div>
  </div>
  <div class="nav navbar-nav navbar-right">
          <?php if(isset($_SESSION['logado']) && !empty($_SESSION['logado'])){ ?>
              <li class="nav-item"><a class="nav-link disabled" href="meus_imoveis.php">Meus Imóveis</a></li>
               <li class="nav-item"><a class="nav-link" href="sair.php">Sair</a></li>
              <?php  } else { ?>
                  <li class="nav-item"><a class="nav-link disabled" href="cadastro_cliente.php">Cadastre-se</a></li>
               <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
<?php } ?>
              </div>
  
</nav>
