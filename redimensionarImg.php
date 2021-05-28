 <?php 
function redimensionarImg ($foto, $ancho_f, $alto_f){
	//extraemos atributos de la imágen
	list($ancho_i,$alto_i,$nro_tipo)=getimagesize($foto);

	//Creamos una variable a partir de la imagen original según su tipo
	switch ($nro_tipo) {
		case '1': $img_inicial = imagecreatefromgif($foto);break;
		case '2': $img_inicial = imagecreatefromjpeg($foto);break;
		case '3': $img_inicial = imagecreatefrompng($foto);break;
		default:
			echo "imagen invalidad";break;
	}

	//Calculamos RATIO proporción entre las magnitudes originales y finales
	$ratio_ancho = $ancho_f/$ancho_i; //F-inal e I-nicial
	$ratio_alto = $alto_f/$alto_i;

	//Obtenemos maximo entre los RATIOS
	$ratio_max = max($ratio_ancho, $ratio_alto);

	//Utilizamos el ratio maximo para calcular el nuevo ancho y alto de la imágen

	$nvo_ancho = $ancho_i * $ratio_max;
	$nvo_alto = $alto_i * $ratio_max;

	//Calculamos recortes
	$cortar_ancho = $nvo_ancho - $ancho_f;
	$cortar_alto = $nvo_alto - $alto_f;

	//definimos el desplazamiento en o.5 asi se recorta la parte central de la imagen
	$desplazamiento = 0.5;

	//creamos una imagen en blanco con los tamaños finales
	$nueva_img = imagecreatetruecolor($ancho_f, $alto_f);

	//copiamos la imagen original sobre la acabamos de crear en blanco

	imagecopyresampled($nueva_img, $img_inicial, -$cortar_ancho * $desplazamiento, -$cortar_alto * $desplazamiento, 0, 0, $ancho_f + $cortar_ancho, $alto_f + $cortar_alto, $ancho_i, $alto_i);

	//se destruye la variable original para liberar memoria
	imagedestroy($img_inicial);

	//definimos calidad de la imagen a guardar
	$calidad = 100;

	//definimos el nombre final de la imagen, para que sea unico lo concatenamos con la funcion time()
	$nbr_img = time()."-".$foto;

	//creamos la imagen final en el directorio indicado

	imagejpeg($nueva_img,'archivos/'.$nbr_img, $calidad);
	chmod('archivos/'.$nbr_img, 0777);

	//retorna la ruta y el nombre de la nueva imagen
	return $nbr_img;
}
?>