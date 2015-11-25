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


	<div id="registroModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <?= $this->Form->create('User', array('action' => '/add')); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png"></img>Registro
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <h3>Regístrate en Query!</h3><br>

                        <div class="col-sm-12">
                            <div class="form-group registro-form">
                                <?= $this->Form->input('username', array('label' => false, 'class' => 'form-control setPopover', 'id' => 'focusedInput', 'placeholder' => 'Usuario', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => 'Introduce tu nombre de usuario.', 'data-trigger' => 'active', 'aria-describedby' => 'popover906376')) ?>
                            </div>
                            <div class="form-group registro-form">
                                <?= $this->Form->input('email', array('label' => false, 'class' => 'form-control setPopover', 'id' => 'focusedInput', 'placeholder' => 'Correo', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => 'Introduce una cuenta de correo electrónico.', 'data-trigger' => 'active', 'aria-describedby' => 'popover906376')) ?>
                            </div>
                            <div class="form-group registro-form">
                                <?= $this->Form->input('pass', array('label' => false, 'type' => 'password', 'class' => 'form-control setPopover', 'id' => 'focusedInput', 'placeholder' => 'Contraseña', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => 'Introduce una contraseña.', 'data-trigger' => 'active', 'aria-describedby' => 'popover906376')) ?>
                            </div>
                            <div class="form-group registro-form">
                                <?= $this->Form->input('pass2', array('required' => 'required', 'label' => false, 'type' => 'password', 'class' => 'form-control setPopover', 'id' => 'focusedInput', 'placeholder' => 'Repita su contraseña', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => 'Repita su contraseña', 'data-trigger' => 'active', 'aria-describedby' => 'popover906376')) ?>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <div class
                    "container-fluid">
                    <div class="col-sm-9">
                        <p class="eula">Registrándote en Query das a entender que aceptas nuestros términos de licencia
                            de usuario. Puedes consultarlos <a target="_blank"
                                                               href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">aquí</a>
                        </p>
                    </div>
                    <div class="col-sm-3">
                        <?php
                        echo $this->Form->submit('Registrarse', array('class' => 'btn btn-info'));
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
                <h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png"></img>Identificación
                </h4>
            </div>
            <div class="modal-body">
                <h3>Identifícate...</h3><br>

                <div class="form-group registro-form">
                    <input class="form-control  setPopover" id="focusedInput" type="text" placeholder="Usuario"
                           data-toggle="popover" data-placement="right"
                           data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."
                           data-trigger="active" data-original-title="" title="" aria-describedby="popover906376">
                </div>
                <div class="form-group registro-form">
                    <input class="form-control setPopover" id="focusedInput" type="password" placeholder="Contraseña"
                           data-toggle="popover" data-placement="right"
                           data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."
                           data-trigger="active" data-original-title="" title="" aria-describedby="popover906376">
                </div>

            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-success">Login</button>
            </div>
        </div>
    </div>
</div>