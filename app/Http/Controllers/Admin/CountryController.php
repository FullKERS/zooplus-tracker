<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $countries = Country::where('name', 'LIKE', "%$keyword%")
                ->orWhere('iso_code', 'LIKE', "%$keyword%")
                ->orWhere('flag_image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $countries = Country::latest()->paginate($perPage);
        }

        return view('admin/Countries.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin/Countries.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Country::create($requestData);

        return redirect('admin/countries')->with('flash_message', 'Country added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $country = Country::findOrFail($id);

        return view('admin/Countries.countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);

        return view('admin/Countries.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $country = Country::findOrFail($id);
        $country->update($requestData);

        return redirect('admin/countries')->with('flash_message', 'Country updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Country::destroy($id);

        return redirect('admin/countries')->with('flash_message', 'Country deleted!');
    }
}
