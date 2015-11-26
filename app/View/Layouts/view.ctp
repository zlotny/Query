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
	<div id="main-body" class="container">

		<?= $this->element('navbar'); ?>


		<br/>
		<div class="container-fluid ">
			<?php echo $this->Html->image('logo_dark_background.png', array('alt' => 'Logo', 'class' => 'logo', 'url' => array('controller' => 'queries', 'action' => 'index'))); ?>
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



		<?php echo $this->fetch('content'); ?>
		

	</div>



	<!-- Footer -->
	<?= $this->element('footer'); ?>

</div>

<!-- Modales -->


<div id="responderQuery" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png" ></img>Responder</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="col-sm-12">
						<h3>Danos tu solución:</h3><br>
						<div class="form-group">
							<textarea class="form-control" rows="8" id="textArea"></textarea>
						</div>
						<div class="form-group pull-right">
							<button type="button" class="btn btn-success">Publicar</button>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>


<?= $this->Html->script('jquery-1.11.3') ?>
<?= $this->Html->script('bootstrap') ?>
<?= $this->element('viewScripts'); ?>

</body>
</html>

