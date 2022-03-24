<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
	protected $rules = [
		'name' => 'required',
		'dni' => 'required|min:3'
	];

	public function index()
	{
		return view('index');
	}

	public function get()
	{
		return Data::all();
	}

	public function store(Request $r)
	{
		$val = $r->validate($rules);
		return Data::create($val); 
	}

	public function update(Request $r)
	{
		$val = $r->validate($rules);
		return Data::find($r->id)->update($val);
	}

	public function destroy(Request $r)
	{
		return Data::find($r->id)->delete();
	}
}
