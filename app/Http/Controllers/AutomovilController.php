<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Automovil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AutomovilController extends Controller
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
            $automovil = Automovil::where('marca', 'LIKE', "%$keyword%")
                ->orWhere('modelo', 'LIKE', "%$keyword%")
                ->orWhere('anioModelo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $automovil = Automovil::latest()->paginate($perPage);
        }

        return view('automovil.index', compact('automovil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('automovil.create');
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

        $usuario= Auth::user();  
        $nuevo = new Automovil();
        $nuevo->marca = $request->marca ;
        $nuevo->modelo = $request->modelo ;
        $nuevo->anioModelo = $request->anioModelo ;
       
        $nuevo->user()->associate($usuario);
        $nuevo->save();
        return redirect()->route('automovil.index')->with('exito','El usuario ha sido agregado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $automovil = Automovil::findOrFail($id);

        return view('automovil.show', compact('automovil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $automovil = Automovil::findOrFail($id);

        return view('automovil.edit', compact('automovil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $automovil = Automovil::findOrFail($id);
        $automovil->update($requestData);

        return redirect('automovil')->with('flash_message', 'Automovil updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Automovil::destroy($id);

        return redirect('automovil')->with('flash_message', 'Automovil deleted!');
    }
}
