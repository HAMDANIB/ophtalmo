<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\wilayas;
use Illuminate\Http\Request;
use Exception;

class WilayasController extends Controller
{

    /**
     * Display a listing of the wilayas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $wilayasObjects = wilayas::paginate(25);

        return view('wilayas.index', compact('wilayasObjects'));
    }

    /**
     * Show the form for creating a new wilayas.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('wilayas.create');
    }

    /**
     * Store a new wilayas in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            wilayas::create($data);

            return redirect()->route('wilayas.wilayas.index')
                ->with('success_message', 'Wilayas was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified wilayas.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $wilayas = wilayas::findOrFail($id);

        return view('wilayas.show', compact('wilayas'));
    }

    /**
     * Show the form for editing the specified wilayas.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $wilayas = wilayas::findOrFail($id);
        

        return view('wilayas.edit', compact('wilayas'));
    }

    /**
     * Update the specified wilayas in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $wilayas = wilayas::findOrFail($id);
            $wilayas->update($data);

            return redirect()->route('wilayas.wilayas.index')
                ->with('success_message', 'Wilayas was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified wilayas from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $wilayas = wilayas::findOrFail($id);
            $wilayas->delete();

            return redirect()->route('wilayas.wilayas.index')
                ->with('success_message', 'Wilayas was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'code_wilaya' => 'required|numeric|min:-2147483648|max:2147483647',
            'nom_wilaya' => 'required|string|min:1|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
