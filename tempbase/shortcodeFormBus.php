

// Los 7 shortcode para crea el formulario frontend
/* 
	Formulario para publicar los bus
	Inicio del formulario "Es Obligatorio ser el primero en colocar" 
	[bus_destacada_img]
*/

// Campo para ingresar la imagen destacada de la publicacion tiene para editar el corte de imagen
1) [bus_destacada_img] parametro label=valor por defecto "Click aquí para subir la foto del autobús y editarla"

// Campo para ingresar varias imagenes aparte de la imagen destacada que se mostrara en el eslider
2) [bus_slider_img] class por defecto "bus-file-slider"

// Campo para ingresar la placa que sera el titulo de la publicacion bus
3) [bus_input_placa] parametro placeholder=valor por defecto "Escribir el identificador del Bus", class por defecto bus-input-title

// Campo para ingresar el contenido de la publicacion que es la descripcion
4) [bus_textarea_descrip] parametro placeholder=valor por defecto ""

// Campo selector de las provincia de la placa del bus
5) [bus_select_provincia] class por defecto "bus-select-provincia"

// Campo selector o texto para ingresar el autor de la fotografia a publicar
6) [bus_select_fotografo] class por defecto "bus-select-fotografo"

// Campo selector para ubicar la publicacion en el menu donde se mostrara por provincia y por año del bus
6) [bus_select_menu] class por defecto bus-select-menu

// Boton para guardar los datos llenos de la publicacion del bus para que sea revisado por el administrador del sitio 
// Al ser guardada se redigira a la publicaicon recien creada, solo la podra ver el creador y el administrador no sera mostrada en menu para el publico, ya que no sera vista por el publico
7) [bus_publicar_btn] parametros text=valor por defecto "Publicar", class=valor por defecto "btn-publicar"

/*
	[bus_publicar_btn]
	Obligatoriamente tiene que estar al final del formulario ya que cierra el form
*/



//Fin del formulario // Este formulario se usa en la pagina "Publicar foto"




// Los 4 shortcode para mostar los datos de la publicacion del bus en la ficha tecnica

/*
	1
	Muestra los datos:
		fecha de la publicacion
		Cantidad de vistas
		Cantidad de comentario
*/

1) [publicado]

// 2 Muesta el texto o contenido de la descrpcion publicada

2) [bus_descrip] 

// 3 Muestra el logo o nombre de la empresa de la carroceria del bus publicado

3) [empresa_titulo]

// 4 Muestra las imagenes del slider debajo de la imagen destacada 

4) [bus_carrusel]

// Para mostrar la imagen destacada se usa con el editor del plugins elementor > elementos > imagen > se agrega que tome el dato de "featured image"

// Para mostrar la placa que es el titulo del bus publicado con el editor del plugins elementor > elementor > editor de texto > se agrega que tome el dato de Post title

// Para mostrar el autor de la fotografia del bus publicado con el editor del plugins elementor > elementor > editor de texto > se agrega que tome el dato de Post terms + taxonomia fotografo
