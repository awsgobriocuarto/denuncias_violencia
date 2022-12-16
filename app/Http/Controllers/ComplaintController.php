<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Complaint;
use App\Portal;
use Illuminate\Support\Facades\Auth;
use Session;


class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        
        $complaints = Complaint::orderBy('created_at', 'DESC')->orderBy('updated_at', 'DESC');

        #Listar portales vinculados al usuario segun rol
        if ( (!auth()->user()->isWebMaster()) && (!auth()->user()->isAdmin()) ) {

            $complaints = $complaints->where('portal_id', auth()->user()->portal_id );

        } 
        
        $complaints = $complaints->paginate();
        
        Session::flash('redirect',$request->getQueryString());

        return view('complaints.index', compact('complaints'));
    }

    public function create()
    {
        Session::keep(['redirect']);
        
        if ( (auth()->user()->isWebMaster()) || (auth()->user()->isAdmin()) ) {
            $portals = Portal::get();
        } else {
            $portals = Portal::where('id', auth()->user()->portal_id )->get();
        }
        
        return view('complaints.create', compact('portals'));
    }
    
    
    public function store(Request $request)
    {
        // echo ('<pre>');print_r($request->all());echo ('</pre>'); exit();

        $array_data = $request->only([
            'type_of_violence', 'person_id', 'portal_id'
        ]);

        $array_data['user_id'] = auth()->user()->id;

        $complaint = Complaint::create($array_data);

        if($complaint) {
            return redirect()->route('complaints.edit', $complaint )->with('status', 'Denuncia creada de manera exitosa');
        }

        return back()->withErrors("Se produjo un error al crear el portal");
        
    }


    public function edit(Complaint $complaint)
    {        
        Session::keep(['redirect']);

        if ( (auth()->user()->isWebMaster()) || (auth()->user()->isAdmin()) ) {
            $portals = Portal::get();
        } else {
            $portals = Portal::where('id', auth()->user()->portal_id )->get();
        }
        return view('complaints.edit', compact('complaint', 'portals'));
    }
    
    
    public function update(Request $request, Complaint $complaint)
    {
        // echo ('<pre>');print_r($request->all());echo ('</pre>'); exit();
                
        Session::keep(['redirect']);

        // temporal 
        $result = $complaint->update(
            $request->only([
                'type_of_violence', 'person_id', 'portal_id'
            ])
        );

        if($result) {

            return redirect()->route('complaints.edit', $complaint )->with('status', 'Denuncia editada de manera exitosa');

        } 
        return back()->withErrors("Se produjo un error al actualizar la denuncia");
    }


    public function destroy(Complaint $complaint)
    {

        // echo ('<pre>');print_r("TO DO Update");echo ('</pre>'); exit();
                
        if ($result = $complaint->delete()) {

            return redirect()->route('complaints.index')->with('status', 'Denuncia eliminada de manera exitosa');

        } else {

            return back()->withErrors('La denuncia no pudo eliminarse, intente nuevamente. Si el problema persiste, por favor contacte al administrador del sistema');

        }
    }
}
