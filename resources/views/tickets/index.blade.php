<!DOCTYPE html>
<html>
<head>
  <style>
    #dragTarget {
      width: 200px;
      height: 200px;
      border: 1px solid black;
      background-color: lightgray;
      text-align: center;
      padding: 10px;
    }
  </style>
  <script>
    function dragStart(event) {
      event.dataTransfer.setData("text/plain", event.target.id);
    }

    function allowDrop(event) {
      event.preventDefault();
    }

    function drop(event) {
      event.preventDefault();
      var data = event.dataTransfer.getData("text/plain");
      event.target.appendChild(document.getElementById(data));
    }
  </script>
</head>
<body>
  <div id="dragTarget" ondrop="drop(event)" ondragover="allowDrop(event)">
    <div draggable="true" ondragstart="dragStart(event)" id="dragElement">
      Drag me!
    </div>
  </div>
</body>
</html>
