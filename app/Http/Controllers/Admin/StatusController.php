<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
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
            $statuses = Status::where('status_name', 'LIKE', "%$keyword%")
                ->orWhere('status_description', 'LIKE', "%$keyword%")
                ->orWhere('order', 'LIKE', "%$keyword%")
                ->orWhere('active', 'LIKE', "%$keyword%")
                ->orderBy('order', 'asc')->paginate($perPage);
        } else {
            $statuses = Status::orderBy('order', 'asc')->paginate($perPage);
        }

        return view('adminStatuses.statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('adminStatuses.statuses.create');
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
        
        Status::create($requestData);

        return redirect('admin/statuses')->with('flash_message', 'Status added!');
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
        $status = Status::findOrFail($id);

        return view('adminStatuses.statuses.show', compact('status'));
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
        $status = Status::findOrFail($id);

        return view('adminStatuses.statuses.edit', compact('status'));
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
        
        $status = Status::findOrFail($id);
        $status->update($requestData);

        return redirect('admin/statuses')->with('flash_message', 'Status updated!');
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
        Status::destroy($id);

        return redirect('admin/statuses')->with('flash_message', 'Status deleted!');
    }
}
