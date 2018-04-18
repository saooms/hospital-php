<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Species;
use App\Patient;


class SpeciesController extends Controller
{
    public function index()
    {
        $title = 'Species';
        $species = Species::all();
        return view('pages.species', compact('title'))->with('species', $species);
    }

    public function create()
    {
        $title = 'Create diersoort';

        return view('actions.CreateSpecies', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'species' => 'required'
        ]);

        Species::insert([
            'species_description' => $request->input('species'),
        ]);

        return redirect('/species')->with('success', 'species added');
    }

    public function edit($id)
    {
        $title = 'Edit species';

        $data = Species::find($id);

        return view('actions.EditSpecies', compact('title'))->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'species' => 'required'
        ]);

        Species::where(['species_id' => $id])->update([
            'species_description' => $request->input('species'),
        ]);

        return redirect('/species')->with('success', 'species updated');
    }

    public function destroy($id)
    {
        $species = Species::find($id)->delete();
        $patient = Patient::where(['species_id' => $id])->delete();        

        return redirect('/species')->with('success', 'species removed');
    }
}
