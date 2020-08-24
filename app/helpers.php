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

function rtc_get_date()
{
        $date = shell_exec("date +'%Y-%m-%d %H:%M:%S'");
        $rtc_time = substr($date, 0, 4) . "-" . substr($date, 5, 2) . "-" . substr($date, 8, 2) . " " . substr($date, 11, 2) . ":" . substr($date, 14, 2) . ":" . substr($date, 17, 2);
        return $rtc_time;
}
