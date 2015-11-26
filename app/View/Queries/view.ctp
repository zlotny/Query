<div class="container-fluid">


	<h2 class="query-title"><?= $targetQuery["Query"]["title"]; ?></h2>
	<div class="container-fluid row">
		<div class="col-sm-12 col-xs-8">
			<small class="creator">Creado por <?= $this->Html->link($author["username"], "/users/view/".$author["id"]);?> - <?= $targetQuery["Query"]["created"]; ?></small>
		</div>
		<div class="visible-xs col-xs-4">
			<img src="./img/arrow_up_white.png" alt="Arrow Up" height="15" width="15">
			<span class="vote-count"> + 10  </span>
			<img src="./img/arrow_down_white.png" alt="Arrow Down" height="15" width="15">
		</div>
	</div>
	<hr class="query-separator">
	<br>
	<div class="container-fluid row">
		<div class="col-sm-1 hidden-xs vote">
			<!--<div class="vote-question">-->
			<div>
				<?php echo $this->Html->image('arrow_up_white.png', array('alt' => 'Arrow Up', 'height' => '30', 'width' => '30')); ?><br>
				<span class="vote-count"> + 0  </span><br>
				<?php echo $this->Html->image('arrow_down_white.png', array('alt' => 'Arrow Down', 'height' => '30', 'width' => '30')); ?>
			</div>
		</div>
		<div class="col-sm-11 col-xs-12 question-content-div">
			<!--<div class="description-question">-->	
			<p class="question-content"> 
				<?= $targetQuery["Query"]["content"]; ?>
			</p>	
		</div>
	</div>
	<hr class="query-separator">
	<span class="btn btn-primary btn-xs tag">Existencial</span>
	<span class="btn btn-primary btn-xs tag">Futuro</span>
	<span class="btn btn-primary btn-xs tag">Insomnia</span>

	<a class="btn btn-primary pull-right" href="#" data-toggle="modal" data-target="#responderQuery">Responder</a>



</div>


<div class="container-fluid answers-block">
			<!--<div class="col-sm-1">
			</div>
		-->

		
		<?php foreach ($targetQuery["Comment"] as $comment){
			?>


			<div class="query-answer container-fluid">
				<div class="col-sm-1 hidden-xs">
					<div class="vote">
						<?php echo $this->Html->image('arrow_up_white.png', array('alt' => 'Arrow Up', 'height' => '30', 'width' => '30')); ?><br>
						<span class="vote-count"> + 0  </span><br>
						<?php echo $this->Html->image('arrow_down_white.png', array('alt' => 'Arrow Down', 'height' => '30', 'width' => '30')); ?>
					</div>
				</div>
				<div class="col-sm-9 col-xs-12 bubble"><?= $comment['content']; ?>
				</div>
				<div class="col-sm-2 col-xs-3 restriccion"><?php echo $this->Html->image('cambiarme.png', array('alt' => 'Avatar')); ?>
					<br>

					<p class=" query-response-user-name"><?= $this->Html->link($comment['User']['username'], "/users/view/".$comment['User']['id']);?></p>
				</div>
				<div class="visible-xs col-xs-9">
					<img src="./img/arrow_up_white.png" alt="Arrow Up" height="30" width="30"><br>
					<span class="vote-count">+10  </span><br>
					<img src="./img/arrow_down_white.png" alt="Arrow Down" height="30" width="30">
				</div>
			</div>


			<?php
		}
		?>