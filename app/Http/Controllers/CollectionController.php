<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Property;
use App\Contact;
use App\Account;
use App\Http\Requests;

class CollectionController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('collections.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$company = Auth::user()->company;
		$properties = Property::where('company_id',$company->id )->lists('nro','id')->all();
		$accounts = Account::where('company_id',$company->id )->lists('nombre','id')->all();
        return view('collections.create')
		->with('properties',$properties)
		->with('accounts',$accounts);
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
			'propiedad' => 'required|not_in:0',
			'contacto' => 'required|not_in:0',
			'cuotas' => 'required',
			'fecha' => 'required',
			'concepto' => 'required',
            'cuenta' => 'required|not_in:0',
			'forma_pago' => 'required',
        ]);
		
		
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('collections.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
