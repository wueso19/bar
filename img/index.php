<?php
//Directorio
$dir = getcwd();
$directorio = opendir($dir);

$archivos = array();
$carpetas = array();

//Carpetas y Archivos a excluir
$excluir = array('.', '..', 'index.php', 'favicon.ico','folder.png','file.png','.dropbox.cache','.dropbox');

while ($f = readdir($directorio)) {
    if (is_dir("$dir/$f") && !in_array($f, $excluir)) {
        $carpetas[] = $f;
    } else if (!in_array($f, $excluir)){
        //No es una carpeta, por ende lo mandamos a archivos
        $archivos[] = $f;
    }
}
closedir($directorio);

sort($carpetas,SORT_NATURAL | SORT_FLAG_CASE);
sort($archivos,SORT_NATURAL | SORT_FLAG_CASE);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <title>img</title>        

        </style>
    </head>
    <body>
        <div class="container">
			<?php if(!empty($carpetas)): ?>	
				<div class="row">
					<div class="col">
						<h1>Directorios</h1>
						<?php
						//Mostrar Carpetas					
							$i = 1;
							echo '<div class="list-group">';					
							foreach ($carpetas as $c) {
								echo '<a href="' . $c . '" class="list-group-item list-group-item-action display-2">' . $c . '</a>';
							}
							echo '</div>';
						?>
					</div>
				</div> 
		<?php endif; ?>
			<div class="row">
				<div class="col">
					<h1>Archivos</h1>
					<?php
					//Mostrar Archivos
					$i = 1;
					echo '<div class="list-group">';	
					foreach ($archivos as $a) {
						echo '<a href="' . $a . '" class="list-group-item list-group-item-action display-2">' . $a . '</a>';
					}
					echo '</div>';
					?>
				</div>
			</div>
        </div>
    </body>
</html>