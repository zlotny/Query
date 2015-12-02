	<?php 
/*
	echo $this->Session->read("User.email"); 
	print_r($targetUser["User"]);*/
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h1><?= $targetUser["User"]["username"] ?></h1>
							<span class="st-border"></span>
						</div>
					</div>

					<div class="col-md-3 col-sm-12">
						<div class="team-member">
							<div class="member-image">
								<?= $this->Html->image("user-icons/".$targetUser["User"]["profile_pic_route"] , array('class' => 'img-responsive, profile-view-pic')); ?>
							</div>
						</div>
					</div>

					<?php 
					$userActual = $this->Session->read("User.id");
					$userToView = $targetUser["User"]["id"];
					if($userActual != $userToView){ 
						?>

						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="name"><?php echo __("Correo") ?></label>
								<div class="well well-sm"><?= $targetUser["User"]["email"]; ?> 
								</div>
							</div>

							<div class="form-group">
								<label for="name"><?php echo __("Usuario") ?></label>
								<div class="well well-sm"><?= $targetUser["User"]["username"]; ?> </div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12"></div>
						<?php } else { ?>
						<div class="col-md-6 col-sm-12">
							<?= $this->Form->create('User', array('action' => '/edit/'.$this->Session->read("User.id"), "data-toggle" => "validator", "enctype" => "multipart/form-data")); ?>
							
							<div class="form-group">
								<label for="name">
									<?php echo __("Usuario") ?>
								</label>
								<?= $this->Form->input('username', array('label' => false, 'class' => 'form-control setPopover', 'id' => 'focusedInput', 'value' => $targetUser["User"]["username"], 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => __('Modifica tu nombre.'), 'data-trigger' => 'active', 'aria-describedby' => 'popover906376', "data-minlength" => "5")); ?>
							</div>
							
							<div class="form-group">
								<label for="name">
									<?php echo __("Email") ?>
								</label>
								<?= $this->Form->input('email', array('label' => false, 'class' => 'form-control setPopover', 'id' => 'focusedInput', 'value' => $targetUser["User"]["email"], 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => __('Modifica tu email.'), 'data-trigger' => 'active', 'aria-describedby' => 'popover906376')); ?>
							</div>
							
							<div class="form-group">
								<label for="name">
									<?php echo __("Contraseña") ?>
								</label>
								<?= $this->Form->input('pass', array('label' => false, 'type' => 'password', 'class' => 'form-control setPopover', 'id' => 'focusedInput', 'data-toggle' => 'popover', 'data-placement' => 'right', 'data-content' => __('Modifica tu contraseña.'), 'data-trigger' => 'active', 'aria-describedby' => 'popover906376', "data-minlength" => "8")) ?>
							</div>
							
							<div class="form-group">
								<label for="name">
									<?php echo __("Avatar") ?>
								</label>
								<?= $this->Form->input('file', array('type' => 'file', 'label' => false, 'class' => 'form-control')) ?>
							</div>
							
							<?php
							echo $this->Form->submit(__('Guardar'), array('class' => 'btn btn-info'));
							echo $this->Form->end();
						} ?>

					</div>

					<div class="col-md-3 col-sm-12"></div>
				</div>

			</div>
		</div>
	</div>