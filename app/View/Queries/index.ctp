		<div class="container-fluid">
			<div class="col-sm-8">
				<?php if($this->Session->read("User.id")){
					?>
					<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#pregunta"><?= __("Publica tu Query!"); ?></a>
					<?php
				}else{
					?>
					<a class="btn btn-primary" disabled href="#"><?= __("Publica tu Query!"); ?></a>
					<?php
				} ?>
				<span class="pull-right">
					<ul class="nav nav-pills">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
								Filtro <span class="caret"></span>
							</a>
							<ul class="dropdown-menu">

								<li><?= $this->Paginator->sort('modified', __("Últimas preguntas"), array('direction' => 'desc', 'lock' => true)); ?></li>

								<?php
								if($this->Session->read("User.id")){
									?>
									<li class="divider"></li>
									<li><?= $this->Html->link( __("Mis preguntas"), array('controller' => 'queries', 'action' => 'index?user_id='.$this->Session->read("User.id"))) ?></li>
									<?php
								}		
								?>

							</ul>
						</li>
					</ul>
				</span>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<br>


		<div id="question-body" class="container-fluid preguntas">

			<div class="col-sm-8">
				<ul class="list-group">
					<li class="list-group-item active quizma-font titulo-lista">
						<?= __("Preguntas"); ?>
					</li>

					<?php
					foreach($querys as $query){
						?>

						<li class="list-group-item">
							<span class="badge"><?= __("Respuestas: "); ?><?= count($query["Comment"]); ?> </span>
							<span class="title" ><a class="pregunta-link" href="view.html"><?= $this->Html->link($query['Query']['title'], array('controller' => 'queries', 'action' => 'view', $query['Query']['id'])) ?></a></span>
							<br>
							<div class="tags-y-puntuacion">
								<div class="progress progress-striped active puntuacion">
									<div class="progress-bar progress-bar-success" style="width: 50%"><span class="count-votos">30 votos</span></div>
									<div class="progress-bar progress-bar-danger" style="width: 50%"><span class="count-votos">30 votos</span></div>
								</div>
							</div>
						</li>

						<?php
					}
					?>



					<div class="container-fluid row-centered">
						<div class="col-sm-2"></div>
						<div class="col-sm-8 ">
							<ul class="pagination">
								<?php 
								if($this->Paginator->hasPrev()){
									echo $this->Paginator->prev('«', array('tag' => 'li'));
								} else {
									echo "<li class='disabled'>";
									echo $this->Paginator->prev('«', array('tag' => 'a'));
									echo "</li>";
								}

								echo $this->Paginator->numbers(array('tag'=>'li', 'separator'=>'', 'currentTag'=>'a', 'currentClass'=>'disabled')); 

								if($this->Paginator->hasNext()){
									echo $this->Paginator->next('»', array('tag' => 'li'));
								} else {
									echo "<li class='disabled'>";
									echo $this->Paginator->next('»', array('tag' => 'a'));
									echo "</li>";
								}
								?>
							</ul>

						</div>
						<div class="col-sm-2"></div>

					</div>


				</ul>
			</div>
			<div class="col-sm-4">
				<ul class="list-group">
					<li class="list-group-item active quizma-font titulo-lista">
						<?= __("Lo nuevo"); ?>
					</li>
					<li class="list-group-item">
						<?php
							//Preguntas respondidas 
						$preguntasRespondidas=0;
						$preguntasSinRespuesta=0;

						foreach ($allQuerys as $key => $comment) {

							foreach ($comment["Comment"] as $key => $row) {
									//echo strtotime($row["modified"]) === strtotime('today');
								if( explode(" ", $row["modified"])[0] == date('Y-m-d')){								$preguntasRespondidas++;
									break;
								}
							}
						}

							//Preguntas sin votar

							//Preguntas sin respuesta
						foreach ($allQuerys as $key => $comment) {

							if(empty($comment["Comment"])){
								$preguntasSinRespuesta++;									
							}
						}
						?>
						<span class="badge"><?= $preguntasRespondidas; ?></span>
						<?= __("Preguntas respondidas hoy"); ?>
					</li>
					<li class="list-group-item">
						<span class="badge">falta</span>
						<?= __("Preguntas sin votar"); ?>
					</li>
					<li class="list-group-item">
						<span class="badge"><?= $preguntasSinRespuesta; ?></span>
						<?= __("Preguntas sin respuesta"); ?>
					</li>
				</ul>
			</div>
		</div>






