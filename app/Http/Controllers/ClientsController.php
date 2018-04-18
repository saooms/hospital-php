<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Client;
use App\Patient;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Clients';
        $clients = Client::all();
        return view('pages.clients', compact('title'))->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create client';

        return view('actions.CreateClient', compact('title'));
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
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        client::insert([
            'client_firstname' => $request->input('firstname'),
            'client_lastname' => $request->input('lastname'),
            'client_phone' => $request->input('phone'),
            'client_email' => $request->input('email'),
        ]);

        return redirect('/clients')->with('success', 'client added');
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

        $data = Client::find($id);

        return view('actions.EditClient', compact('title'))->with('data', $data);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        Client::where(['client_id' => $id])->update([
            'client_firstname' => $request->input('firstname'),
            'client_lastname' => $request->input('lastname'),
            'client_phone' => $request->input('phone'),
            'client_email' => $request->input('email'),
        ]);

        return redirect('/clients')->with('success', 'client updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::where(['client_id' => $id])->delete();
        client::find($id)->delete();
        
        return redirect('/clients')->with('success', 'client removed');
    }
}
