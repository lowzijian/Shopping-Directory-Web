<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone;
use App\Category;
use App\Tenant;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('FrontEnds.index');
    }

    public function navigation()
    {
        return view('FrontEnds.navigation');
    }

    public function categories()
    {
        return view('FrontEnds.categories');
    }

    // Search by categories
    public function categoryDetail(Request $request, $categoryName, $id)
    {
        $header = "Category";
        $selectedCategory = Category::where('name', $categoryName) -> first();
        $tenants = Tenant::where('category_id', $selectedCategory->id) -> get();

        
        $selectedTenant = $tenants -> find($id);
        if($selectedTenant == null) {
            $selectedTenant = $tenants -> first();

            if($selectedTenant != null)
                $id = $selectedTenant ->id;
        }

        // searching the relevenat record and remove it from the list
        foreach($tenants as $i => $currentTenant)
        {
            if($currentTenant == $selectedTenant)
            {
                $tenants ->pull($i);
                break;
            }
        }
        
        // add back the relevant record to the top of the list
        $tenants ->prepend($selectedTenant);

        return view('FrontEnds.detail', [
            'header' => $header,
            'headerValue' => $selectedCategory->name,
            'id' => $id,
            'tenants' => $tenants,
            'filterName' => "categories.detail",
            'categoryName' => $selectedCategory->name,
            'floorId' => "",
            'selectedTenant' => $selectedTenant,
            'previousPage'=> 'frontend.categories'
        ]);
    }

    // Search All
    public function viewTenants(Request $request, $id)
    {
        /*
         * check latest value first, then followed by old value
         */
        // shop name
        $shopName = $request->query('shopName');
        if($shopName == null)
        {
            if($request->session()->has('shopName'))
                $shopName = $request->session()->get('shopName');
        }
        else
            $request->session()->put('shopName', $shopName);

        // zone id
        $zone_id = $request->query('zone-id');
        if($zone_id == null)
        {
            if($request->session()->has('zone-id'))
                $zone_id = $request->session()->get('zone-id');
        }
        else
            $request->session()->put('zone-id', $zone_id);

        // tenant floor
        $tenant_floor = $request->query('tenant-floor');
        if($tenant_floor == null)
        {
            if($request->session()->has('tenant-floor'))
                $tenant_floor = $request->session()->get('tenant-floor');
        }
        else
            $request->session()->put('tenant-floor', $tenant_floor);

        // category id
        $category_id = $request->query('category-id');
        if($category_id == null)
        {
            if($request->session()->has('category-id'))
                $category_id = $request->session()->get('category-id');
        }
        else
            $request->session()->put('category-id', $category_id);
        

        //filtering
        $tenants = Tenant::when($shopName, function($query) use ($shopName) {
            return $query->where('shopName', 'like', $shopName."%");
        })
        ->when($zone_id, function($query) use ($zone_id) {
            return $query->where('zone_id', $zone_id);
        })
        ->when($tenant_floor, function($query) use ($tenant_floor) {
            return $query->where('floor', $tenant_floor);
        })
        ->when($category_id, function($query) use ($category_id) {
            return $query->where('category_id', $category_id);
        })->get();

        // to get the error message
        $message = $_GET['errorMessage'];

        $selectedTenant = $tenants->find($id);
        if($selectedTenant == null) {
            $selectedTenant = $tenants -> first();

            if($selectedTenant != null)
                $id = $selectedTenant ->id;
            else
            {
                // clear all sessions
                $request ->session() ->forget('shopName');
                $request ->session() ->forget('zone-id');
                $request ->session() ->forget('tenant-floor');
                $request ->session() ->forget('category-id');

                // refresh the page
                return redirect() -> route('frontend.searchAll', [$id, 'errorMessage' => 'Record not found!!!']);
            }
        }

        // searching the relevenat record and remove it from the list
        foreach($tenants as $i => $currentTenant)
        {
            if($currentTenant == $selectedTenant)
            {
                $tenants ->pull($i);
                break;
            }
        }
        
        // add back the relevant record to the top of the list
        $tenants ->prepend($selectedTenant);

        return view('FrontEnds.detail', [
            'header' => "",
            'headerValue' => "",
            'id' => $id,
            'tenants' => $tenants,
            'filterName' => "searchAll",
            'categoryName' => "",
            'floorId' => "",
            'selectedTenant' => $selectedTenant,
            'request' => $request,
            'previousPage'=>'frontend.navigation',
            //pass values to the filtering form
            'shopName' => $shopName, 
            'zoneId' => $zone_id, 
            'tenantFloor' => $tenant_floor, 
            'categoryId' => $category_id,
            'errorMessage' => $message,
        ]);
    }

    public function clearSession(Request $request, $previousPage)
    {
        // clear all sessions
        $request ->session() ->forget('shopName');
        $request ->session() ->forget('zone-id');
        $request ->session() ->forget('tenant-floor');
        $request ->session() ->forget('category-id');

        return redirect() -> route($previousPage);
    }

    // View Map
    public function mapView($id)
    {
        $tenants = Tenant::where("floor", $id) -> get();
        return view('FrontEnds.mapView',[
            "tenants" => $tenants,
        ]);
    }

    public function zoneDetail(Request $request, $floorId, $id)
    {
        $header = "Floor";
        $tenants = Tenant::where('floor', $floorId) -> get();

        $selectedTenant = $tenants -> find($id);
        if($selectedTenant == null) {
            $selectedTenant = $tenants -> first();

            if($selectedTenant != null)
                $id = $selectedTenant ->id;
        }

        // searching the relevenat record and remove it from the list
        foreach($tenants as $i => $currentTenant)
        {
            if($currentTenant == $selectedTenant)
            {
                $tenants ->pull($i);
                break;
            }
        }
        
        // add back the relevant record to the top of the list
        $tenants ->prepend($selectedTenant);

        return view('FrontEnds.detail', [
            'header' => $header,
            'headerValue' => $floorId,
            'id' => $id,
            'tenants' => $tenants,
            'filterName' => "mapView.detail",
            'categoryName' => "",
            'floorId' => $floorId,
            'selectedTenant' => $selectedTenant,
            'previousPage'=>"",
        ]);
    }
}
