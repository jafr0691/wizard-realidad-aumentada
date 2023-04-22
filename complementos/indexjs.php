<?php



$unoijs = 'var hasWon = false;

window.rollDice = ()=>{
  if (hasWon) {
    return;
  }
  const max = 6;
  const roll = Math.ceil(Math.random() * max);
  console.log("You rolled", roll);
  let currentPlayer = players[currentPlayerTurn];
  var rolString = roll.toString();
  var positionString = currentPlayer.position.toString();

  currentPlayer.position += roll;
  console.log("pos S", positionString);

  document.getElementById("results").innerHTML = ""+positionString+" + "+rolString+" = "+ currentPlayer.position.toString();
  document.getElementById("headersresults").style.display = "block";
  console.log("pos finnal  S", currentPlayer.position);

  ladders.forEach(ladder=>{


    if (ladder.start === currentPlayer.position) {

      var resultadoEscalera = 0;
      var divResultado = document.getElementById("results");

      isLadder = ladder.end > ladder.start;
      if(isLadder ){
        console.log("Has subido por una escalera");
        resultadoEscalera = ladder.end - ladder.start;
        console.log("cantidad escalera ", resultadoEscalera);
        divResultado.innerHTML += " + ";';


        // SI NO ELIGIÓ SUBIR ESCALERA -> MANDA UN ALERT COMENTADO ABAJO
        $dosnosubir=' alert("Has subido por una escalera");';
        // FIN SI NO ELIGIÓ SUBIR ESCALERA -> MANDA UN ALERT COMENTADO ABAJO


        //  ESTE CÓDIGO SE INYECTA PARA ACCIÓN SUBIR ESCALERA DEL JUEGO
        $tressubir = 'document.getElementById("memory-up-modal").classList.toggle("show");
        setTimeout(function() {
        document.getElementById("memory-up-modal").classList.remove("show");


        }, 4000);';
        // FIN ESTE CÓDIGO SE INYECTA PARA ACCIÓN SUBIR ESCALERA DEL JUEGO


      $cuatroijs ='}else{
        console.log("Has caido por una serpiente");
        resultadoEscalera = ladder.start - ladder.end;
        console.log("cantidad serpiente ", resultadoEscalera);';

        // SI NO ELIGIÓ BAJAR ESCALERA -> MANDA UN ALERT COMENTADO ABAJO
        $quintonobajar ='alert("Has caido por una serpiente");';
        // FIN SI NO ELIGIÓ BAJAR ESCALERA -> MANDA UN ALERT COMENTADO ABAJO


        //  SI ELIGE BJAR  ESCALERA ESTE CÓDIGO SE INYECTA PARA ACCIÓN BAJAR ESCALERA DEL JUEGO

        $sestobajar ='document.getElementById("memory-down-modal").classList.toggle("show");
        setTimeout(function() {
        document.getElementById("memory-down-modal").classList.remove("show");

        }, 4000);';
        //  FIN ESTE CÓDIGO SE INYECTA PARA ACCIÓN BAJAR ESCALERA DEL JUEGO

       $sextoijs ='divResultado.innerHTML += " - ";
      }

      divResultado.innerHTML += resultadoEscalera.toString();

      currentPlayer.position = ladder.end;

      divResultado.innerHTML += " = "+ladder.end.toString();


    }



  });

  if (currentPlayer.position >= position) {';


    // SI NO ELIGIÓ FIN DEL JUEGO -> MANDA UN ALERT COMENTADO ABAJO

    $octavonofin ='alert("Jugador "+ currentPlayer.name + " Ha ganado");';

    // FIN SI NO ELIGIÓ FIN DEL JUEGO -> MANDA UN ALERT COMENTADO ABAJO

    //console.log("Player has won!");


     // SI ELIGE  FIN DEL JUEGO -> DESPLIEGA MODAL CON SU MENSAJE

   $novenofin =' document.getElementById("memory--end-game-message").textContent = ""+ currentPlayer.name + " Ha ganado";


    document.getElementById("memory--end-game-modal").classList.toggle("show");';

     //  FINSI ELIGE  FIN DEL JUEGO -> DESPLIEGA MODAL CON SU MENSAJE



    $diesijs = 'hasWon = true;


  }
  if (currentPlayer.position >= position) {
    console.log("entro a position mayot igual a position");
    console.log("valor de currentPlayer.position ",currentPlayer.position);
    console.log("valor de position ", position);

    const diff = currentPlayer.position - position;
    console.log("valor de diff ", diff);

    currentPlayerPosition = position - diff;
    console.log("valor de currentPlayer.position final ", currentPlayerPosition);
  }

  currentPlayerTurn ++;
  if (currentPlayerTurn >= players.length) {
    currentPlayerTurn = 0;
  }
  renderBoard();
}

const players = [{
  name:"Jugador 1",
  position: 0,
  color: "gold"
},{
  name:"Jugador 2",
  position: 0,
  color: "white"
}];

let currentPlayerTurn = 0;

const width = 9;
const height = 9;
const board = [];
let position = 0;
let blackSquare = false;

// IT COULD BE RANDOM IN FUTURE VERSIONS
const ladders = [{
  start: 2,
  end: 22
},{
  start: 50,
  end: 34
},{
  start: 10,
  end: 44
},{
  start: 61,
  end: 19
},{
  start: 70,
  end: 83
},{
  start:78,
  end: 4
}];

for (var y = height; y >= 0; y--) {
  let row = [];

  board.push(row);
  for (var x = 0; x < width; x++) {

    row.push({x,y,occupied:null,position,color: blackSquare ? "steelblue" : "silver"});
    blackSquare = !blackSquare;
    position ++;
  }
}

const boardSizeConst = 50;
const renderBoard = ()=>{


  let boardHTML = ``;
  board.forEach(row=>{
    row.forEach(square=>{
      boardHTML += `<div class=square style="top:${square.y * boardSizeConst}px; left:${square.x * boardSizeConst}px; background-color:${square.color}"></div>`
    });
  });

  players.forEach(player=>{
    let square = null;
    board.forEach(row=>{
    row.forEach(square=>{
          if (square.position === player.position) {
            boardHTML += `<div class=player style="top:${square.y * boardSizeConst + 5}px; left:${square.x * boardSizeConst + 5}px;background-color:${player.color}"></div>`;
          }
      });
    });
  });

  ladders.forEach(ladder=>{



    //let start = 0;
    let startPos = {x:0,y:0};
    let endPos = {x:0,y:0};

    board.forEach(row=>{
      row.forEach(square=>{
        if (square.position === ladder.start) {
          startPos.x = square.x * boardSizeConst;
          startPos.y = square.y * boardSizeConst;
        }

        if (square.position === ladder.end) {
          endPos.x = square.x * boardSizeConst;
          endPos.y = square.y * boardSizeConst;
        }
      });
    });

    const isLadder = ladder.end > ladder.start;

    drawLine({color : isLadder ? "green" : "red",startPos,endPos});
  });
  document.getElementById("board").innerHTML = boardHTML;




}

function drawLine({color,startPos,endPos}){

  var c=document.getElementById("canvas");
  var ctx=c.getContext("2d");
  ctx.beginPath();
  const sizeRatio = 1;
  ctx.moveTo(startPos.x + 25,startPos.y + 25);
  ctx.lineTo(endPos.x + 25,endPos.y + 25 );

  ctx.lineWidth = 15;
  ctx.strokeStyle = color;
  ctx.stroke();
}';


 // SI ELIGE INICIO DEL JUEGO

 $onceinicio = 'setTimeout(function(){
    var s = document.getElementById("begin").style;
    s.opacity = 1;
    (function fade(){(s.opacity-=.1)<0?s.display="none":setTimeout(fade,40)})();

    },4000); //delay is in milliseconds

    var delayInMilliseconds = 4000; //1 second

setTimeout(function() {
  renderBoard();
  //your code to be executed after 1 second
}, delayInMilliseconds);';

// FIN SI ELIGE INICIO DEL JUEGO

// SI NO ELIGE INICIO DEL JUEGO --> LLAMA A RENDERBOARD LÍNEA COMENTADA ABAJO
$docenoinicio ='renderBoard();';
// FIN SI NO ELIGE INICIO DEL JUEGO --> LLAMA A RENDERBOARD LÍNEA COMENTADA ABAJO

