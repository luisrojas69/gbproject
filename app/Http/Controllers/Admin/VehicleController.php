<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehicle;
use Illuminate\Validation\Rule;

class VehicleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['can:vehicles.index'])->only('index');
        $this->middleware(['can:vehicles.create'])->only(['create', 'store']);
        $this->middleware(['can:vehicles.edit'])->only(['edit', 'update']);
        $this->middleware(['can:vehicles.destroy'])->only('destroy');
        $this->middleware(['can:vehicles.show'])->only('show');
    }


	public function index(){
		$vehicles = Vehicle::orderBy('id', 'DESC')->get();
    	return view('pages.admin.vehicles.index', compact('vehicles'));
    }

    public function create(){
    	return view('pages.admin.vehicles.create', [
            'vehicle' => new Vehicle
        ]);
    }

    public function reports()
    {
    	return "Hola desde la Pagina de Reportes";
    }

    public function store(Request $request)
    {	
    	$this->validate($request, [
    		'plate' => 'required | min:6 | unique:vehicles',
    		'color' => 'required | min:3 ',
    		'mark' =>  'required | min:3 ',
    		'model' => 'required | min:3 '
    	]);

        $vehicle = new Vehicle;
        $vehicle->plate     = strtoupper($request->plate);
        $vehicle->color     = strtoupper($request->color);
        $vehicle->mark      = strtoupper($request->mark);
        $vehicle->model     = strtoupper($request->model);
        $vehicle->comment   = $request->comment;

    	$vehicle->save();

    	return redirect()->back()->with('success', 'El vehiculo ha sido registrado');
    }


    public function edit(Vehicle $vehicle){
        
        return view('pages.admin.vehicles.edit', compact('vehicle'));
    }


    public function update(Request $request, Vehicle $vehicle){

        $this->validate($request, [
            'plate' => ['required', Rule::unique('vehicles')->ignore($vehicle->id)],
            'color' => 'required | min:3 ',
            'mark' =>  'required | min:3 ',
            'model' => 'required | min:3 '
        ]);

        $vehicle->plate     = strtoupper($request->plate);
        $vehicle->color     = strtoupper($request->color);
        $vehicle->mark      = strtoupper($request->mark);
        $vehicle->model     = strtoupper($request->model);
        $vehicle->comment   = $request->comment;


        $vehicle->save();

        return redirect()->back()->with('success', 'Vehiculo Editado correctamente');
    }


    public function destroy(Vehicle $vehicle){
        
        $vehicle->delete();

        return redirect()->back()->with('success', 'El vehiculo ha sido eliminado');
    
    }


}
