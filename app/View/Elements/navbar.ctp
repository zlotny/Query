<!-- Navbar -->
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">

		
			
			<?php
			echo $this->Html->link(
				$this->Html->image('icon_dark_background.png', array('alt' => 'Logo', 'id' => 'icono')),
				'/',
				array('escapeTitle' => false,'class' => 'navbar-brand')
				);
				?>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Menú</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.html">Inicio<span class="sr-only">(current)</span></a></li>
					<li><a href="about.html">Acerca de</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tour<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="./tour_pregunta.html">¿Cómo hago una pregunta?</a></li>
							<li><a href="./tour_comentar.html">¿Cómo comentar una pregunta?</a></li>
							<li><a href="./tour_votos.html">¿Cómo funciona el sistema de votos?</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-form navbar-left">
					<div class="form-group">
						<div id="search-field" class="input-group">

							<input type="text" placeholder="Buscar..." class="form-control">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
							</span>
						</div>
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li class="registro"><a href="#" data-toggle="modal" data-target="#registroModal">Registro</a></li>
					<li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>