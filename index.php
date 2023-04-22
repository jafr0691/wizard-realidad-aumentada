<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">
<!--<![endif]-->
<head>

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<title>I-RA</title>
	<meta name="description" content="">
	<meta name="author" content="Ansonika">

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet" >
	<link href="css/socialize-bookmarks.css" rel="stylesheet">
	<link href="js/fancybox/source/jquery.fancybox.css?v=2.1.4" rel="stylesheet">
	<link href="check_radio/skins/square/aero.css" rel="stylesheet">

	<!-- Toggle Switch -->
	<link rel="stylesheet" href="css/jquery.switch.css">

	<!-- Owl Carousel Assets -->
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">

	<!-- Google web font -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Jquery -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.8.22.min.js"></script>

<!-- Wizard-->
<script src="js/jquery.wizard.js"></script>

<!-- Radio and checkbox styles -->
<script src="check_radio/jquery.icheck.js"></script>

<!-- HTML5 and CSS3-in older browsers-->
<script src="js/modernizr.custom.17475.js"></script>

<!-- Support media queries for IE8 -->
<script src="js/respond.min.js"></script>

</head>

<body>

	<section id="top-area">
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-3" id="logo"><a href="index.html">AR</a></div>

					<div class="btn-responsive-menu"> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </div>

					<nav class="col-md-8 col-xs-9" id="top-nav">
						<ul>
							<li><a href="#" data-toggle="modal" data-target="#myModal">Ayuda</a></li>

						</ul>
					</nav><!-- End Nav -->

				</div><!-- End row -->
			</div><!-- End container -->
		</header> <!-- End header -->


	</section>

	<section class="container" id="main">

		<!-- Start Survey container -->
		<div id="survey_container">

			<div id="top-wizard">
				<strong>Progreso Total <span id="location"></span></strong>
				<div id="progressbar"></div>
				<div class="shadow"></div>
			</div><!-- end top-wizard -->

			<form name="example-1" id="wrapped" action="survey_send_1.php" method="POST" enctype="multipart/form-data">
				<div id="middle-wizard">
					<div id="inicio" class="step">
						<div class="row">
							<h2 class="col-md-12">Configurar Proyecto Base</h2>
							<div class="col-md-4 col-md-offset-4">
								<strong style="font-size: 18px; margin: 0 0 10px 14px;">
									Proporciona el <a href="#" data-toggle="modal" data-target="#terms-txt">Proyecto Base</a>
								</strong>

								<div class="fileupload">
									<input type="file" id="fileBase" name="fileBase" accept=".zip" class="valid">
								</div>


							</div><!-- end col-md-6 -->


						</div><!-- end row -->

						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<i class="icon-file iconPB" id="iconFileUpload"></i>
							</div>
						</div>

					</div><!-- end step-->

					<div id="acciones" class="step row">

						<h2 class="col-md-12">Acciones Aplicables</h2>
						<p style="margin-left: 13px">
							<label style="font-size: 20px;display: none;" class="todo_memorama"><span style="font-weight: bold;font-size: 20px;">Tipo de Juego: </span> Juego de Reglas / Memorama </label>
							<label  style="font-size: 20px;display: none;" class="todo_serpientes"><span style="font-weight: bold;font-size: 20px;">Tipo de Juego: </span> Juego de Reglas / Serpientes y escaleras </label>
						</p>
						<label style="font-size: 16px;font-weight: 600;" class="col-md-12">Selecciona las actividades para la inclusión de contenido aumentado:</label>
						<br>
						<br>
						<div id="acciones_memorama" class="todo_memorama" style="display: none">

							<div class="col-md-10">

								<ul class="data-list-2">
									<li>
										<input id="accmein" name="acciones_m[]" type="checkbox" class="required check_radio" value="Inicio del Juego">
										<label>Inicio del Juego</label>
										<i class="icon-play iconPB2"></i></li>
										<li>
											<input id="accmefi" name="acciones_m[]" type="checkbox" class="required check_radio" value="Fin del Juego">
											<label>Fin del Juego</label>
											<i class="icon-stop iconPB2"></i></li>
											<li>
												<input id="accmeac" name="acciones_m[]" type="checkbox" class="required check_radio" value="Acertar Carta">
												<label>Acertar Carta</label>
												<i class="icon-ok-circle iconPB2"></i></li>
												<li>
													<input id="accmeer" name="acciones_m[]" type="checkbox" class="required check_radio" value="Errar Carta">
													<label>Errar Carta</label>
													<i class="icon-remove-circle iconPB2"></i></li>
												</ul>
											</div>
										</div>
										<div id="acciones_serpiente" class="todo_serpientes"  style="display: none">

											<div class="col-md-10">

												<ul class="data-list-2">
													<li><input id="accsein" name="acciones_s[]" type="checkbox" class="required check_radio" value="Inicio del Juego"><label>Inicio del Juego</label> <i class="icon-play iconPB2"></i></li>
													<li><input id="accsefi" name="acciones_s[]" type="checkbox" class="required check_radio" value="Fin del Juego"><label>Fin del Juego</label><i class="icon-stop iconPB2"></i></li>
													<li><input id="accsesu" name="acciones_s[]" type="checkbox" class="required check_radio" value="Subir Escalera"><label>Subir Escalera</label><i class="icon-ok-circle  iconPB2"></i></li>
													<li><input id="accseba" name="acciones_s[]" type="checkbox" class="required check_radio" value="Bajar Serpiente"><label>Bajar Serpiente</label><i class="icon-remove-circle iconPB2"></i></li>
												</ul>
											</div>
										</div>
									</div><!-- end step -->

									<div id="contenido" class="step row">

										<h2 class="col-md-12">Contenido Aumentado</h2>
										<label style="font-size: 18px" >Proporciona el contenido aumentado para cada una de las acciones siguientes:</label>
										<br>
										<br>

										<div id="contenido_memorama" style="display: none">
											<div class="row" id="memorama_inicio">
												<div class="col-md-6">
													<h3 style="font-size: 18px;">Inicio del Juego:</h3>
													<ul class="data-list-3 clearfix">
														<li>
															<input name="contmemoini" type="radio" class="required check_radio" value=".jpg,.jpeg,.png" checked="checked">
															<div><label>Imagen <i class="icon-picture iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contmemoini" type="radio" class="required check_radio" value=".txt">
															<div><label>Texto <i class="icon-file-text  iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contmemoini" type="radio" class="required check_radio" value=".dae">
															<div><label>Modelo  <i class="icon-sign-blank  iconPB4"></i></label></div>
														</li>

													</ul>
												</div>

												<div class="col-md-6" style="margin-top: 38px">
													<div class="fileupload">
														<input type="file" name="contmemoiniarch" class="valid" accept="">
													</div>
												</div>
											</div>
											<div class="row" id="memorama_fin">
												<div class="col-md-6">
													<h3 style="font-size: 18px;">Fin del Juego:</h3>
													<ul class="data-list-3 clearfix">
														<li id="ramemoini">
															<input name="contmemofin" type="radio" class="required check_radio" value=".jpg,.jpeg,.png" checked="checked">
															<div><label>Imagen <i class="icon-picture iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contmemofin" type="radio" class="required check_radio" value=".txt">
															<div><label>Texto <i class="icon-file-text  iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contmemofin" type="radio" class="required check_radio" value=".dae">
															<div><label>Modelo  <i class="icon-sign-blank  iconPB4"></i></label></div>
														</li>

													</ul>
												</div>
												<div class="col-md-6" style="margin-top: 38px">
													<div class="fileupload">
														<input type="file" name="contmemofinarch" class="valid" accept="">
													</div>
												</div>
											</div>
											<div class="row" id="memorama_acertar">
												<div class="col-md-6">
													<h3 style="font-size: 18px;">Acertar Carta:</h3>
													<ul class="data-list-3 clearfix">
														<li>
															<input name="contmemoace" type="radio" class="required check_radio" value=".jpg,.jpeg,.png" checked="checked">
															<div><label>Imagen <i class="icon-picture iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contmemoace" type="radio" class="required check_radio" value=".txt">
															<div><label>Texto <i class="icon-file-text  iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contmemoace" type="radio" class="required check_radio" value=".dae">
															<div><label>Modelo  <i class="icon-sign-blank  iconPB4"></i></label></div>
														</li>

													</ul>
												</div>
												<div class="col-md-6" style="margin-top: 38px">
													<div class="fileupload">
														<input type="file" name="contmemoacearch" class="valid" accept="">
													</div>
												</div>
											</div>

											<div class="row" id="memorama_errar">
												<div class="col-md-6">
													<h3 style="font-size: 18px;">Errar Carta:</h3>
													<ul class="data-list-3 clearfix">
														<li>
															<input name="contmemoerr" type="radio" class="required check_radio" value=".jpg,.jpeg,.png" checked="checked">
															<div><label>Imagen <i class="icon-picture iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contmemoerr" type="radio" class="required check_radio" value=".txt">
															<div><label>Texto <i class="icon-file-text  iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contmemoerr" type="radio" class="required check_radio" value=".dae">
															<div><label>Modelo  <i class="icon-sign-blank  iconPB4"></i></label></div>
														</li>

													</ul>
												</div>
												<div class="col-md-6" style="margin-top: 38px">
													<div class="fileupload">
														<input type="file" name="contmemoerrarch" class="valid" accept="">
													</div>
												</div>
											</div>

										</div>

										<div id="contenido_serpientes" style="display: none">
											<div class="row" id="serpiente_inicio">
												<div class="col-md-6">
													<h3 style="font-size: 18px;">Inicio del Juego:</h3>
													<ul class="data-list-3 clearfix">
														<li>
															<input name="contserpini" type="radio" class="required check_radio" value=".jpg,.jpeg,.png" checked="checked">
															<div><label>Imagen <i class="icon-picture iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contserpini" type="radio" class="required check_radio" value=".txt">
															<div><label>Texto <i class="icon-file-text  iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contserpini" type="radio" class="required check_radio" value=".dae">
															<div><label>Modelo  <i class="icon-sign-blank  iconPB4"></i></label></div>
														</li>

													</ul>
												</div>

												<div class="col-md-6" style="margin-top: 38px">
													<div class="fileupload">
														<input type="file" name="contserpiniarch" accept="" class="valid">
													</div>
												</div>
											</div>
											<div class="row" id="serpiente_fin">
												<div class="col-md-6">
													<h3 style="font-size: 18px;">Fin del Juego:</h3>
													<ul class="data-list-3 clearfix">
														<li>
															<input name="contserpfin" type="radio" class="required check_radio" value=".jpg,.jpeg,.png" checked="checked">
															<div><label>Imagen <i class="icon-picture iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contserpfin" type="radio" class="required check_radio" value=".txt">
															<div><label>Texto <i class="icon-file-text  iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contserpfin" type="radio" class="required check_radio" value=".dae">
															<div><label>Modelo  <i class="icon-sign-blank  iconPB4"></i></label></div>
														</li>

													</ul>
												</div>
												<div class="col-md-6" style="margin-top: 38px">
													<div class="fileupload">
														<input type="file" name="contserpfinarch" accept="" class="valid">
													</div>
												</div>
											</div>
											<div class="row" id="serpiente_subir">
												<div class="col-md-6">
													<h3 style="font-size: 18px;">Subir Escalera:</h3>
													<ul class="data-list-3 clearfix">
														<li>
															<input name="contserpsu" type="radio" class="required check_radio" value=".jpg,.jpeg,.png" checked="checked">
															<div><label>Imagen <i class="icon-picture iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contserpsu" type="radio" class="required check_radio" value=".txt">
															<div><label>Texto <i class="icon-file-text  iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contserpsu" type="radio" class="required check_radio" value=".dae">
															<div><label>Modelo  <i class="icon-sign-blank  iconPB4"></i></label></div>
														</li>

													</ul>
												</div>
												<div class="col-md-6" style="margin-top: 38px">
													<div class="fileupload">
														<input type="file" name="contserpsuarch" accept="" class="valid">
													</div>
												</div>
											</div>

											<div id="serpiente_bajar" class="row">
												<div class="col-md-6">
													<h3 style="font-size: 18px;">Bajar Escalera:</h3>
													<ul class="data-list-3 clearfix">
														<li>
															<input name="contserpba" type="radio" class="required check_radio" value=".jpg,.jpeg,.png" checked="checked">
															<div><label>Imagen <i class="icon-picture iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contserpba" type="radio" class="required check_radio" value=".txt">
															<div><label>Texto <i class="icon-file-text  iconPB4"></i></label></div>
														</li>
														<li>
															<input name="contserpba" type="radio" class="required check_radio" value=".dae">
															<div><label>Modelo  <i class="icon-sign-blank  iconPB4"></i></label></div>
														</li>

													</ul>
												</div>
												<div class="col-md-6" style="margin-top: 38px">
													<div class="fileupload">
														<input type="file" name="contserpbaarch" accept="" class="valid">
													</div>
												</div>
											</div>

										</div>

									</div><!-- end step -->

									<div id="biblioteca" class="step row">
										<h2 class="col-md-12">Biblioteca</h2>
										<label style="font-size: 18px" >Selecciona la Biblioteca con soporte de RA a usar:</label>
										<br>
										<br>
										<div class="col-md-10">

											<ul class="data-list-2 clearfix">
												<li><input name="question_5" type="radio" class="required check_radio" value="No" checked="checked"><label>Ar.js</label><img style="margin-left: 20px;margin-top: -27px" src="img/arjs.png" width="100px" height="100px"></li>
											</ul>
										</div>
									</div><!-- end step -->
									<div id="resumen" class="step row">
										<h2 class="col-md-12">Resumen</h2>
										<div class="col-md-12">

											<div class="row">

												<div class="col-md-3">

													<i class="icon-file iconPB3" id="adsfasfa"></i>

												</div>

												<div class="col-md-4">

													<h3><span style="font-weight: bold;">Tipo de Juego:<span> <span id="tipojuego">Juego de Reglas</span></h3>
														<h3><span style="font-weight: bold;">Nombre Archivo:<span><span id="nombrearchi">memorama.zip</span></h3>
															<h3><span style="font-weight: bold;">Biblioteca RA:<span> <span id="blibli">Ar.js</span></h3>

															</div>

															<div class="col-md-3">
																<h3><span style="font-weight: bold;">Acción:<span></h3>
																	<div id="nomacc"></div>


																	</div>
																	<div class="col-md-2">
																		<h3><span style="font-weight: bold;">Contenido:<span></h3>
																			<div id="nomcon"></div>
																		</div>

																	</div>



																</div>
															</div><!-- end section resumen -->

															<div class="submit step" id="complete">

																<div id="div-generar" class="row">

																	<div class="col-md-12">
																		<i class="icon-cogs"></i>
																	</div>

																	<button type="button" id="btn-genera" name="btn-genera" class="submit">Confirmar y Generar Proyecto</button>

																</div>

																<div id="div-generando" style="display: none">

																	<div  class="row">

																		<div class="col-md-12">
																			<h2>Generando proyecto...</h2>
																		</div>

																	</div>

																	<div  class="row">

																		<div class="col-md-12" style="background-color:#f3f3f3; height:20px; padding:0;border-radius: 3px;">
																			<div class="upload-progress">
																				<div class="progress-bar blue stripes shine">
																			  		<span class="progress-text"></span>
																				</div>
																			</div>
																		</div>

																	</div>
																</div>


																<div id="div-descargarzip" style="display: none" class="row">


																	<i style="color: #8dc63f" class="icon-archive"></i>
																	<h3>Tu proyecto se ha generado exitosamente.</h3>
																	<button type="button"><a id="carpzip" href=""  download>Descargar</a></button>

																</div>



															</div><!-- end submit step -->

														</div><!-- end middle-wizard -->

														<div id="bottom-wizard">
															<button type="button" id="backward" name="backward" class="backward">Atrás</button>
															<button type="button" id="forwarddoble" name="forwarddoble" class="forwarddoble" disabled="disabled" style="display: inline-block;">Siguiente</button>
															<button type="button" id="forward" name="forward" class="forward" style="display: none;">Siguiente</button>
														</div><!-- end bottom-wizard -->
													</form>

												</div><!-- end Survey container -->


											</section><!-- end section main container -->

											<footer>
												<section class="container">
													<div class="row">
														<div class="col-md-4">


														</div>

														<div class="col-md-4" id="contact">

														</div>

														<div class="col-md-4">

														</div>

													</div><!-- end row -->
												</section>

												<input type="hidden" name="" value="" id="tipojuegoinpu">

												<section id="footer_2">
													<div class="container">
														<div class="row">
															<div class="col-md-6">
																<ul id="footer-nav">
																	<li>Copyright© </li>
																	<li><a href="#">Politicas</a></li>
																</ul>
															</div>
															<div class="col-md-6" style="text-align:center">
																<ul class="social-bookmarks clearfix">
																	<li class="facebook"><a href="#">facebook</a></li>

																	<li class="twitter"><a href="#">twitter</a></li>

																</ul>
															</div>
														</div>
													</div>
												</section>

											</footer>

											<div id="toTop">Volver Arriba</div>

											<!-- Modal About -->
											<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title" id="myModalLabel">About us</h4>
														</div>
														<div class="modal-body">
															<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
															sanctus, pro ne quod dicunt sensibus.</p>
															<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
																sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
															sanctus, pro ne quod dicunt sensibus.</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														</div>
													</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->

											<!-- Modal About -->
											<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
														</div>
														<div class="modal-body">
															<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
															sanctus, pro ne quod dicunt sensibus.</p>
															<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
																sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
															sanctus, pro ne quod dicunt sensibus.</p>
															<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
															sanctus, pro ne quod dicunt sensibus.</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														</div>
													</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->

											<div class="modal fade" id="modalalert" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalalert">Respuesta de subida de Archivo</h5>
														</div>
														<div class="modal-body">
															<p id="respuesta"></p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
														</div>
													</div>
												</div>
											</div>
											<!-- OTHER JS -->

											<script src="js/jquery.validate.js"></script>
											<script src="js/jquery.placeholder.js"></script>
											<script src="js/jquery.tweet.min.js"></script>
											<script src="js/jquery.bxslider.min.js"></script>
											<script src="js/quantity-bt.js"></script>
											<script src="js/bootstrap.js"></script>
											<script src="js/retina.js"></script>
											<script src="js/owl.carousel.min.js"></script>
											<script src="js/functions.js"></script>

											<!-- FANCYBOX -->
											<script  src="js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4" type="text/javascript"></script>
											<script src="js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5" type="text/javascript"></script>
											<script src="js/fancy_func.js" type="text/javascript"></script>
											<script src="js/proceso.js" type="text/javascript"></script>
<!-- <script src="js/jszip.min.js" type="text/javascript"></script>
	<script src="js/FileSaver.js" type="text/javascript"></script> -->





</body>
</html>
