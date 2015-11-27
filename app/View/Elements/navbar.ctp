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
					<li class="active">
						<?= $this->Html->link(__("Inicio"), "/" ); ?>
					</li>
					<li><a href="about.html"><?= __("Acerca de"); ?></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tour<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="./tour_pregunta.html"><?= __("¿Cómo hago una pregunta?"); ?></a></li>
							<li><a href="./tour_comentar.html"><?= __("¿Cómo comentar una pregunta?"); ?></a></li>
							<li><a href="./tour_votos.html"><?= __("¿Cómo funciona el sistema de votos?"); ?></a></li>
						</ul>
					</li>
				</ul>
				
				<?php 
				echo $this->Form->create('Query', array('action'=> '/search', 'type' => 'get', 'class' => 'navbar-form navbar-left'));
				?>
				<div class="form-group">
					<div id="search-field" class="input-group">
						<?php
						echo $this->Form->input('searchInput', array( 'class'=>'form-control', 'placeholder'=> __("Buscar..."), 'div' => false,'type' =>'text', 'label' => false));
						echo '<span class="input-group-btn">';
						echo $this->Form->button( "<span class='glyphicon glyphicon-search'></span>", array('type' => 'submit',
							'label' => false,
							'class' => 'btn btn-default',
							'escape' => false));
						echo '</span>'
						?>

					</div>
				</div>
				<?php
				echo $this->Form->end();
				?>

				<ul class="nav navbar-nav navbar-right">
					<?php
					if($this->Session->read("User.email")){
						echo "<li>";
						echo $this->Html->link($this->Session->read("User.username"), "/users/view/".$this->Session->read("User.id"));
						echo "</li>";
						echo "<li>";
						echo $this->Html->link(__("Desconectarse"), "/users/logout");
						echo "</li>";	
					}else{
						?>
						<li class="registro"><a href="#" data-toggle="modal" data-target="#registroModal"><?= __("Registro"); ?></a></li>
						<li><a href="#" data-toggle="modal" data-target="#loginModal"><?= __("Login"); ?></a></li>
						<?php
					}
					?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-globe"></i><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<?php 
							echo "<li>". $this->Html->link(
								$this->Html->image('lang/es.png', array('class' => 'lang')).' Español',
								'/users/lang/es_ES', 
								array('escape'=>false)
								)."</li>";

							echo "<li>". $this->Html->link(
								$this->Html->image('lang/gb.png', array('class' => 'lang')).' English',
								'/users/lang/en_GB', 
								array('escape'=>false)
								)."</li>";

							echo "<li>". $this->Html->link(
								$this->Html->image('lang/pt.png', array('class' => 'lang')).' Português',
								'/users/lang/pt_PT', 
								array('escape'=>false)
								)."</li>";

							echo "<li>". $this->Html->link(
								$this->Html->image('lang/fr.png', array('class' => 'lang')).' Français',
								'/users/lang/fr_FR', 
								array('escape'=>false)
								)."</li>";
								?>
							</ul>
						</li>

					</ul>
				</div>
			</div>
		</nav>


		<div id="registroModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<?= $this->Form->create('User', array('action' => '/add', "data-toggle" => "validator", 'enctype'=>'multipart/form-data')); ?>
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png"></img><?= __("Registro"); ?>
						</h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<h3>Regístrate en Query!</h3><br>

							<div class="col-sm-12">
								<div class="form-group registro-form">
									<?= $this->Form->input('username', array('label' => false, 'class' => 'form-control setPopover', 'id' => 'focusedInput', 'placeholder' => __('Usuario'), 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => 'Introduce tu nombre de usuario.', 'data-trigger' => 'active', 'aria-describedby' => 'popover906376', "required" => "required", "data-minlength" => "5")) ?>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group registro-form">
									<?= $this->Form->input('email', array('label' => false, 'class' => 'form-control setPopover', 'id' => 'focusedInput', 'placeholder' => __('Correo'), 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => 'Introduce una cuenta de correo electrónico.', 'data-trigger' => 'active', 'aria-describedby' => 'popover906376')) ?>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group registro-form">
									<?= $this->Form->input('file', array('type' => 'file', 'label' => false, 'class' => 'form-control', 'placeholder' => __('Correo'))) ?>
								</div>
								<div class="form-group registro-form">
									<?= $this->Form->input('pass', array('label' => false, 'type' => 'password', 'class' => 'form-control setPopover', 'id' => 'inputPassword', 'placeholder' => __('Contraseña'), 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => 'Introduce una contraseña.', 'data-trigger' => 'active', 'aria-describedby' => 'popover906376', "data-minlength" => "8", "required" => "required" )) ?>
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group registro-form">
									<?= $this->Form->input('pass2', array('required' => 'required', 'label' => false, 'type' => 'password', 'class' => 'form-control setPopover', 'id' => 'inputPasswordRepeat', 'placeholder' => __('Repita su contraseña'), 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => 'Repita su contraseña', 'data-trigger' => 'active', 'aria-describedby' => 'popover906376', "data-minlength" => "8", "required" => "required", "data-match" => "#inputPassword")) ?>
									<div class="help-block with-errors"></div>
								</div>
							</div>

						</div>


					</div>
					<div class="modal-footer">
						<div class
						"container-fluid">
						<div class="col-sm-9">
							<p class="eula"><?= __("Registrándote en Query das a entender que aceptas nuestros términos de licencia de usuario. Puedes consultarlos "); ?><a target="_blank"
								href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><?= __("aquí"); ?></a>
							</p>
						</div>
						<div class="col-sm-3">
							<?php
							echo $this->Form->submit(__('Registrarse'), array('class' => 'btn btn-info'));
							echo $this->Form->end(); ?>
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
					<h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png"></img><?= __("Identificación"); ?>
					</h4>
				</div>
				<div class="modal-body">
					<h3><?= __("Identifícate..."); ?></h3><br>
					<?= $this->Form->create('User', array('action' => '/login', "data-toggle" => "validator")); ?>
					<div class="form-group registro-form">
						<?= $this->Form->input('useremail', array('label' => false, 'class' => 'form-control setPopover', 'id' => 'focusedInput', 'placeholder' => __('Correo'), 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => __('Introduce tu email de usuario.'), 'data-trigger' => 'active', 'aria-describedby' => 'popover906376', "data-minlength" => "5", "required" => "required")) ?>

						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group registro-form">
						<?= $this->Form->input('userpass', array('label' => false, 'type' => 'password', 'class' => 'form-control setPopover', 'id' => 'focusedInput', 'placeholder' => __('Contraseña'), 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => __('Introduce tu contraseña.'), 'data-trigger' => 'active', 'aria-describedby' => 'popover906376', "data-minlength" => "8", "required" => "required")) ?>
						<div class="help-block with-errors"></div>
					</div>

				</div>
				<div class="modal-footer ">
					<?php
					echo $this->Form->submit(__('Identificarse'), array('class' => 'btn btn-info'));
					echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>