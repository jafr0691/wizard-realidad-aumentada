<?php

$unobijs = '(function($) {

  /************ Start hard coded settings ******************/
  // GAME VARIABLES TO CHANGE DEPENDING ON LEVEL
  //LEVEL 1
  var gameRowss = 3;
  var gameColumnss = 4;
  var pointsPerHit = 10;
  var pointsPerMisTake = 3;
  var maxTime = 45;   // seconds
  var sortProp = "ASC"; // ASC DESC

  // How long a non matching card is displayed once clicked.
  var nonMatchingCardTime = 1000;

  /************ End hard coded settings ******************/

  // Handle clicking on settings icon
  var settings = document.getElementById("memory--settings-icon");
  var modal = document.getElementById("memory--settings-modal");
  var handleOpenSettings = function (event) {
    event.preventDefault();
    modal.classList.toggle("show");
  };
  settings.addEventListener("click", handleOpenSettings);

  // Handle settings form submission
  var reset = document.getElementById("memory--settings-reset");
  var handleSettingsSubmission = function (event) {
    event.preventDefault();

    var selectWidget = document.getElementById("memory--settings-grid").valueOf();
    var level = selectWidget.options[selectWidget.selectedIndex].value;

    /**
     * @TODO
     * - Implement JSON for read level variables
     */
    if(level == 1){
      console.log("Level1");
      gameRowss = 3;
      gameColumnss = 4;
      pointsPerHit = 10;
      pointsPerMisTake = 4;
      maxTime = 400;   // seconds
      sortProp = "ASC"; // ASC DESC
    }else if(level == 2){
      console.log("Level2");
      gameRowss = 4;
      gameColumnss = 4;
      pointsPerHit = 15;
      pointsPerMisTake = 3;
      maxTime = 60;   // seconds
      sortProp = "ASC"; // ASC DESC
    }else if(level == 3){
      console.log("Level3");
      gameRowss = 4;
      gameColumnss = 5;
      pointsPerHit = 20;
      pointsPerMisTake = 2;
      maxTime = 90;   // seconds
      sortProp = "ASC"; // ASC DESC
      console.log("Level3");
    }

    var cards = $.initialize(gameRowss, gameColumnss);


    if (cards) {
      document.getElementById("memory--settings-modal").classList.remove("show");';
      $nobrofin = 'document.getElementById("memory--end-game-modal").classList.remove("show");
      document.getElementById("memory--end-game-message").innerText = "";
      document.getElementById("memory--end-game-score").innerText = "";';
     $antesdos ='buildLayout($.cards, $.settings.rows, $.settings.columns);
      gamerTime(maxTime, sortProp);';

$dosinicio = "
      // codigo agregado para la acción inicio del juego

      var delayInMilliseconds = 4000; //1 second
           setTimeout(function(){
        var s = document.getElementById('begin').style;
        s.opacity = 1;
        (function fade(){(s.opacity-=.1)<0?s.display='none':setTimeout(fade,40)})();

        },4000); //delay is in milliseconds

    setTimeout(function() {
       buildLayout($.cards, $.settings.rows, $.settings.columns);
      //your code to be executed after 1 second
    }, delayInMilliseconds);

    // fin codigo agregado para la acción inicio del juego
";
$tresbijs ='
    }

  };
  reset.addEventListener("click", handleSettingsSubmission);

  // Handle clicking on card
  var handleFlipCard = function (event) {

    event.preventDefault();

    var status = $.play(this.index);
    //alert(status.message);
    console.log(status);

    if (status.code != 0 ) {
      this.classList.toggle("clicked");
    }

    if (status.code == 3 ) {
      setTimeout(function () {
        var childNodes = document.getElementById("memory--cards").childNodes;
        childNodes[status.args[0]].classList.remove("clicked");
        childNodes[status.args[1]].classList.remove("clicked");
      }.bind(status), nonMatchingCardTime);
    }
    else if (status.code == 4) {
      calculateScoreAndPrintEndMessage($.attempts, $.mistakes);';
$cuatrofinal="
      // codigo agregado para la acción de final del juego
      document.getElementById('memory--end-game-message').textContent = message;
      document.getElementById('memory--end-game-score').textContent =
          'Score: ' + score + ' / 100';

      document.getElementById('memory--end-game-modal').classList.toggle('show');

      // fin del código acción final del juego
";
   $quintobijs = '}

  };

  var calculateScoreAndPrintEndMessage = function(attempts, mistakes){
    var score = parseInt( attempts - mistakes) * pointsPerHit;
      score -= parseInt(mistakes) * pointsPerMisTake;
      score += maxTime;

      var message = getEndGameMessage(score);';
$sestofinal2 = "
      // codigo agregado para la acción de final del juego
      document.getElementById('memory--end-game-message').textContent = message;
      document.getElementById('memory--end-game-score').textContent =
          'Score: ' + score + ' / 100';
      document.getElementById('memory--end-game-modal').classList.toggle('show');
       // fin del código acción final del juego
       ";
  $sextobijs = '}

  var getEndGameMessage = function(score) {
    var message = "";

    if (score == 100) {
      message = "Excelente"
    }
    else if (score >= 70 ) {
      message = "Gran trabajo"
    }
    else if (score >= 50) {
      message = "Bien"
    }
    else {
      message = "Puedes hacerlo mejor";
    }

    return message;
  }

  // Build grid of cards
  var buildLayout = function (cards, rows, columns) {
    if (!cards.length) {
      return;
    }

    var memoryCards = document.getElementById("memory--cards");
    var index = 0;

    var cardMaxWidth = document.getElementById("memory--app-container").offsetWidth / columns;
    var cardHeightForMaxWidth = cardMaxWidth * (3 / 4);

    var cardMaxHeight = document.getElementById("memory--app-container").offsetHeight / rows;
    var cardWidthForMaxHeight = cardMaxHeight * (4 / 3);

    // Clean up. Remove all child nodes and card clicking event listeners.
    while (memoryCards.firstChild) {
      memoryCards.firstChild.removeEventListener("click", handleFlipCard);
      memoryCards.removeChild(memoryCards.firstChild);
    }

    for (var i = 0; i < rows; i++) {
      for (var j = 0; j < columns; j++) {
        // Use cloneNode(true) otherwise only one node is appended
        memoryCards.appendChild(buildCardNode(index, cards[index],
          (100 / columns) + "%", (100 / rows) + "%"));
        index++;
      }
    }

    // Resize cards to fit in viewport
    if (cardMaxHeight > cardHeightForMaxWidth) {
      // Update height
      memoryCards.style.height = (cardHeightForMaxWidth * rows) + "px";
      memoryCards.style.width = document.getElementById("memory--app-container").offsetWidth + "px";
      memoryCards.style.top = ((cardMaxHeight * rows - (cardHeightForMaxWidth * rows)) / 2) + "px";
    }
    else {
      // Update Width
      memoryCards.style.width = (cardWidthForMaxHeight * columns) + "px";
      memoryCards.style.height = document.getElementById("memory--app-container").offsetHeight + "px";
      memoryCards.style.top = 0;
    }
  };

  // Update on resize
  window.addEventListener("resize", function() {
    buildLayout($.cards, $.settings.rows, $.settings.columns);
  }, true);

  // Build single card
  var buildCardNode = function (index, card, width, height) {
    var flipContainer = document.createElement("li");
    var flipper = document.createElement("div");
    var front = document.createElement("a");
    var back = document.createElement("a");

    flipContainer.index = index;
    flipContainer.style.width = width;
    flipContainer.style.height = height;
    flipContainer.classList.add("flip-container");
    if (card.isRevealed) {
      flipContainer.classList.add("clicked");
    }

    flipper.classList.add("flipper");
    front.classList.add("front");
    front.setAttribute("href", "#");
    back.classList.add("back");
    back.classList.add("card-" + card.value);
    if (card.isMatchingCard) {
      back.classList.add("matching");
    }
    back.setAttribute("href", "#");

    flipper.appendChild(front);
    flipper.appendChild(back);
    flipContainer.appendChild(flipper);

    flipContainer.addEventListener("click", handleFlipCard);

    return flipContainer;
  };

    /**
   * @param {number} maxTime
   * @param {string} sortProp
   * @return {void}
   */
  var gamerTime = function(maxTime, sortProp ){

    if("ASC" == sortProp){
      var startTimer = 0;
      var cuurentTime = setInterval(function(){
        startTimer ++;
        document.getElementById("timer-app").textContent = "Tiempo utilizado: " + startTimer +" Restante:" + (maxTime - startTimer);
        if(startTimer >= maxTime){
          clearInterval(cuurentTime);
          calculateScoreAndPrintEndMessage($.attempts, $.mistakes);
        }
      },1000);
    }else {
      var cuurentTime = setInterval(function(){
        maxTime --;
        document.getElementById("timer-app").textContent = "Tiempo restante: " + maxTime ;
        if(maxTime <= 0){
          clearInterval(cuurentTime);
          calculateScoreAndPrintEndMessage($.attempts, $.mistakes);
        }
      },1000);
    }

  }

})(MemoryGame);';