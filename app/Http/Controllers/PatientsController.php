<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Patient;
use App\Client;
use App\Species;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return\Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Patients';
        $patients = DB::table('patients')
                            ->join('species', 'patients.species_id', '=', 'species.species_id')
                            ->join('clients', 'patients.client_id', '=', 'clients.client_id')
                            ->select('patients.patient_id', 'patients.patient_name', 'patients.patient_status', 'species.species_description', 'clients.client_firstname', 'clients.client_lastname', 'gender')
                            ->get();
        return view('pages.patients', compact('title'))->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create patient';

        $PatientsData[0] = Species::pluck('species_description', 'species_id');
        $PatientsData[1] = Client::select(DB::raw("CONCAT(client_firstname, ' ', client_lastname) AS client_fullname"),'client_id')->get()->pluck('client_fullname', 'client_id');
       


        // $collection = collect([
        //     ['product_id' => 'prod-100', 'name' => 'Desk'],
        //     ['product_id' => 'prod-200', 'name' => 'Chair'],
        // ]);
        
        // $plucked[0] = $collection->pluck('product_id');
        // $plucked[1] = $collection->pluck('name');
        
        // $PatientData->all();

        return view('actions.CreatePatient', compact('title'))->with('PatientsData', $PatientsData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_Patient' => 'required',
            'species' => 'required',
            'gender' => 'required',
            'name_Client' => 'required',
            'status' => 'required'
        ]);

        Patient::insert([
            'Patient_name' => $request->input('name_Patient'),
            'species_id' => $request->input('species'),
            'client_id' => $request->input('name_Client'),
            'patient_status' => $request->input('status'),
            'gender' => $request->input('gender')
        ]);

            // return '123';   
        return redirect('/patients')->with('success', 'patient added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit client';

        $PatientsData[0] = Species::select('species_description', 'species_id')->get()->pluck('species_description', 'species_id');
        $PatientsData[1] = Client::select(DB::raw("CONCAT(client_firstname, ' ', client_lastname) AS client_fullname"),'client_id')->get()->pluck('client_fullname', 'client_id');
        $PatientsData[2] = Patient::find($id);

        return view('actions.EditPatient', compact('title'))->with('PatientsData', $PatientsData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_Patient' => 'required',
            'species' => 'required',
            'gender' => 'required',
            'name_Client' => 'required',
            'status' => 'required'
        ]);

        Patient::where(['patient_id' => $id])->update([
            'Patient_name' => $request->input('name_Patient'),
            'species_id' => $request->input('species'),
            'client_id' => $request->input('name_Client'),
            'patient_status' => $request->input('status'),
            'gender' => $request->input('gender')
        ]);

        return redirect('/patients')->with('success', 'patient updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::find($id)->delete();

        return redirect('/patients')->with('success', 'patient removed');
    }
}
