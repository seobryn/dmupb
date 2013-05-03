function paint(id_canv, coordx, coordy, color, rad, line) {
	var canvas = document.getElementById(id_canv);
	var context = canvas.getContext("2d");
	var cX = coordx;
	var cY = coordy;
	var radius = rad;
	context.save();
	context.translate(canvas.width / 2, canvas.height / 2);
	context.scale(2, 1);
	context.beginPath();
	context.arc(cX, cY, radius, 0, 2 * Math.PI, false);
	context.restore();
	context.fillStyle = color;
	context.fill();
	context.lineWidth = line;
	context.strokeStyle = 'white';
	context.stroke();
}