

<table>
	<thead>
		<td>Título</td>
	</thead>
	<tbody>
		<?php
		foreach($querys as $query){
			echo "<tr>";
			echo "<td>".$this->Html->link($query['Query']['title'], array('controller' => 'queries', 'action' => 'view', $query['Query']['id']))."</td>";
			echo "</tr>";
		}
		?>
	</tbody>
</table>