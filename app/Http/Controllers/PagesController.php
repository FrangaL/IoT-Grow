<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
		// public function index(){ return view('welcome'); }
		public function index()
		{
				$titleName = "HomePage";
				return view('pages.welcome', compact('titleName'));
		}
		public function iluminacion()
		{
				$data = array();
				$data['title'] = "Control iluminación";
				$data['titlePage'] = "Control iluminación";
				return view('pages.iluminacion')->with($data);
		}
		public function temperatura()
		{
				$data = array();
				$data['title'] = "Gráficas temperatura";
				$data['titlePage'] = "Gráficas temperatura";
				return view('pages.temperatura')->with($data);
		}
		public function reloj()
		{
				$data = array();
				$data['title'] = "Sincronizar reloj";
				$data['titlePage'] = "Sincronizar reloj";
				return view('pages.clock')->with($data);
		}
		public function portafolio()
		{
			  $data = array();
			  $data['title'] = "Control iluminación";
			  $data['titlePage'] = "Control iluminación";
			  return view('pages.portafolio')->with($data);
		}
}
