<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Portal;

use Session;


class PortalController extends Controller
{
    public function index(Request $request)
    {
        $portals = Portal::orderBy('name', 'ASC')->orderBy('updated_at', 'ASC')->paginate();
        
        Session::flash('redirect',$request->getQueryString());

        return view('portals.index', compact('portals'));
    }


    public function create()
    {
        Session::keep(['redirect']);
        return view('portals.create');
    }


    public function store(Request $request)
    {

        $portal = Portal::create( 
            $request->only(['name', 'description'])
        );

        if($portal) {
            return redirect()->route('portals.edit', $portal )->with('status', 'Portal creado de manera exitosa');
        }

        return back()->withErrors("Se produjo un error al crear el portal");
        
    }


    public function edit($id)
    {
        Session::keep(['redirect']);
        $portal = Portal::findOrFail($id);
        return view('portals.edit', compact('portal'));
    }


    public function update(Request $request, $id)
    {
        
        $portal = Portal::findOrfail($id);
        
        Session::keep(['redirect']);

        $result = $portal->update(
            $request->only([
                'name', 'slug', 'description','state'
            ])
        );

        if($result) {

            return redirect()->route('portals.edit', $portal )->with('status', 'Portal editado de manera exitosa');

        } 
        return back()->withErrors("Se produjo un error al actualizar el portal");
    }


    public function destroy($id)
    {

        $portal = Portal::findOrFail($id);
        
        if ($result = $portal->delete()) {

            return redirect()->route('portals.index')->with('status', 'Portal fue eliminado de manera exitosa');

        } else {

            return back()->withErrors('El portal no pudo eliminarse');

        }
    }

}
