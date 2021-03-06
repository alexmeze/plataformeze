<?php

include_once("../../includes/clases/class_lib.php");
extract($_GET);
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />    
    <link rel="shortcut icon" href="../../images/logo.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
        <title>Sistema Integral Meze - Nuevo Maestro</title>
	<!-- lib-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
		
	<!-- Theme-->
    <!-- Concat all lib & plugins css-->
    <link id="mainstyle" rel="stylesheet" href="../../assets/stylesheets/theme-libs-plugins.css">
    <link id="mainstyle" rel="stylesheet" href="../../assets/stylesheets/skin.css">

    <!-- Demo only-->
    <link id="mainstyle" rel="stylesheet" href="../../assets/stylesheets/demo.css">
	
	<!-- This page only-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]>
    <script src="assets/scripts/lib/html5shiv.js"></script>
    <script src="assets/scripts/lib/respond.js"></script><![endif]-->
    <script src="../../assets/scripts/lib/modernizr-custom.js"></script>
    <script src="../../assets/scripts/lib/respond.js"></script>
	
        <link rel="stylesheet" href="../../estilo/general.css" />
        <link rel="stylesheet" href="../../estilo/formas.css" />
        <link rel="stylesheet" href="../../estilo/formas_extensas.css" />
        
        <style>
            

            #boton_nuevo_telefono
            {
                border: 1px solid #CCCCCC;
                height: 30px;
                width: 90px;
            }

            .telefono
            {
                height: 60px;
                overflow: auto;
            }

            .telefonoVal
            {
                border: 1px solid #A4C7E1;
                height: 26px;
                width: 290px;
            }

            #boton_nuevo_telefono img
            {
                float: left;
                margin: 5px;
            }

            .tipo_telefono
            {
                border: 1px solid #A4C7E1;
                height: 30px;
                padding: 5px 0 0 5px;
                width: 100px;
            }

            #boton_nuevo_telefono:hover{ border: 1px solid #BBBBBB; background-color: #EEEEEE; }
            .img_eliminar_telefono
            {
                float: left;
                height: 30px;
                margin: 15px 0;
                width: 30px;
            }
        </style>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <!--<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>-->
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="../../librerias/messages_es.js"></script>
        <script>
            var string_telefono = "" +
                "<div class='telefono' >" +
                "<div class='telefono_apartado' style='overflow: auto; width: 120px; float: left'>" +
                "<label>Tipo</label>" +
                "<?php
                    $tipos = Telefono::getTipos();
                    echo "<select class='tipo_telefono'>";
                    if(is_array($tipos))
                    {
                        foreach($tipos as $tipo)
                        {
                            echo "<option value='".$tipo['id_tipo_telefono']."' >".$tipo['tipo_telefono']."</option>";
                        }
                    }
                    echo "</select>";
                ?>"
                +
                "</div>" +
                "<div style='float: left; width: 300px; overflow: auto'>" +
                "<label>Tel&eacute;fono</label>" +
                "<input type='text' class='telefonoVal' />" +
                "</div>" +
                "<img src='../../media/iconos/close.png' alt='X' class='img_eliminar_telefono' onclick='$(this).parent().remove();'/>" +
                "</div>";
            $(document).ready(function ()
            {
                asignarReglasValidacion();
                $("#forma_nuevo_maestro").tabs();
            });

            function asignarReglasValidacion()
            {
                $('#forma_nuevo_maestro').validate({
                    rules:
                    {
                        "apellido_paternoVal": { required: true },
                        "nombresVal": { required: true }
                    },
                    ignore: ""
                })
            }

            function submitClicked()
            {
                if($("#forma_nuevo_maestro").valid())
                {
                    if(confirm("¿Desea agregar al docente?"))
                    {
                        $("#boton_aceptar").attr('disabled', 'disabled');
                        /** Datos */
                        var apellido_paterno    = $("#apellido_paternoVal").val();
                        var apellido_materno    = $("#apellido_maternoVal").val();
                        var nombres             = $("#nombresVal").val();
                        var sexo                = $("#sexoVal").val();
                        var calle               = $("#calleVal").val();
                        var numero              = $("#numeroVal").val();
                        var colonia             = $("#coloniaVal").val();
                        var CP                  = $("#CPVal").val();

                        /** Escolaridad */
                        var titulo      = $("#tituloVal").val();
                        var egresado    = $("#egresadoDeVal").val();
                        var ano         = $("#anoVal").val();

                        /** Teléfonos */
                        var telefonos = [];

                        $(".telefono").each(function(){
                            var tipo = $(this).find('.tipo_telefono').val();
                            var telefono = $(this).find('.telefonoVal').val();
                            if(telefono.length > 0) telefonos.push({"tipo":tipo, "telefono":telefono});
                        });

                        $.ajax({
                            type: "POST",
                            url: "../../includes/acciones/maestros/insert.php",
                            data: "apellido_paterno=" + apellido_paterno + "&apellido_materno=" + apellido_materno
                                + "&nombres=" + nombres + "&sexo=" + sexo + "&calle=" + calle + "&numero=" + numero
                                + "&colonia=" + colonia + "&CP=" + CP + "&titulo=" + titulo
                                + "&egresado=" + egresado + "&ano=" + ano + "&telefonos=" + JSON.stringify(telefonos),
                            success: function (data)
                            {
                                if(data == 0)
                                {
                                    alert("Maestro agregado");
                                    window.location.href = "index.php";
                                }
                            }
                        });
                    }
                }
            }

            function nuevoTelefono()
            {
                $("#div_telefonos").append(string_telefono);
            }
        </script>
    </head>
    <body class="stellar">
    <!-- #SIDEMENU-->
    <div class="mainmenu-block">
      <!-- SITE MAINMENU-->
      <nav class="menu-block">
        <ul class="nav">
          <li class="nav-item mainmenu-user-profile"><a href="#">
              <div class="circle-box"><img src="../../media/fotos/photo_NA.jpg" alt="">
                <div class="dot dot-success"></div>
              </div>
              <div class="menu-block-label"><b><?php if(isset($_SESSION['nombres'])) echo $_SESSION['nombres'] ; ?></b>
			  <br>Administrador
			  </div></a></li>
        </ul>
       
        <ul class="nav">
          <li class="nav-item"><a href="../../index.php" class="nav-link"> <i class="icon ion-home"></i>
              <div class="menu-block-label">
                 Inicio
              </div></a></li>
         
          <!--li.header administradores-->
          <li class="menu-block-has-sub nav-item"><a href="#" class="nav-link"> <i class="icon ion-stats-bars"></i>
              <div class="menu-block-label">Estadisticas</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a href="../estadisticas/stats.php" class="nav-link">Personal</a></li>
              <li class="nav-item"><a href="../estadisticas/cuentas.php" class="nav-link">Cuentas</a></li>
            </ul>
          </li>
          <li class="menu-block-has-sub nav-item"><a href="#" class="nav-link"> <i class="icon ion-ios-clock-outline"></i>
              <div class="menu-block-label">Ciclos</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a href="../ciclos_escolares/index.php" class="nav-link">Lista</a></li>
              <li class="nav-item"><a href="../ciclos_escolares/nuevo.php" class="nav-link">Nuevo</a></li>
            </ul>
          </li>
          <li class="menu-block-has-sub nav-item"><a href="#" class="nav-link"> <i class="icon ion-ios-body"></i>
              <div class="menu-block-label">Alumnos</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a href="../alumnos/index.php" class="nav-link">Todos</a></li>
              <li class="nav-item"><a href="../alumnos/alumnos_inscritos.php" class="nav-link">Inscritos</a></li>
			  <li class="nav-item"><a href="../alumnos/inscribir.php" class="nav-link">Inscribir</a></li>
			  <li class="nav-item"><a href="../alumnos/reinscribir.php" class="nav-link">Reinscribir</a></li>
			  <li class="nav-item"><a href="../tareas/asignar.php" class="nav-link">Asignar Tareas</a></li>
            </ul>
          </li>
		  <li class="menu-block-has-sub nav-item"><a href="#" class="nav-link"> <i class="icon ion-ios-people"></i>
              <div class="menu-block-label">Maestros</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a href="../maestros/index.php" class="nav-link">Todos</a></li>
              <li class="nav-item"><a href="../maestros/nuevo.php" class="nav-link">Nuevos</a></li>
			  <li class="nav-item"><a href="../maestros/maestros_actuales.php" class="nav-link">Vigentes</a></li>
			  <li class="nav-item"><a href="../maestros/asistencia.php" class="nav-link">Asistencias</a></li>
            </ul>
          </li>
		  <li class="menu-block-has-sub nav-item"><a href="#" class="nav-link"> <i class="icon ion-gear-b"></i>
              <div class="menu-block-label">Admin</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a href="../administradores/index.php" class="nav-link">Ver Todos</a></li>
              <li class="nav-item"><a href="../administradores/nuevo.php" class="nav-link">Nuevo</a></li>
            </ul>
          </li>
		  <li class="menu-block-has-sub nav-item"><a href="#" class="nav-link"> <i class="icon ion-university"></i>
              <div class="menu-block-label">Becas</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a href="../becas/lista.php" class="nav-link">Listas</a></li>
              <li class="nav-item"><a href="../becas/nueva.php" class="nav-link">Nuevas</a></li>
			  <li class="nav-item"><a href="../becas/tipos.php" class="nav-link">Tipos</a></li>
            </ul>
          </li>
		  <li class="menu-block-has-sub nav-item"><a href="#" class="nav-link"> <i class="icon ion-arrow-graph-up-right"></i>
              <div class="menu-block-label">Grados</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a href="../grados/index.php" class="nav-link">Lista</a></li>
              <li class="nav-item"><a href="../grados/nuevo.php" class="nav-link">Nuevo</a></li>
            </ul>
          </li>
		  <li class="menu-block-has-sub nav-item"><a href="../grupos/index.php" class="nav-link"> <i class="icon ion-university"></i>
              <div class="menu-block-label">Grupos</div></a>
          </li>
		  <li class="menu-block-has-sub nav-item"><a href="../materias/index.php" class="nav-link"> <i class="icon ion-ios-book"></i>
              <div class="menu-block-label">Materias</div></a>
          </li>
		  <li class="menu-block-has-sub nav-item"><a href="#" class="nav-link"> <i class="icon ion-cash"></i>
              <div class="menu-block-label">Cuentas</div></a>
              <ul class="nav menu-block-sub">
              <li class="nav-item menu-block-has-sub"><a href="#" class="nav-link">Pagos</a>
			  <ul class="nav menu-block-sub">
			   <li class="nav-item"><a href="../cuentas/pagos/inscripcion.php" class="nav-link">Inscripci&oacute;n</a></li>
			   <li class="nav-item"><a href="../cuentas/pagos/colegiaturas.php" class="nav-link">Colegiaturas</a></li>
			   <li class="nav-item"><a href="../cuentas/pagos/cuotas.php" class="nav-link">Cuotas</a></li>
			  </ul>
			  </li>
              <li class="nav-item menu-block-has-sub"><a href="#" class="nav-link">Descuentos</a>
			  <ul class="nav menu-block-sub">
			   <li class="nav-item"><a href="../cuentas/descuentos/lista.php" class="nav-link">Lista</a></li>
			   <li class="nav-item"><a href="../cuentas/descuentos.php" class="nav-link">Nuevos</a></li>
			  </ul>
			  </li>
			  <li class="nav-item"><a href="../cuentas/recibos.php" class="nav-link">Recibos</a></li>
            </ul>
          </li>
		  <li class="menu-block-has-sub nav-item"><a href="#" class="nav-link"> <i class="icon ion-settings"></i>
              <div class="menu-block-label">Config.</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a href="../configuracion/clubs/index.php" class="nav-link">Club</a></li>
              <li class="nav-item"><a href="../configuracion/colonias/index.php" class="nav-link">Colonias</a></li>
			  <li class="nav-item"><a href="../configuracion/papeleria/index.php" class="nav-link">Papeleria</a></li>
			  <li class="nav-item"><a href="../configuracion/ocupaciones/index.php" class="nav-link">Ocupaciones</a></li>
			  <li class="nav-item"><a href="../configuracion/cuentas_dinamicas/index.php" class="nav-link">Cuentas Dinamicas</a></li>
            </ul>
          </li>
        </ul>
        <!-- END SITE MAINMENU-->
      </nav>
    </div>

    <!-- #MAIN-->
    <div class="main-wrapper">

      <!-- VIEW WRAPPER-->
      <div class="view-wrapper">

        <!-- TOP WRAPPER-->
        <div class="topbar-wrapper">

          <!-- NAV FOR MOBILE-->
          <div class="topbar-wrapper-mobile-nav"><a href="#" class="topbar-togger js-minibar-toggler"><i class="icon ion-ios-arrow-back hidden-md-down"></i><i class="icon ion-navicon-round hidden-lg-up"></i></a><a href="#" class="topbar-togger pull-xs-right hidden-lg-up js-nav-toggler"><i class="icon ion-android-person"></i></a>

            <!-- ADD YOUR LOGO HEREText logo: a.topbar-wrapper-logo(href="#") AdminHero
            --><a href="index.php" class="topbar-wrapper-logo demo-logo">Colegio MEZE</a>
          </div>
          <!-- END NAV FOR MOBILE-->

          <!-- SEARCH-->
          <div class="topbar-wrapper-search">
            <form>
              <input type="search" placeholder="Search" class="form-control"><a href="#" class="topbar-togger topbar-togger-search js-close-search"><i class="icon ion-close"></i></a>
            </form>
          </div>
          <!-- END SEARCH-->

          <!-- TOP RIGHT MENU-->
          <ul class="nav navbar-nav topbar-wrapper-nav">
            <li class="nav-item"><a href="#" class="nav-link js-search-togger"><i class="icon ion-ios-search-strong"></i></a></li>

            
            <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="nav-link"><i class="icon ion-paintbucket"></i></a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg"> 
                <div class="js-color-switcher demo-color-switcher">
                  <div class="dropdown-header">Flat</div>
                  <div class="list-inline"><a href="#" data-color="f-dark" class="list-inline-item">
                      <div class="demo-skin-grid f-dark"></div></a><a href="#" data-color="f-dark-blue" class="list-inline-item">
                      <div class="demo-skin-grid f-dark-blue"></div></a><a href="#" data-color="f-blue" class="list-inline-item">
                      <div class="demo-skin-grid f-blue"></div></a><a href="#" data-color="f-green" class="list-inline-item">
                      <div class="demo-skin-grid f-green"></div></a>
                  </div>
                  <div class="dropdown-header">Gradient</div>
                  <div class="list-inline"><a href="#" data-color="orchid" class="list-inline-item">
                      <div class="demo-skin-grid orchid"></div></a><a href="#" data-color="cadetblue" class="list-inline-item">
                      <div class="demo-skin-grid cadetblue"></div></a><a href="#" data-color="joomla" class="list-inline-item">
                      <div class="demo-skin-grid joomla"></div></a><a href="#" data-color="influenza" class="list-inline-item">
                      <div class="demo-skin-grid influenza"></div></a><a href="#" data-color="moss" class="list-inline-item">
                      <div class="demo-skin-grid moss"></div></a><a href="#" data-color="mirage" class="list-inline-item">
                      <div class="demo-skin-grid mirage"></div></a><a href="#" data-color="stellar" class="list-inline-item">
                      <div class="demo-skin-grid stellar"></div></a><a href="#" data-color="servquick" class="list-inline-item">
                      <div class="demo-skin-grid servquick"></div></a>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item"><a href="../../login.php" class="nav-link"><i class="icon ion-android-exit"></i></a></li>
           
          
            
           <li class="nav-item"><a href="../../login.php" class="nav-link close-mobile-nav js-close-mobile-nav"><i class="icon ion-close"></i></a></li>
            <!-- END TOP RIGHT MENU-->
          </ul>
        </div>
        <!--END TOP WRAPPER-->
		
		<!-- PAGE CONTENT HERE-->
        <!-- #PAGE HEADER-->
        <!-- PAGE HEADER-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Nuevo Maestro</div>
                  
                </div>
              </div>
            </div>
            
          </div>
        </div>

		<div class="container-fluid">
        <div class="panel-wrapper">
		
          
              <div class="panel">
                <div class="panel-body">
                  <ul role="tablist" class="nav nav-pills nav-justified text-uppercase">
                    <li class="nav-item"><a href="#demo3tab-1" aria-controls="demo3tab-1" role="tab" data-toggle="tab" class="nav-link active">Datos</a></li>
                    <li class="nav-item"><a href="#demo3tab-2" aria-controls="demo3tab-2" role="tab" data-toggle="tab" class="nav-link">Escolaridad</a></li>
					<li class="nav-item"><a href="#demo3tab-3" aria-controls="demo3tab-3" role="tab" data-toggle="tab" class="nav-link">Telefonos</a></li>
			      </ul>
                  <div class="tab-content">
                    <div role="tabpanel" id="demo3tab-1" class="tab-pane p-y-2 active fade in">
					<form autocomplete="off" method="post" action="#" id="forma_nuevo_maestro">
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label for="formBasicLastName" class="form-form-control-label">Apellido Paterno</label>
                        <input name="apellido_paternoVal" id="apellido_paternoVal" type="text" placeholder="Apellido Paterno" autocomplete="off" class="form-control" required>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="formBasicLastName" class="form-form-control-label">Apellido Materno</label>
                        <input name="apellido_maternoVal" id="apellido_maternoVal" type="text" placeholder="Apellido Materno" autocomplete="off" class="form-control">
                      </div>
					</div>  
                    <div class="row">
					<div class="form-group col-sm-6">
                      <label for="formBasicFirstName" class="form-form-control-label">Nombres</label>
                      <input name="nombresVal" id="nombresVal" required type="text" placeholder="Nombres" autocomplete="off" class="form-control">
                    </div>
				    <div class="form-group col-sm-6">
                      <label class="form-form-control-label">Sexo</label>
                      <div>
                      <select data-plugin="selectpicker" class="form-control" id="sexoVal" name="sexoVal">
                       <option value="M">M</option>
                       <option value="F">F</option>
                       <option value="N/A">N/A</option>
                      </select>
                      </div>
                    </div>
					</div>
					<div class="row">
					<div class="form-group col-sm-3">
                      <label for="formBasicCalle" class="form-form-control-label">Calle</label>
                      <input name="calleVal" id="calleVal" type="text" placeholder="Calle" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group col-sm-3">
                     <label for="formBasicNumber" class="form-form-control-label">N&uacute;mero</label>
                      <input name="numeroVal" id="numeroVal" type="text" placeholder="Calle" autocomplete="off" class="form-control">
                    </div>
					<div class="form-group col-sm-3">
                      <label class="form-form-control-label">Colonia</label>
                      <div>
                      <select data-plugin="selectpicker" class="form-control" name="coloniaVal" id="coloniaVal" required>
                       <?php
                                    $colonias = Colonia::getColonias();
                                    foreach($colonias as $colonia)
                                    {
                                        echo "<option value='".$colonia['id_colonia']."' >".$colonia['nombre']."</option>";
                                    }
                       ?>
                      </select>
                      </div>
                     </div>
					 <div class="form-group col-sm-3">
                     <label for="formBasicCP" class="form-form-control-label">CP</label>
                      <input name="CPVal" id="CPVal" type="text" placeholder="CP" autocomplete="off" class="form-control">
                     </div>
                    </div>
					</div>
                    <div role="tabpanel" id="demo3tab-2" class="tab-pane p-y-2 fade"><!--escolaridad-->
                     <div class="form-group col-sm-4">
                      <label for="formBasicTitulo" class="form-form-control-label">T&iacute;tulo</label>
                      <input name="tituloVal" id="tituloVal" type="text" placeholder="Titulo" autocomplete="off" class="form-control">
                     </div>
					 <div class="form-group col-sm-4">
                      <label for="formBasicEgresado" class="form-form-control-label">Egresado de</label>
                      <input name="egresadoDeVal" id="egresadoDeVal" type="text" placeholder="Egresado de" autocomplete="off" class="form-control">
                     </div>
					 <div class="form-group col-sm-4">
                      <label for="formBasicAño" class="form-form-control-label">A&ntilde;o</label>
                      <input name="anoVal" id="anoVal" type="text" placeholder="A&ntilde;o" autocomplete="off" class="form-control">
                     </div>
                    </div>
					<div role="tabpanel" id="demo3tab-3" class="tab-pane p-y-2 fade"><!--Año-->
					        <div id="div_telefonos">

                            </div>
                            <div onclick="nuevoTelefono();" id="boton_nuevo_telefono">
                                <img alt="+" src="../../media/iconos/icon_add.png">
                                <div style="margin: 7px 0; overflow: auto;">Agregar</div>
                            </div>
					</div>
					
					
					<div class="form-group">
                      <button type="button" class="btn btn-primary" onclick="submitClicked()" id="boton_aceptar">Aceptar</button>
                    </div>
                  </form>
				 
                  </div>
				   <!-- END COTENT-->
                </div>
               
              </div>
              <!-- END PANEL-->
          
            <!-- END COL-->
	  </div>
	 </div>
    </div>
   </div>
   
   <!-- WEB PERLOAD-->
    <div id="preload">
      <ul class="loading">
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
				  
				  <!-- Lib -->
    <script src="../../ssets/scripts/lib/jquery-1.11.3.min.js"></script>
    <script src="../../assets/scripts/lib/jquery-ui.js"></script>
    <script src="../../assets/scripts/lib/tether.min.js"></script>

    <!-- Theme js-->
    <!-- Concat all plugins js-->
    <script src="../../assets/scripts/theme/theme-plugins.js"></script>
    <script src="../../assets/scripts/theme/main.js"></script>
    <!-- Below js just for this demo only-->
    <script src="../../assets/scripts/demo/demo-skin.js"></script>
    <script src="../../assets/scripts/demo/bar-chart-menublock.js"></script>

    <!-- Below js just for this page only-->
    </body>
</html>