<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function changemode(Request $request)
    {
        $cmode = $request->input('cmode');
        $dir = public_path('relay/');
        if ($cmode=='1') {
            shell_exec("echo 1 > $dir'mode'");
        } elseif ($cmode=='0') {
            shell_exec("echo 0 > $dir'mode'");
        }
        $success = 'true';
        return response()->json(array('success'=>$success));
    }

    public function showhour(Request $request)
    {
        $onhour = file_get_contents(public_path(). '/relay/horaon');
        $offhour = file_get_contents(public_path(). '/relay/horaoff');
        $success = 'Horario de encendido ' . $onhour . "</br>" . ' Horario de apagado ' . $offhour;
        return response()->json(array('success'=>$success));
    }

    public function ajaxRequestPostBtn($id, Request $request)
    {
        $mode = $request->input('mode');
        $relay = str_replace('toggle', '', $id);
        if ($mode=='true') {
            $message='La iluminación del sector ' . $relay . ' Encendida!!';
            $success='Enabled';
            shell_exec("raspi-gpio set $relay a0 pu");
        } elseif ($mode=='false') {
            $message='La iluminación del sector ' . $relay . ' Apagada!!';
            $success='Disabled';
            shell_exec("raspi-gpio set $relay ip pd");
        }
        return response()->json(array('message'=>$message,'$success'=>$success));
    }

    public function programareloj(Request $request)
    {
        $dir = public_path('relay/');
        $select = $request->input('zone0');
        $on = $request->input('encendido');
        $off = $request->input('apagado');

        if ($select=='on') {
            shell_exec("echo $on > $dir'horaon'");
            shell_exec("echo $off > $dir'horaoff'");
            shell_exec("echo 1 > $dir'selectall'");
            shell_exec("echo 0 > $dir'sector1'");
        } elseif ($select=='Sector+1') {
            shell_exec("echo 0 > $dir'selectall'");
            shell_exec("echo 1 > $dir'sector1'");
        }

        $success = 'Horario de encendido ' . $on . "</br>" . ' Horario de apagado ' . $off;
        $message = 'Programación guardada!!';
        return response()->json(array('message'=>$message,'success'=>$success));
    }
}
