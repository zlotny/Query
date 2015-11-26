		<?php

		foreach($querys as $query){
			?>

			<li class="list-group-item">
				<span class="badge">Respuestas: --falta</span>
				<span class="title" ><a class="pregunta-link" href="view.html"><?= $this->Html->link($query['Query']['title'], array('controller' => 'queries', 'action' => 'view', $query['Query']['id'])) ?></a></span>
				<br>
				<div class="tags-y-puntuacion">
					<span class="btn btn-primary btn-xs tag">MOVIDA</span>
					<span class="btn btn-primary btn-xs tag">CAMBIAR</span>
					<span class="btn btn-primary btn-xs tag">BASE DE DATOS</span>
					<div class="progress progress-striped active puntuacion">
						<div class="progress-bar progress-bar-success" style="width: 50%"><span class="count-votos">30 votos</span></div>
						<div class="progress-bar progress-bar-danger" style="width: 50%"><span class="count-votos">30 votos</span></div>
					</div>
				</div>
			</li>

			<?php
		}
		?>
