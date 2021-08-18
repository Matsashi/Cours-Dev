"use strict";
// JavaScript statements
// =====================================================================================
let color = {
	white: "#ffffff",
	black: "#000000",
	red: "#ff0000",
	green: "#00ff00",
	blue: "#0000ff",
	yellow: "#ffff00",
	fuchsia: "#ff00ff",
	aqua: "#00ffff"
};

let turtle = {
	x: 0,
	y: 0,
	angleInRadians: 0,
	penDown: true,
	penColor: "#000000",
	lineWidth: 2,
	col:0
};

let canvas = document.getElementById('myDrawing');

if (canvas && canvas.getContext) { // does the browser support 'canvas'?
	turtle.ct = canvas.getContext("2d"); // get drawing context
	turtle.ct.fillStyle = "#888888";
	turtle.ct.fillRect(0,0,600,600);
} else {
	alert('You need a browser which supports the HTML5 canvas!');
}

// =====================================================================================


turtle.logPenStatus = function () {
	console.log('x=' + this.x + "; y=" + this.y + '; angle = ' + (this.angleInRadians*180/Math.PI) + '; penDown = ' + this.penDown);
};


turtle.forward = function (length) {
	// console.log('forward(' + length + ')');
	let x0 = this.x,
		y0 = this.y;
	this.x += length * Math.sin(this.angleInRadians);
	this.y += length * Math.cos(this.angleInRadians);
	if (this.ct) {
		if (this.penDown) {
			//this.logPenStatus();
			this.ct.beginPath();
			this.ct.lineWidth = this.lineWidth;
			this.ct.strokeStyle = this.penColor;
			this.ct.moveTo(x0, y0);
			this.ct.lineTo(this.x, this.y);
			this.ct.stroke();
		}
	} else {
		this.ct.moveTo(this.x, this.y);
	}
	return this;
};

turtle.arc_left = function(radius, arc) {
	let x0 = this.x,
		y0 = this.y;
	let theta0 = this.angleInRadians;
	let xc = x0 + radius*Math.cos(theta0);
	let yc = y0 - radius*Math.sin(theta0);
	let start_angle = theta0 - Math.PI;
	arc = arc * Math.PI / 180;
	let end_angle = start_angle + arc;
	
	if(arc < 0) {
		end_angle = Math.PI - theta0;
		start_angle = end_angle + arc;
	}
	
	if(this.penDown) {
		this.ct.beginPath();
		this.ct.lineWidth = this.lineWidth;
		this.ct.strokeStyle = this.penColor;
		for(let angle = start_angle ; angle <= end_angle ; angle += 0.001) {
			let x = xc + radius*Math.cos(angle);
			let y = yc - radius*Math.sin(angle);
			this.ct.lineTo(x,y);
		}
		this.ct.stroke();
	}
	
	let angle = end_angle;
	if(arc < 0) {
		angle = start_angle;
	}
	this.x = xc + radius*Math.cos(angle);
	this.y = yc - radius*Math.sin(angle);
	this.angleInRadians += arc;
	
	console.log(x0,this.x, y0, this.y, 180*angle/Math.PI);
	
	return this;
}

turtle.arc_right = function(radius, arc) {
	let x0 = this.x,
		y0 = this.y;
	let theta0 = this.angleInRadians;
	let xc = x0 - radius*Math.cos(theta0);
	let yc = y0 + radius*Math.sin(theta0);
	let start_angle = theta0;
	arc = arc * Math.PI / 180;
	let end_angle = start_angle - arc;
	
	if(arc < 0) {
		end_angle = theta0;
		start_angle = end_angle - arc;
	}
	
	if(this.penDown) {
		this.ct.beginPath();
		this.ct.lineWidth = this.lineWidth;
		this.ct.strokeStyle = this.penColor;
		for(let angle = start_angle ; angle >= end_angle ; angle -= 0.001) {
			let x = xc + radius*Math.cos(angle);
			let y = yc - radius*Math.sin(angle);
			this.ct.lineTo(x,y);
		}
		this.ct.stroke();
	}
	
	let angle = end_angle;
	if(arc < 0) {
		angle = start_angle;
	}
	this.x = xc + radius*Math.cos(angle);
	this.y = yc - radius*Math.sin(angle);
	this.angleInRadians -= arc;
	
	console.log(x0,this.x, y0, this.y, 180*angle/Math.PI);
	
	return this;
}

turtle.backward = function (length) {
	this.forward(-length);
	return this;
};

turtle.left = function (angleInDegrees) {
	// console.log('left(' + angleInDegrees + ')');
	// A complete circle, 360º, is equivalent to 2π radians  
	// angleInDegrees is an angle measure in degrees
	this.angleInRadians += angleInDegrees * Math.PI / 180.0;
	return this;
};

turtle.right = function (angleInDegrees) {
	this.left(-angleInDegrees);
	return this;
};


turtle.angle = function () {
	// the turtle status is hold in this.angleInRadians;
	// degrees are often more convenient for the display
	return this.angleInRadians * 180.0 / Math.PI;
};

turtle.change_color = function (col) {
	// console.log('change_color(' + col + ')');
	turtle.penColor = col;
}

turtle.down = function () {
	// console.log('down()');
	turtle.penDown = true;
}

turtle.up = function () {
	// console.log('up()');
	turtle.penDown = false;
}

turtle.set_pos = function (x,y) {
	// console.log('set_pos(' + x + ',' + y + ')');
	turtle.x = x;
	turtle.y = y;
}

turtle.set_line_width = function(n) {
	// console.log('set_line_width(' + n + ')');
	turtle.lineWidth = n;
}


function color_scale(n) {
    let k = Math.floor((n%(6*255))/255);
    let r = 0, g = 0, b = 0;
    if(k == 0) {
        r = 255;
        g = n%255;
    } else if(k == 1) {
        r = 255-n%255;
        g=255;
    } else if(k == 2) {
        g = 255;
        b = n%255;
    } else if(k == 3) {
        g = 255-n%255;
        b = 255;
    } else if(k == 4) {
        r = n%255;
        b = 255;
    } else {
        r = 255;
        b = 255-n%255;
    }
    let c= r*256*256+g*256+b;
    let col = "#" + c.toString(16).padStart(6,'0');
    console.log(n,r,g,b,c,col);
    return col;
}

turtle.shift_color = function(x) {
    let n = Math.floor(x*255*6);
    turtle.col = (turtle.col+n)%(255*6);
    turtle.change_color(color_scale(turtle.col));
}
