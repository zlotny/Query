<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<title>Query</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php
echo $this->Html->meta(
	'favicon.ico',
	'/favicon.ico',
	array('type' => 'icon')
	);
	?>

	<?= $this->Html->css('bootstrap') ?>
	<?= $this->Html->css('bootstrap-theme') ?>
	<?= $this->Html->css('custom') ?>

</head>
<body>
	<div id="main-body" class="container" >

		<?= $this->element('navbar'); ?>

		<div id="registroModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<?= $this->Form->create('User', array('action' => '/add')); ?>
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png" ></img>Registro</h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<h3>Regístrate en Query!</h3><br>
							<div class="col-sm-12">
								<div class="form-group registro-form">
									<input name="data[User][username]" class="form-control setPopover" id="focusedInput" type="text" placeholder="Usuario" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-trigger="active" data-original-title="" title="" aria-describedby="popover906376">
								</div>
								<div class="form-group registro-form">
									<input name="data[User][email]" class="form-control setPopover" id="focusedInput" type="text" placeholder="Correo" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-trigger="active" data-original-title="" title="" aria-describedby="popover906376">
								</div>
								<div class="form-group registro-form">
									<input name="data[User][pass]" class="form-control setPopover" id="focusedInput" type="password" placeholder="Contraseña" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."  data-trigger="active" data-original-title="" title="" aria-describedby="popover906376">
								</div>
								<div class="form-group registro-form">
									<input name="data[User][pass2]" class="form-control setPopover" id="focusedInput" type="password" placeholder="Repite tu contraseña" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-trigger="active" data-original-title="" title="" aria-describedby="popover906376">
								</div>
							</div>

						</div>


					</div>
					<div class="modal-footer">
						<div class"container-fluid">
							<div class="col-sm-9">
								<p class="eula">Registrándote en Query das a entender que aceptas nuestros términos de licencia de usuario. Puedes consultarlos <a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">aquí</a></p>
							</div>
							<div class="col-sm-3">
								<input type="submit" value="Registrarse" class="btn btn-info" />
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>




		<div id="loginModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png" ></img>Identificación</h4>
					</div>
					<div class="modal-body">
						<h3>Identifícate...</h3><br>
						<div class="form-group registro-form">
							<input class="form-control  setPopover" id="focusedInput" type="text" placeholder="Usuario"  data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-trigger="active" data-original-title="" title="" aria-describedby="popover906376">
						</div>
						<div class="form-group registro-form">
							<input class="form-control setPopover" id="focusedInput" type="password" placeholder="Contraseña"  data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-trigger="active" data-original-title="" title="" aria-describedby="popover906376">
						</div>

					</div>
					<div class="modal-footer ">
						<button type="button" class="btn btn-success">Login</button>
					</div>
				</div>
			</div>
		</div>






		<br/>
		<div class="container-fluid ">
			<a href="index.html" ><?php echo $this->Html->image('logo_dark_background.png', array('alt' => 'Logo', 'class' => 'logo')); ?></a>
		</div>
		<br>

		<div class="container-fluid intro-text">
			<div class="col-sm-12">
				<div class="well well-lg">
					<span class="pull-right close-button" onclick="closeWell()">X</span>
					<blockquote>
						<p>Query es una comunidad de preguntas y respuestas sobre el mundo de la tecnología de la información. Regístrate para unirte a la comunidad y resolver de una vez por todas tus dudas!</p>
						<small>El equipo de <cite class="quizma-font-bold" title="Query">Query</cite></small>
					</blockquote>
				</div>
			</div>
		</div>

		<br>

		<div class="container-fluid">
			<div class="col-sm-8">
				<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#preguntaNotLogged">Publica tu Query!</a>
				<span class="pull-right">
					<ul class="nav nav-pills">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
								Filtro <span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Últimas preguntas</a></li>
								<li><a href="#">Más respondidas (30 días)</a></li>
								<li class="divider"></li>
								<li class="disabled"><a href="#">Mis preguntas</a></li>
							</ul>
						</li>
					</ul>
				</span>
			</div>
			<div class="col-sm-4"></div>
		</div><br>


		<div id="question-body" class="container-fluid preguntas">

			<div class="col-sm-8">
				<ul class="list-group">
					<li class="list-group-item active quizma-font titulo-lista">
						Preguntas
					</li>

					<!-- PREGUNTAS view.ctp -->
					<?= $this->fetch('content'); ?>




					

					<div class="container-fluid row-centered">
						<div class="col-sm-2"></div>
						<div class="col-sm-8 ">
							<ul class="pagination">
								<li class="disabled"><a href="#">«</a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">»</a></li>
							</ul>
						</div>
						<div class="col-sm-2"></div>

					</div>



				</ul>
			</div>
			<div class="col-sm-4"> 
				<ul class="list-group">
					<li class="list-group-item active quizma-font titulo-lista">
						Lo nuevo
					</li>
					<li class="list-group-item">
						<span class="badge">14</span>
						Preguntas respondidas hoy
					</li>
					<li class="list-group-item">
						<span class="badge">2</span>
						Preguntas sin votar
					</li>
					<li class="list-group-item">
						<span class="badge">1</span>
						Preguntas sin respuesta
					</li>
				</ul></div>
			</div>











			<!-- Footer -->
			<?= $this->element('footer'); ?>
			


		</div>



		<!-- Modales -->
		


		<div id="preguntaNotLogged" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png" ></img>No estás identificado</h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="col-sm-6">
								<h3>Identifícate...</h3><br>
								<div class="form-group">
									<input class="form-control" id="focusedInput" type="text" placeholder="Usuario">
								</div>
								<div class="form-group">
									<input class="form-control" id="focusedInput" type="password" placeholder="Contraseña">
								</div>
								<div class="form-group pull-right">
									<button type="button" class="btn btn-success">Login</button>
								</div>

							</div>
							<div class="col-sm-6">
								<h3>O regístrate</h3><br>
								<div class="form-group">
									<input class="form-control" id="focusedInput" type="text" placeholder="Usuario">
								</div>
								<div class="form-group">
									<input class="form-control" id="focusedInput" type="text" placeholder="Correo">
								</div>
								<div class="form-group">
									<input class="form-control" id="focusedInput" type="password" placeholder="Contraseña">
								</div>
								<div class="form-group">
									<input class="form-control" id="focusedInput" type="password" placeholder="Repite tu contraseña">
								</div>
								<div class="form-group pull-right">
									<button type="button" class="btn btn-info">Regístrate</button>
								</div>


							</div>
						</div>
					</div>
					<div class="modal-footer">
						<p class="eula">Registrándote en Query das a entender que aceptas nuestros términos de licencia de usuario. Puedes consultarlos <a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">aquí</a></p>
					</div>
				</div>
			</div>
		</div>




		<?= $this->Html->script('jquery-1.11.3') ?>
		<?= $this->Html->script('bootstrap') ?>
		<?= $this->element('defaultScripts'); ?>


		
	</body>
	</html>

