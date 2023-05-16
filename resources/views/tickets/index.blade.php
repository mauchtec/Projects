<!DOCTYPE html>
<html>
<head>
	<title>Drag and Drop for Touchscreens</title>
	<style>
		.container {
			display: flex;
			flex-wrap: wrap;
			width: 400px;
			height: 400px;
			border: 2px solid black;
			padding: 10px;
		}
		
		.box {
			background-color: yellow;
			width: 80px;
			height: 80px;
			margin: 10px;
			padding: 10px;
			border: 2px solid black;
			cursor: move;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="box" draggable="true">Box 1</div>
		<div class="box" draggable="true">Box 2</div>
		<div class="box" draggable="true">Box 3</div>
		<div class="box" draggable="true">Box 4</div>
	</div>

	<script>
		var dragItem = null;

		document.addEventListener("dragstart", function(e) {
			dragItem = e.target;
			e.dataTransfer.setData("text/html", dragItem.innerHTML);
		});

		document.addEventListener("dragover", function(e) {
			e.preventDefault();
		});

		document.addEventListener("drop", function(e) {
			if (e.target.classList.contains("box")) {
				e.target.innerHTML = dragItem.innerHTML;
				dragItem.innerHTML = e.dataTransfer.getData("text/html");
			}
		});
	</script>
</body>
</html>
