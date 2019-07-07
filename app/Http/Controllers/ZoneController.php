<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone;

class ZoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $zones = Zone::get();

        return view('zones.index', [
            'zones' => $zones,
        ]);
    }

    public function create()
    {
        $zone = new Zone();

        return view('zones.create', [
            'zone' => $zone,
        ]);
    }

    public function store(Request $request)
    {
        $zone = new Zone;
        $zone->fill($request->all());
        $zone->save();
        return redirect()->route('zone.index');
    }

    public function show($id)
    {
        $zone = Zone::find($id);
        if(!$zone) 
            throw new ModelNotFoundException;
        return view('zones.show', [
            'zone' => $zone
            ]);
    }

    public function edit($id)
    {
        $zone = Zone::find($id);
        if(!$zone) 
            throw new ModelNotFoundException;
        return view('zones.edit', [
            'zone' => $zone
            ]);
    }

    public function update(Request $request, $id)
    {
        $zone = Zone::find($id);
        if(!$zone)
            throw new ModelNotFoundException;

        $zone -> fill($request->all());

        $zone -> save();

        return redirect() -> route('zone.index');
    }
}