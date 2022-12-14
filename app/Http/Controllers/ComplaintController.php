<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Complaint;

use Session;


class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        
        $complaints = Complaint::orderBy('created_at', 'DESC')->orderBy('updated_at', 'ASC')->paginate();
        
        Session::flash('redirect',$request->getQueryString());

        return view('complaints.index', compact('complaints'));
    }

    public function create()
    {
        Session::keep(['redirect']);
        return view('complaints.create');
    }
    
    
    public function store(Request $request)
    {
        // echo ('<pre>');print_r($request->all());echo ('</pre>'); exit();

        $complaint = Complaint::create( 
            $request->only([
                'type_of_violence', 'person_id', 'portal_id','user_id'
            ])
        );

        if($complaint) {
            return redirect()->route('complaints.edit', $complaint )->with('status', 'Denuncia creada de manera exitosa');
        }

        return back()->withErrors("Se produjo un error al crear el portal");
        
    }


    public function edit($id)
    {        
        Session::keep(['redirect']);
        $complaint = Complaint::findOrFail($id);
        return view('complaints.edit', compact('complaint'));
    }
    
    
    public function update(Request $request, $id)
    {
        // echo ('<pre>');print_r($request->all());echo ('</pre>'); exit();
        
        $complaint = Complaint::findOrfail($id);
        
        Session::keep(['redirect']);

        // temporal 
        $result = $complaint->update(
            $request->only([
                'type_of_violence', 'person_id', 'portal_id','user_id'
            ])
        );

        if($result) {

            return redirect()->route('complaints.edit', $complaint )->with('status', 'Denuncia editada de manera exitosa');

        } 
        return back()->withErrors("Se produjo un error al actualizar la denuncia");
    }


    public function destroy($id)
    {

        // echo ('<pre>');print_r("TO DO Update");echo ('</pre>'); exit();
        
        $complaint = Complaint::findOrFail($id);
        
        if ($result = $complaint->delete()) {

            return redirect()->route('complaints.index')->with('status', 'Denuncia eliminada de manera exitosa');

        } else {

            return back()->withErrors('La denuncia no pudo eliminarse, intente nuevamente. Si el problema persiste, por favor contacte al administrador del sistema');

        }
    }
}
