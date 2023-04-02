<!DOCTYPE html>
<html>
  <head>
    <title>Snack Game</title>
    <style>
      #game-board {
        width: 300px;
        height: 300px;
        border: 1px solid black;
        position: relative;
      }
      .snack {
        width: 10px;
        height: 10px;
        background-color: green;
        position: absolute;
      }
    </style>
  </head>
  <body>
    <h1>Snack Game</h1>
    <div id="game-board"></div>
    <script>
      const gameBoard = document.getElementById("game-board");
      let snack = [];
      let x = 150;
      let y = 150;
      let direction = "right";

      function updateSnack() {
        // Remove the last element of the snack
        let removed = snack.pop();
        removed.remove();

        // Add a new element to the front of the snack in the correct direction
        let newHead = document.createElement("div");
        newHead.classList.add("snack");
        newHead.style.left = x + "px";
        newHead.style.top = y + "px";
        gameBoard.appendChild(newHead);
        snack.unshift(newHead);

        // Update the x and y position based on the direction
        switch (direction) {
          case "right":
            x += 10;
            break;
          case "left":
            x -= 10;
            break;
          case "up":
            y -= 10;
            break;
          case "down":
            y += 10;
            break;
        }
      }

      document.addEventListener("keydown", function(event) {
        switch (event.key) {
          case "ArrowRight":
            direction = "right";
            break;
          case "ArrowLeft":
            direction = "left";
            break;
          case "ArrowUp":
            direction = "up";
            break;
          case "ArrowDown":
            direction = "down";
            break;
        }
      });

      setInterval(updateSnack, 100);
    </script>
  </body>
</html>
