<?php 
	include 'header.php'; 
	?> <div class="container well"> <?php
	if(isset($_POST['boton_lista'])){
		if ($_POST['numeros']!=null && $_POST['participantes']!=null) {
			$ganadores = $_POST['numeros'];
			$texto = $_POST['participantes'];
			$lista = explode("\r", $texto);
			$cuenta_lista = count($lista);
			echo "<h2>LISTA DE PARTICIPANTES</H2>";
			echo '<p>Total de participantes: '.$cuenta_lista.'</p>';
			echo '<ul>';
			foreach ($lista as $clave => $valor) {
				echo '<li>'.($clave).' - '.$valor.'</li>';
			}
			echo '</ul>';
			//Comprobamos que el número de ganadores sea mínimo 1 y el máximo igual a la lista
			if($ganadores<=1){
				$ganadores = 1;
			}
			if($ganadores>$cuenta_lista){
				$ganadores = $cuenta_lista;
			}
			echo '<p>Número de ganadores: '.$ganadores;
			echo '<h2>GANADORES</h2>';
			//Genero array, contiene los indices e iremos comprobando que no se repite
			$num_repe = array();
			$i = 0;
			while ($i < $ganadores) {
				/* 
				in_array: comprueba si un valor ya esta en el array
				array_push: añade un elemento al array
				*/
				$aleatorio = rand(0,$cuenta_lista-1);
				if(!in_array($aleatorio, $num_repe)){
					array_push($num_repe, $aleatorio);
					$i++;
				}
			}
			echo "<ul>";
			foreach ($num_repe as $clave => $valor) {
				echo "<li>".$lista[$valor]."</li>";
			}
			echo "</ul>";

		} else {
			echo '<h2>SE HA PRODUCIDO UN ERROR DESCONOCIDO</h2>';
			echo '<p>Vuelva a intentarlo de nuevo.</p>';
			include 'sorteo.php';
		}
 	} elseif (isset($_POST['boton_txt'])) {
 		if($_FILES['bloc']!=null && $_POST['numeros']!=null){
 			$ganadores = $_POST['numeros'];
 			$fichero = fopen($_FILES['bloc']['tmp_name'], "r");
 			$lista = array();
 			$cuenta_lista = 0;
 			//primero meto los nombres en un array, luego las muestro ;)
 			while(!feof($fichero)){
				$linea = fgets($fichero);
				array_push($lista, $linea);
				$cuenta_lista++;
			}
			fclose($fichero);
			echo "<h2>LISTA DE PARTICIPANTES</H2>";
			echo "<p>Total de participantes: ".$cuenta_lista."</p>";
			echo '<ul>';
			foreach ($lista as $clave => $valor) {
				echo '<li>'.($clave).' - '.$valor.'</li>';
			}
			echo '</ul>';
			if($ganadores<=1){
				$ganadores = 1;
			}
			if($ganadores>$cuenta_lista){
				$ganadores = $cuenta_lista;
			}
			echo '<p>Número de ganadores: '.$ganadores;
			echo '<h2>GANADORES</h2>';
			$num_repe = array();
			$i = 0;
			while ($i < $ganadores) {
				$aleatorio = rand(0,$cuenta_lista-1);
				if(!in_array($aleatorio, $num_repe)){
					array_push($num_repe, $aleatorio);
					$i++;
				}
			}
			echo "<ul>";
			foreach ($num_repe as $clave => $valor) {
				echo "<li>".$lista[$valor]."</li>";
			}
			echo "</ul>";
 		}
	} else {
		//AQUI SI HAY UN ERROR
		echo "<h2>ERROR DESCONOCIDO</h2>";
		echo "<p>Por favor, retrocede a la página de inicio y vuelta a intentarlo. Muchas gracias.</p>";
	}
	?> </div> <?php
	include 'footer.php';
?>