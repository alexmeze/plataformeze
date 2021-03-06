

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Colegio Meze</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Colegio MEZE</a>
            </div>

            <!-- Seccion de ingreso al sistema!-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#sobre_ti">Sobre Ti</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#noticias">Noticias</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#sistema">Sistema</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="login.php">Salir</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">

            </div>
        </div>
    </header>

    <section class="bg-primary" id="sobre_ti">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12 col-xs-12 box-center">
					<img class="img-responsive img-circle imgUser" src="media/fotos/photo_NA.jpg">
				</div>
				<div class="col-lg-8 col-sm-12 col-xs-12 text-center">
					<p><h2><?php @session_start(); echo "Bienvenido "; echo  "<b>".$_SESSION['nombres']." ".$_SESSION['apellido_paterno']." ".$_SESSION['apellido_materno']."</b>"; ?> al "Sistema Integral Meze",  aqui podras administrar las secciones que te correspondan de esta plataforma!</h2> </p>
				</div>
            </div>
        </div>
    </section>

    <section id="noticias">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Ultimos Acontecimientos</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                    <div class="col-lg-8 col-md-8 col-md-offset-2 col-lg-offset-2 text-center">
<!--						<i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>-->
						<div class=" extras-carr animate-in" data-anim-type="fade-in-right-large" >
							<div id="fullcarousel-example" data-interval="2000" class="carousel slide ">
									<div class="carousel-inner">
									<div class="item active">

										<img src="images/carr1.jpg" alt="img1">
									</div>
									<div class="item">

										<img src="images/carr2.jpg" alt="img2">
									</div>
									<div class="item">
										<img src="images/carr3.jpg" alt="img3">
									</div>
									<div class="item">
										<img src="images/carr4.jpg" alt="img4" >
									</div>
										<a class="left carousel-control" href="#fullcarousel-example" data-slide="prev"><i class="icon-prev fa fa-angle-left controles img-circle"></i></a>
										<a class="right carousel-control" href="#fullcarousel-example" data-slide="next"><i class="icon-next fa fa-angle-right controles img-circle"></i></a>
									</div>
							</div>
					</div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding " id="sistema">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6 animate-in" data-anim-type="fade-in-up-large">
                    <a href="admin/estadisticas/stats.php" class="portfolio-box">
                        <img src="images/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Estadisticas
                                </div>
                                <div class="project-name">
                                    Alumnos, Maestros , Clubs y Colonias
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 animate-in" data-anim-type="fade-in-right-large">
                    <a href="admin/colegios/index.php" class="portfolio-box">
                        <img src="images/portfolio/12.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Colegios
                                </div>
                                <div class="project-name">
                                    Colegios Nuevos, Registrados
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 animate-in" data-anim-type="fade-in-up-large">
                    <a href="admin/admin/index.php" class="portfolio-box">
                        <img src="images/portfolio/13.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Administradores
                                </div>
                                <div class="project-name">
                                    Todos, Registrados, Registrar
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 animate-in" data-anim-type="fade-in-down-large">
                    <a href="admin/becas/lista.php" class="portfolio-box">
                        <img src="images/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Becas
                                </div>
                                <div class="project-name">
                                    Listas, Nuevas Tipos
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 animate-in" data-anim-type="fade-in-up-large">
                    <a href="admin/cuentas/recibos.php" class="portfolio-box">
                        <img src="images/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Cuentas
                                </div>
                                <div class="project-name">
                                    Pagos, Descuentos,Recibos
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 animate-in" data-anim-type="fade-in-down-large">
                    <a href="admin/configuracion/clubs/index.php" class="portfolio-box">
                        <img src="images/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                     Clubs
                                </div>
                                <div class="project-name">
                                    Ajedrez, Teatro, Futbol etc.
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
				<div class="col-lg-4 col-sm-6 animate-in" data-anim-type="fade-in-up-large">
                    <a href="admin/configuracion/colonias/index.php" class="portfolio-box">
                        <img src="images/portfolio/7.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Colonias
                                </div>
                                <div class="project-name">
                                    Colonias de nuestros alumnos
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
				<div class="col-lg-4 col-sm-6 animate-in" data-anim-type="fade-in-down-large">
                    <a href="admin/configuracion/ocupaciones/index.php" class="portfolio-box">
                        <img src="images/portfolio/8.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Ocupaciones
                                </div>
                                <div class="project-name">
                                   Distintas Ocupaciones
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
				<div class="col-lg-4 col-sm-6 animate-in" data-anim-type="fade-in-up-large">
                    <a href="admin/configuracion/papeleria/index.php" class="portfolio-box">
                        <img src="images/portfolio/9.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Papeleria
                                </div>
                                <div class="project-name">
                                    Papeleria Solicitada
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
				<div class="col-lg-4 col-sm-6 animate-in" data-anim-type="fade-in-down-large">
                    <a href="admin/configuracion/niveles/index.php" class="portfolio-box">
                        <img src="images/portfolio/10.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Niveles
                                </div>
                                <div class="project-name">
                                    Kinder,Primaria,Secundaria,Bachillerato,Universidad
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 animate-in" data-anim-type="fade-in-down-large">
                    <a href="admin/tareas/asignar.php" class="portfolio-box">
                        <img src="images/portfolio/11.png" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Tareas
                                </div>
                                <div class="project-name">
                                    Asignar tareas de los diferentes niveles educativos
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <img class="img-responsive col-lg-4 col-sm-12 col-md-4 col-xs-12 logo" src="images/logo%20mediano.png">
                <div class="col-lg-8 col-sm-12">
					<p>Colegio Ma. Esther Zuno de Echeverria</p>
					<p>Adolfo L&oacute;pez Mateos #1030 Col. Zaragoza C.P. 27297</p>
					<p>Tel. 792-93-93 Torre&oacute;n, Coah.</p>
				</div>
            </div>
        </div>
    </aside>
</body>
<script src="scripts/jquery.js"></script>
<script src="scripts/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="scripts/jquery.easing.min.js"></script>
    <script src="scripts/jquery.fittext.js"></script>
    <script src="scripts/wow.min.js"></script>

    <!-- JavaScript Plugin-->
    <script src="scripts/creative.js"></script>
