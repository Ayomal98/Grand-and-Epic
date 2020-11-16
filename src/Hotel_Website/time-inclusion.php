<?php

function getBreakfastTime($default = '08:00', $interval = '+30 minutes')
{

    $output = '';

    $current = strtotime('08:00');
    $end = strtotime('10:29');

    while ($current <= $end) {
        $time = date('H:i', $current);
        $sel = ($time == $default) ? ' selected' : '';

        $output .= "<option value=\"{$time}\"{$sel}>" . date('h.i A', $current) . '</option>';
        $current = strtotime($interval, $current);
    }

    return $output;
}

function getLunchTime($def = '12:00', $int = '+30 minutes')
{

    $out = '';

    $curtime = strtotime('12:00');
    $endtime = strtotime('14:29');

    while ($curtime <= $endtime) {
        $time = date('H:i', $curtime);
        $sel = ($time == $def) ? ' selected' : '';

        $out .= "<option value=\"{$time}\"{$sel}>" . date('h.i A', $curtime) . '</option>';
        $curtime = strtotime($int, $curtime);
    }

    return $out;
}
function getDinnerTime($default = '19:30', $interval = '+30 minutes')
{

    $output = '';

    $current = strtotime('19:30');
    $end = strtotime('21:59');

    while ($current <= $end) {
        $time = date('H:i', $current);
        $sel = ($time == $default) ? ' selected' : '';

        $output .= "<option value=\"{$time}\"{$sel}>" . date('h.i A', $current) . '</option>';
        $current = strtotime($interval, $current);
    }

    return $output;
}
