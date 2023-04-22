<?php



$header = '<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Serpientes y Escaleras</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <button onclick=rollDice() style="margin-left: 415px">Tirar Dado</button>';

 // <!-- ESTE CÓDIGO SE INYECTA PARA ACCIÓN DE INICIO DEL JUEGO -->
  $inicio = '<section id="begin" style="margin-left: 33%">
     <img src="markers/Inicio.png"  height="500" width="500">
  </section>';
//<!-- FIN ESTE CÓDIGO SE INYECTA PARA ACCIÓN DE INICIO DEL JUEGO -->

 //<!-- ESTE CÓDIGO SE INYECTA PARA ACCIÓN DE FIN DEL JUEGO -->
  $fin = '<section id="memory--end-game-modal" class="valign-table modal">
      <div class="valign-cell">
        <div class="wrapper">
         <img src="markers/Fin.png"  height="400" width="400">
          <h2 id="memory--end-game-message"></h2>

        </div>
      </div>
  </section>';
 //<!-- FIN ESTE CÓDIGO SE INYECTA PARA ACCIÓN DE FIN DEL JUEGO -->


//<!-- ESTE CÓDIGO SE INYECTA PARA ACCIÓN SUBIR ESCALERA DEL JUEGO -->
  $subir= '<section id="memory-up-modal" style="right: -70px" class="valign-table modal">
      <div class="valign-cell">
        <div class="wrapper">
         <img src="markers/Escalera.png"  height="400" width="400">
          <h2 id="memory--end-game-message"></h2>

        </div>
      </div>
  </section>';
//<!-- FIN ESTE CÓDIGO SE INYECTA PARA ACCIÓN SUBIR ESCALERA DEL JUEGO -->


//<!-- ESTE CÓDIGO SE INYECTA PARA ACCIÓN BAJAR ESCALERA DEL JUEGO -->
  $bajar = '<section id="memory-down-modal" style="right: -70px" class="valign-table modal">
      <div class="valign-cell">
        <div class="wrapper" mar>
         <img src="markers/Serpiente.png"  height="400" width="400">
          <h2 id="memory--end-game-message"></h2>

        </div>
      </div>
  </section>';
//<!-- FIN ESTE CÓDIGO SE INYECTA PARA ACCIÓN BAJAR ESCALERA DEL JUEGO -->

  $footer = '<div class="wrapper">
    <div id=board>
    </div>
    <canvas id=canvas width="1000" height="1000"></canvas>
     <div  class="headersresults" id="headersresults">
      <p>Pos / Dado  / Resultado</p>

     </div>

    <div class="results" id="results">


    </div>
  </div>


  <script src="js/index.js"></script>
</body>

</html>';