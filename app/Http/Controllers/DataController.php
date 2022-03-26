<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
	protected $rules = [
		'name' => 'required',
		'dni' => 'required'
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
		$val = $r->validate($this->rules);
		Data::create($val); 

		return Data::all();;
	}

	public function update(Request $r)
	{
		$val = $r->validate($this->rules);
		Data::find($r->id)->update($val);

		return Data::all();
	}

	public function delete(Request $r)
	{
		Data::find($r->id)->delete();
		return Data::all();
	}
}
