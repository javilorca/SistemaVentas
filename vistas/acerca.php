<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Acerca de</h1>
	                        <div class="box-tools pull-right">
	                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body">
                    	<h4>Proyecto: </h4> <p>Sistema de Ventas, Compras y Almacén</p>
		                <h4>Empresa: </h4> <p>Javier Lorca</p>
		                <h4>Desarrollado por: </h4> <p>javier.lorca@outlook.es</p>
		                <h4>Web: </h4><a href="https://www.javierlorca.net" target="_blank"> <p>www.javierlorca.net</p></a>
		                <h4>Github: </h4> <a href="https://github.com/javilorca/" target="_blank"><p>Mis proyectos en Github</p></a>
		                <h4>Canal Youtube: </h4> <a href="https://www.youtube.com/" target="_blank"><p>www.youtube.com</p></a>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<?php 
}
ob_end_flush();
?>


