<?php

$headermemorama = '<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Juego de memoria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="js/MemoryGame.js" type="text/javascript"></script>
    <script src="js/Card.js" type="text/javascript"></script>
    <link href="css/MemoryGame.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <section id="memory--settings-modal" class="valign-table modal show">
      <div class="valign-cell">
        <form>
          <h2 class="memory--settings-label">Dificultad</h2>
          <select id="memory--settings-grid">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
          <input id="memory--settings-reset" type="submit" value="Iniciar" />
        </form>
      </div>
    </section>' . $salto;

$terminadomemorama = '<section id="memory--end-game-modal" class="valign-table modal">
      <div class="valign-cell">
        <div class="wrapper">
         <img src="reader/terminado.png"  height="400" width="400">
          <h2 id="memory--end-game-message"></h2>
          <h3 id="memory--end-game-score"></h3>
        </div>
      </div>
    </section>' . $salto;
$noindfin = '<section id="memory--end-game-modal" class="valign-table modal">
      <div class="valign-cell">
        <div class="wrapper">
          <h2 id="memory--end-game-message"></h2>
          <h3 id="memory--end-game-score"></h3>
        </div>
      </div>
    </section>'. $salto;



$acertarmemorama = '<section id="memory-goodCard-game-modal" style="position: absolute;left: 35%" class="valign-table modal">
      <div class="valign-cell">
        <div class="wrapper">
         <img src="reader/acertar.png"  height="400" width="400">
          <h2 >Correcto!</h2>

         </div>
      </div>
    </section>' . $salto;

$erromemorama = '<section id="memory-badCard-game-modal" style="position: absolute;left: 35%" class="valign-table modal">
      <div class="valign-cell">
        <div class="wrapper">
         <img src="reader/erro.png"  height="400" width="400">
          <h2 >Error!</h2>
         </div>
      </div>
    </section>' . $salto;

$loadingmemorama = '<section id="begin" style="margin-left: 25%">
     <img src="reader/loading.png"  height="650" width="650">
    </section>' . $salto;

$footermemorama = '   <section id="memory--app-container">
      <span id="timer-app"></span>
      <ul id="memory--cards">
      </ul>
    </section>
    <section class="memory--menu-bar">
      <div class="inner">
        <div class="left"></div>
        <div class="right"><a href="#settings"><img id="memory--settings-icon" src="images/gear.png" /></a></div>
      </div>
    </section>
    <script src="js/BrowserInterface.js" type="text/javascript"></script>
  </body>
</html>';



