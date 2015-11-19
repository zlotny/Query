<h1>Titulo</h1>
<p><?= $targetQuery["Query"]["title"]; ?></p>

<h1>Contenido</h1>
<p><?= $targetQuery["Query"]["content"]; ?></p>


<h1>Comentarios</h1>
<table>
	<tr>
		<th>Usuario</th>
		<th>Comentario</th>
	</tr>

	<?php foreach ($targetQuery["Comment"] as $comment){
		echo "<tr>";
		echo "<td>a</td>";
		echo "<td>".$comment['content']."</td>";
		echo "</tr>";
	}

	?>
</table>