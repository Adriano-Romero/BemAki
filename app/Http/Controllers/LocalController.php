<?php

namespace App\Http\Controllers;

use App\Local;
use Illuminate\Http\Request;
use Input;
use Redirect;

use Phaza\LaravelPostgis\Eloquent\PostgisTrait;
use Phaza\LaravelPostgis\Geometries\Point;
use DB;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //"SELECT id,location, ST_X(location::geometry), ST_Y(location::geometry) from public.locals"
        $locations = DB::table('locals')->select(DB::raw('id as id, ST_X(location::geometry) as stx, 
            ST_Y(location::geometry) as sty, nome as nome, tipo as tipo, address as address'))->get();
       //$locais = Local::all();
        return view('local.index', ['locations' => $locations]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('local.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $input = $request->all();
        $local = new Local;
        $local->nome = Input::get('nome');
        $local->address = Input::get('address');
        $local->tipo = Input::get('tipo');
        $x = Input::get('longitude');
        $y = Input::get('latitude');
        $local->location = new Point(Input::get('longitude'),Input::get('latitude'));
        $local->save();

        return Redirect::to('/locals')
            ->with('message', 'Local cadastrado  com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $local = DB::table('locals')->select(DB::raw('id as id, ST_X(location::geometry) as stx, 
            ST_Y(location::geometry) as sty, nome as nome, tipo as tipo, address as address'))->where('id', '=', $id)->get();
        return view('local.show', compact('local'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function edit(Local $local)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Local $local)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function destroy(Local $local)
    {
        //
    }
}
