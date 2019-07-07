<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests\UploadPhotoRequest;
use App\Tenant;
use App\Zone;
use App\Category;

class TenantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $floors = Tenant::pluck('floor', 'id') -> unique();

        $tenants = Tenant::when($request->query('shopName'), function($query) use ($request) {
            return $query->where('shopName', 'like', "%".$request->query('shopName')."%");
        })
        ->when($request->query('lotNo'), function($query) use ($request) {
            return $query->where('lotNo', 'like', "%".$request->query('lotNo')."%");
        })
        ->when($request->query('floor'), function($query) use ($request) {
            return $query->where('floor', $request->query('floor'));
        })
        ->when($request->query('zone_id'), function($query) use ($request) {
            return $query->where('zone_id', $request->query('zone_id'));
        })
        ->when($request->query('category_id'), function($query) use ($request) {
            return $query->where('category_id', $request->query('category_id'));
        })
        ->get();
        
        return view('tenants.index', [
            'tenants' => $tenants,
            'floors' => $floors,
            'request' => $request,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tenant = new Tenant();

        return view('tenants.create', [
            'tenant' => $tenant,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UploadPhotoRequest $requestPhoto)
    {
        $tenant = new Tenant;
        
        $zone = Zone::find('zone_id');
        $tenant -> zone() -> associate($zone);
    
        $category = Category::find('category_id');
        $tenant -> category() -> associate($category);

        $tenant->fill($request->all());
        $tenant->save();
        
        $file = $requestPhoto->file('image');
        $path = $file->storeAs('public/tenants', $tenant -> lotNo.'.jpg');

        return redirect()->route('tenant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenant = Tenant::find($id);
        if(!$tenant) 
            throw new ModelNotFoundException;
        return view('tenants.show', [
            'tenant' => $tenant
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenant = Tenant::find($id);
        if(!$tenant) 
            throw new ModelNotFoundException;
        return view('tenants.edit', [
            'tenant' => $tenant
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadPhotoRequest $requestPhoto, $id)
    {
        $tenant = Tenant::find($id);
        if(!$tenant)
            throw new ModelNotFoundException;

        $zone = Zone::find('zone_id');
        $tenant -> zone() -> associate($zone);
    
        $category = Category::find('category_id');
        $tenant -> category() -> associate($category);

        $tenant -> fill($request->all());
        $tenant -> save();
        
        $file = $requestPhoto->file('image');
        $path = $file->storeAs('public/tenants', $tenant -> lotNo.'.jpg');

        return redirect() -> route('tenant.index');
    }
}
