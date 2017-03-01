
	<div class="container well">
		<h2>Introduce tu lista de participantes:</h2>
		<p>
		Introduce línea por línea el nombre de los participantes. A continuación, selecciona el número de ganadores que quieres tener:
		</p>
		<form class="container" method="post" action="resultado.php" name="lista_form" onsubmit="return validar()">
			<p>Participantes: </p>
			<textarea id="mi_texto" class="form-control" name="participantes"></textarea>
			<p>Número de premios a repartir:</p>
			<input id="mi_numero" class="form-control" type="number" name="numeros" value="1">
			<br>
			<button class="btn-primary btn-lg" type="submit" name="boton_lista">ENVIAR</button>
		</form>
		<h2>¿Tienes la lista en un bloc de notas?</h2>
		<p>Puedes simplemente subir ese archivo e igualmente elegir el número de ganadores. Formatos aceptados: .txt:</p>
		<form class="container" enctype="multipart/form-data" method="post" action="resultado.php" name="lista_txt">
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<input type="file" name="bloc" accept=".txt" required>
			<input id="mi_numero" class="form-control" type="number" name="numeros" value="1">
			<br>
			<button class="btn-primary btn-lg" type="submit" name="boton_txt">ENVIAR</button>
		</form>
	</div>