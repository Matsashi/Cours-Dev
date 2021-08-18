"use strict";


// JavaScript statements
// =====================================================================================
let wait_time = 10;
let total_time = 0;
// =====================================================================================

function forward(length) {
	setTimeout(() => {turtle.forward(length);}, total_time);
	total_time += wait_time;
}

function left(angle) {
	setTimeout(() => {turtle.left(angle);}, total_time);
	total_time += wait_time;
}

function right(angle) {
	setTimeout(() => {turtle.right(angle);}, total_time);
	total_time += wait_time;
}

function backward(angle) {
	setTimeout(() => {turtle.backward(angle);}, total_time);
	total_time += wait_time;
}

function change_color(col) {
	setTimeout(() => {turtle.change_color(col);}, total_time);
	total_time += wait_time;
}

function down() {
	setTimeout(turtle.down, total_time);
	total_time += wait_time;
}

function up() {
	setTimeout(turtle.up, total_time);
	total_time += wait_time;
}

function set_pos(x,y) {
	setTimeout(() => {turtle.set_pos(x,y);}, total_time);
	total_time += wait_time;
}

function set_line_width(n) {
	setTimeout(() => {turtle.set_line_width(n);}, total_time);
	total_time += wait_time;
}

function arc_left(radius, angle) {
	setTimeout(() => {turtle.arc_left(radius,angle);}, total_time);
	total_time += wait_time;
}

function arc_right(radius, angle) {
	setTimeout(() => {turtle.arc_right(radius,angle);}, total_time);
	total_time += wait_time;
}

function face_left() {
	setTimeout(() => {turtle.angleInRadians=-Math.PI/2;}, total_time);
	total_time += wait_time;
}

function face_right() {
	setTimeout(() => {turtle.angleInRadians=Math.PI/2;}, total_time);
	total_time += wait_time;
}

function face_up() {
	setTimeout(() => {turtle.angleInRadians=Math.PI;}, total_time);
	total_time += wait_time;
}

function face_down() {
	setTimeout(() => {turtle.angleInRadians=0;}, total_time);
	total_time += wait_time;
}

function log_pen_status() {
	setTimeout(() => {turtle.logPenStatus();},total_time);
	total_time += wait_time;
}

function shift_color(x) {
    setTimeout(() => {turtle.shift_color(x);},total_time);
    total_time += wait_time;
}
