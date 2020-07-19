function get_time(timestamp, is_raw) {
  var now;
  if (timestamp != null)
    now = new Date(timestamp);
  else
    now = new Date();

  var year = now.getFullYear();

  var month = now.getMonth() + 1;
  if (month < 10)
    month = "0" + month;

  var day = now.getDate();
  if (day < 10)
    day = "0" + day;

  var h = now.getHours();
  if (h < 10)
    h = "0" + h;

  var m = now.getMinutes();
  if (m < 10)
    m = "0" + m;

  var s = now.getSeconds();
  if (s < 10)
    s = "0" + s;

  if (is_raw)
    return year.toString() + month.toString() + day.toString() + h.toString() + m.toString() + s.toString();

  return year + '-' + month + '-' + day + " " + h + ':' + m + ':' + s;
}

function get_current_time(is_raw) {
  return get_time(null, is_raw);
}

function time_sync() {
  //var host_time = get_current_time(true);
  var today = new Date();
  var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  var host_time = date + ' ' + time;
  //phpoc_setup.host_time_txt.value = host_time;
  //phpoc_setup.host_time_txt.value = host_time;
  phpoc_setup.host_time_txt.value = host_time;
  phpoc_setup.submit();
}

function draw_hand(ctx, pos, length, width) {
  ctx.save();
  ctx.beginPath();
  ctx.lineWidth = width;
  ctx.lineCap = "round";
  ctx.rotate(pos);
  ctx.moveTo(0, length / 4);
  ctx.lineTo(0, -length);
  ctx.stroke();
  ctx.rotate(-pos);
  ctx.restore();
}

function draw_clock(ctx, timestamp) {
  var radius = ctx.canvas.clientHeight * 0.5;
  var date_time = (timestamp != null) ? new Date(timestamp) : new Date();
  var hour = date_time.getHours();
  var minute = date_time.getMinutes();
  var second = date_time.getSeconds();

  // Draw clock's face
  ctx.clearRect(-radius, -radius, 2 * radius, 2 * radius);
  ctx.beginPath();
  ctx.arc(0, 0, radius * 0.8, 0, 2 * Math.PI);
  ctx.save();
  ctx.fillStyle = '#ffffff';
  ctx.fill();

  ctx.restore();
  ctx.lineWidth = radius * 0.07;
  ctx.stroke();

  // Hour marks
  ctx.lineWidth = radius * 0.02;
  ctx.lineCap = "round";
  ctx.save();
  for (var i = 0; i < 12; i++) {
    ctx.beginPath();
    ctx.rotate(Math.PI / 6);
    ctx.moveTo(radius * 0.74, 0);
    ctx.lineTo(radius * 0.68, 0);
    ctx.stroke();
  }
  ctx.restore();

  // Minute marks
  ctx.save();
  ctx.lineWidth = radius * 0.01;
  for (i = 0; i < 60; i++) {
    if (i % 5 != 0) {
      ctx.beginPath();
      ctx.moveTo(radius * 0.74, 0);
      ctx.lineTo(radius * 0.71, 0);
      ctx.stroke();
    }
    ctx.rotate(Math.PI / 30);
  }
  ctx.restore();


  // Draw number
  ctx.font = radius * 0.15 + "px arial";
  ctx.textBaseline = "middle";
  ctx.textAlign = "center";

  ctx.save();
  for (var num = 1; num < 13; num++) {
    var ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius * 0.57);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius * 0.57);
    ctx.rotate(-ang);
  }
  ctx.restore();

  ctx.save();
  ctx.strokeStyle = '#2c3e50';

  // Draw time
  hour = hour % 12;
  hour = (hour * Math.PI / 6) + (minute * Math.PI / (6 * 60)) + (second * Math.PI / (360 * 60));
  draw_hand(ctx, hour, radius * 0.32, radius * 0.03);

  minute = (minute * Math.PI / 30) + (second * Math.PI / (30 * 60));
  draw_hand(ctx, minute, radius * 0.45, radius * 0.02);

  ctx.strokeStyle = '#c0392b';
  second = (second * Math.PI / 30);
  draw_hand(ctx, second, radius * 0.58, radius * 0.01);

  ctx.fillStyle = '#2c3e50';
  ctx.beginPath();
  ctx.arc(0, 0, radius * 0.04, 0, 2 * Math.PI);
  ctx.fill();

  ctx.restore();


  ctx.font = radius * 0.1 + "px arial";
  ctx.fillText(get_time(timestamp), 0, radius * 0.95);
  ctx.fillText(ctx.title, 0, -radius * 0.95);
}

function init_clock(id, size, color, title) {
  var canvas = document.getElementById(id);
  canvas.width = size;
  canvas.height = size;
  ctx = canvas.getContext("2d");
  ctx.translate(size * 0.5, size * 0.5);
  ctx.strokeStyle = color;
  ctx.fillStyle = color;
  ctx.title = title;
  return ctx;
}

function init() {
  //var rtc_time = '<?php echo rtc_get_date() ?>';
  var cur_time = get_current_time();

  //var sync_time_el = document.getElementById('sync_time');

  var offset = new Date().getTimezoneOffset();
  var offset_hrs = parseInt(Math.abs(offset / 60));
  var offset_min = Math.abs(offset % 60);
  var timezone;

  if (offset_hrs < 10)
    offset_hrs = '0' + offset_hrs;

  if (offset_min < 10)
    offset_min = '0' + offset_min;

  timezone = ((offset <= 0) ? '+' : '-') + offset_hrs + ':' + offset_min;

  var utc_timestamp = Date.parse(rtc_time.replace(' ', 'T') + timezone);

  //sync_time_el.innerText = cur_time;

  var rtc_ctx = init_clock("rtc_clock", 300, '#2980b9', "RTC Time");
  var local_ctx = init_clock("local_clock", 300, '#16a085', "Local Time");

  draw_clock(rtc_ctx, utc_timestamp);
  draw_clock(local_ctx);

  setInterval(function() {
    utc_timestamp += 1000;
    draw_clock(rtc_ctx, utc_timestamp);
    draw_clock(local_ctx);
  }, 1000);
}

init();
