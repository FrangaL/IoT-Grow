<?php

function active($path)
{
    return request()->is($path) ? 'active' : '';
}

function btnact($gpio)
{
    //$pinStatus = shell_exec('cat /tmp/gpio.txt');
    //$pinStatus = shell_exec('gpio -g read $gpio');

    $pinStatus = 0 ;
    if ($pinStatus == 1) {
        echo  'checked data-checked="true"';
    } else {
        echo 'data-checked="false"';
    }
}

// function rtc_get_date()
// {
//     $date = shell_exec("sudo ds1302_get_utc");
//     $rtc_time = substr($date, 0, 4) . "-" . substr($date, 5, 2) . "-" . substr($date, 8, 2) . " " . substr($date, 11, 2) . ":" . substr($date, 14, 2) . ":" . substr($date, 17, 2);
//     return $rtc_time;
// }

function rtc_get_date()
{
	$pid_rtc = pid_open("/dev/rtc0");
	$date = pid_ioctl($pid_rtc, "get date");
	pid_close($pid_rtc);

	$rtc_time = substr($date, 0, 4) . "-" . substr($date, 4, 2) . "-" . substr($date, 6, 2) . " " . substr($date, 8, 2) . ":" . substr($date, 10, 2) . ":" . substr($date, 12, 2);
	return $rtc_time;
}
