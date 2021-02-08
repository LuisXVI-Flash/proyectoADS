<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='UTC-5'>
    <!-- <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href='/docs/4.0/assets/img/favicons/favicon.ico'> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Dibruesma E.I.R.L.</title>
    <!-- <script src='../js/bootstrap.min.js'></script> -->

             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>        
             <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>

  </head>
<body>
  <nav class="navbar navbar-light" style="background-color: #51AFDA;">
  <div class="container-fluid">
  <ul class="nav justify-content-start">
  <li class="nav-item">
        <a class="nav-link text-light " href='../securityModule/getUsuario.php'>DIBRUESMA E.I.R.L.</a>
</li>
  </ul>

      <ul class="nav justify-content-end">
      
      <li class="nav-item">
      <span class="iconify" data-inline="false" data-icon="bx:bx-user" style="color: #5C636A; font-size: 40px;"></span>

        </li> 
        <li class="nav-item">
          <p  class="nav-link text-center" style="color:#5C636A;">Bienvenid@, <?php echo $_SESSION['trabajador']?><br><?php echo $_SESSION["nombreCargo"]?></p>
        </li> 
        <li class="nav-item">
            <p class="nav-link"></p>
        </li> 
        <li class="nav-item">
        <p></p>
        <a  class="btn btn-secondary" href='../shared/cerrarSesion.php?view='>Cerrar Sesion</a></li>
      </ul>
  </div>
  </nav>
      
  <div class='container-fluid'>
			      <div class='row'>
			        <nav class='col-md-2 d-none d-md-block bg-light sidebar' style="background-color: #e3f2fd;">
			          <div class='sidebar-sticky'>
			            <ul class='nav flex-column'>
			              <li class='nav-item'>
			                <a class='nav-link active' href='../securityModule/getUsuario.php'>
			                  <span data-feather='home'></span>
			                  Inicio <span class='sr-only'>(current)</span>
			                </a>
			              </li>
