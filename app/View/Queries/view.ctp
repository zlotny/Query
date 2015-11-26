<div class="container-fluid">


	<h2 class="query-title"><?= $targetQuery["Query"]["title"]; ?></h2>
	<div class="container-fluid row">
		<div class="col-sm-12 col-xs-8">
			<small class="creator">Creado por <?= $this->Html->link($author["username"], "/users/view/".$author["id"]);?> - <?= $targetQuery["Query"]["created"]; ?></small>
		</div>
		<div class="visible-xs col-xs-4">

			<?php 
			if($this->Session->read("User.id")){
				
				$id_user =$this->Session->read("User.id");
				$id_query=$targetQuery['Query']['id'];
				$voted = $this->requestAction("/users/voted/$id_user/$id_query");
				
				if($voted && $voted[0]["queries_users"]["vote"]==1){
					
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('arrow_up_white.png', array(
						'alt' => 'Arrow Up',
						'height' => '15', 
						'width' => '15'
						));
				}
				if($voted && $voted[0]["queries_users"]["vote"]==-1){
					
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('arrow_up_white.png', array(
						'alt' => 'Arrow Up',
						'height' => '15', 
						'width' => '15',
						'url' => array('controller' => 'queries', 'action' => 'updateVote', 'up',$targetQuery["Query"]["id"],$id_voto)
						));				
				}
				if(empty($voted)){
					
					echo $this->Html->image('arrow_up_white.png', array(
						'alt' => 'Arrow Up',
						'height' => '15', 
						'width' => '15',
						'url' => array('controller' => 'queries', 'action' => 'vote', 'up',$targetQuery["Query"]["id"])
						));	
				}
				//<img src="./img/arrow_up_white.png" alt="Arrow Up" height="15" width="15">-->
				if(!empty($numVotos)) echo '<span class="vote-count">'.$numVotos.'</span>';
				else echo '<span class="vote-count"> 0 </span>';
			
				if($voted && $voted[0]["queries_users"]["vote"]==1){
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('arrow_down_white.png', array(
						'alt' => 'Arrow Down',
						'height' => '15', 
						'width' => '15',
						'url' => array('controller' => 'queries', 'action' => 'updateVote', 'down',$targetQuery["Query"]["id"], $id_voto)
						));
				}
				if($voted && $voted[0]["queries_users"]["vote"]==-1){
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('arrow_down_white.png', array(
						'alt' => 'Arrow Down',
						'height' => '15', 
						'width' => '15'
						));				
				}
				if(empty($voted)){
					echo $this->Html->image('arrow_down_white.png', array(
						'alt' => 'Arrow Down',
						'height' => '15', 
						'width' => '15',
						'url' => array('controller' => 'queries', 'action' => 'vote', 'down',$targetQuery["Query"]["id"])
						));	
				}
				
			}
			else{

				echo $this->Html->image('arrow_up_white.png', array(
						'alt' => 'Arrow Up',
						'height' => '15', 
						'width' => '15'
						));
				echo '<span class="vote-count"> cambiar </span>';
				echo $this->Html->image('arrow_down_white.png', array(
						'alt' => 'Arrow Down',
						'height' => '15', 
						'width' => '15'
						));
				
			}
			?>
		</div>
	</div>
	<hr class="query-separator">
	<br>
	<div class="container-fluid row">
		<div class="col-sm-1 hidden-xs vote">
			<!--<div class="vote-question">-->
			<div>
				<?php 
				if($this->Session->read("User.id")){
				
				$id_user =$this->Session->read("User.id");
				$id_query=$targetQuery['Query']['id'];
				$voted = $this->requestAction("/users/voted/$id_user/$id_query");
				
				if($voted && $voted[0]["queries_users"]["vote"]==1){
					
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('arrow_up_white.png', array(
						'alt' => 'Arrow Up',
						'height' => '30', 
						'width' => '30'
						));
					echo '</br>';
					
				}
				if($voted && $voted[0]["queries_users"]["vote"]==-1){
					
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('arrow_up_white.png', array(
						'alt' => 'Arrow Up',
						'height' => '30', 
						'width' => '30',
						'url' => array('controller' => 'queries', 'action' => 'updateVote', 'up',$targetQuery["Query"]["id"],$id_voto)
						));
					echo '</br>';				
				}
				if(empty($voted)){
					
					echo $this->Html->image('arrow_up_white.png', array(
						'alt' => 'Arrow Up',
						'height' => '30', 
						'width' => '30',
						'url' => array('controller' => 'queries', 'action' => 'vote', 'up',$targetQuery["Query"]["id"])
						));
					echo '</br>';	
				}
				//<img src="./img/arrow_up_white.png" alt="Arrow Up" height="30" width="30">-->

				if(!empty($numVotos))echo '<span class="vote-count">'.$numVotos.'</span>';
				else echo '<span class="vote-count"> 0 </span>';
				echo '</br>';
			
				if($voted && $voted[0]["queries_users"]["vote"]==1){
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('arrow_down_white.png', array(
						'alt' => 'Arrow Down',
						'height' => '30', 
						'width' => '30',
						'url' => array('controller' => 'queries', 'action' => 'updateVote', 'down',$targetQuery["Query"]["id"], $id_voto)
						));
					echo '</br>';
				}
				if($voted && $voted[0]["queries_users"]["vote"]==-1){
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('arrow_down_white.png', array(
						'alt' => 'Arrow Down',
						'height' => '30', 
						'width' => '30'
						));
					echo '</br>';				
				}
				if(empty($voted)){
					echo $this->Html->image('arrow_down_white.png', array(
						'alt' => 'Arrow Down',
						'height' => '30', 
						'width' => '30',
						'url' => array('controller' => 'queries', 'action' => 'vote', 'down',$targetQuery["Query"]["id"])
						));
					echo '</br>';	
				}
				
			}
			else{

				echo $this->Html->image('arrow_up_white.png', array(
						'alt' => 'Arrow Up',
						'height' => '30', 
						'width' => '30'
						));
				echo '</br>';
				echo '<span class="vote-count"> cambiar </span>';
				echo $this->Html->image('arrow_down_white.png', array(
						'alt' => 'Arrow Down',
						'height' => '30', 
						'width' => '30'
						));
				echo '</br>';
				
			}
				?>
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

	<?php
	if($this->Session->read("User.id")){
		?>

		<a class="btn btn-primary pull-right" href="#" data-toggle="modal" data-target="#responderQuery">Responder</a>

		<?php
	}
	?>



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
								<?= $this->Form->create('Comment', array('action' => '/add')); ?>
								<?= $this->Form->input("user_id", array("type" => "hidden", "value" => $this->Session->read("User.id")));?>
								<?= $this->Form->input("query_id", array("type" => "hidden", "value" => $targetQuery["Query"]["id"]));?>

								<h3>Danos tu solución:</h3><br>

								<div class="form-group">
									<?= $this->Form->textarea("content", array("class" => "form-control", "placeholder" => "Tu respuesta es...", "id" => "textArea", "rows" => "8"));?>
								</div>
								<div class="form-group pull-right">
									<?= $this->Form->submit('Comentar', array('class' => 'btn btn-info')); ?>

								</div>
								<?= $this->Form->end(); ?>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
