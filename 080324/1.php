<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{text-align: center;}
canvas {border: 1px solid black;}
</style>
<body>
<canvas id="drawCanvas" width="600" height="350"></canvas>



<!-- ==================================================== -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const canvas = document.getElementById("drawCanvas");
    const context = canvas.getContext("2d");
    let isDrawing = false;
    let lastX = 0;
    let lastY = 0;
    function startDrawing(e) {
        isDrawing = true;
        [lastX, lastY] = [e.offsetX, e.offsetY];}
    function stopDrawing() {
        isDrawing = false}
    function draw(e) {
        if (!isDrawing) return;
        context.beginPath();
        context.moveTo(lastX, lastY);
        context.lineTo(e.offsetX, e.offsetY);
        context.strokeStyle = "#000";
        context.lineWidth = 5;
        context.lineCap = "round";
        context.lineJoin = "round";
        context.stroke();
        [lastX, lastY] = [e.offsetX, e.offsetY];}
    canvas.addEventListener("mousedown", startDrawing);
    canvas.addEventListener("mouseup", stopDrawing);
    canvas.addEventListener("mouseout", stopDrawing);
    canvas.addEventListener("mousemove", draw);});
</script>
</body>
</html>