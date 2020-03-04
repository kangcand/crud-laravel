<?php

namespace App\Http\Controllers;

use App\Hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hobi = Hobi::all();
        return view('hobi.index',compact('hobi'));
    }

    public function create()
    {
        return view('hobi.create');
    }

    public function store(Request $request)
    {
        $hobi = new Hobi();
        $hobi->hobi = $request->a;
        $hobi->save();
        return redirect()->route('hobi.index')
                ->with(['message'=>'Hobi berhasil dibuat']);
    }

    public function show($id)
    {
        $hobi =  Hobi::findOrFail($id);
        return view('hobi.show',compact('hobi'));

    }


    public function edit($id)
    {
        $hobi =  Hobi::findOrFail($id);
        return view('hobi.edit',compact('hobi'));
    }

    public function update(Request $request, $id)
    {
        $hobi = Hobi::findOrFail($id);
        $hobi->hobi = $request->a;
        $hobi->save();
        return redirect()->route('hobi.index')
                ->with(['message'=>'Hobi berhasil dibuat']);
    }

    public function destroy($id)
    {
       $hobi = Hobi::findOrFail($id)->delete();
        return redirect()->route('hobi.index')
                ->with(['message'=>'Hobi berhasil dibuat']);
    }
}
