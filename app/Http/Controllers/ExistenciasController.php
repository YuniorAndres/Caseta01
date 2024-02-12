<?php

namespace App\Http\Controllers;
use App\Models\Existencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExistenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos ['Existencias']=Existencias::paginate(5);
        return view('tienda.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("tienda.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validacion
        $campos=[

            'Foto'=>'required|File|max:1000|mimes:jpeg,jpg,png',
            'Nombre_Producto'=>'required|string|max:100',
            'Cantidad'=>'required|string|max:100',
            'Valor_Total'=>'required|string|max:100',
            'Fecha_Ingreso'=>'required|string|max:100',
            'Fecha_vencimiento'=>'required|string|max:100',
            'Ventas_Dia'=>'required|string|max:100',
            'Ventas_Semana'=>'required|string|max:100',
            'Ventas_Mes'=>'required|string|max:100',
            'venta_Anual'=>'required|string|max:100',

        ];
        $mensaje=[
            'Nombre_Producto.required'=>'El : Nombre_Producto es requerido',
            'Cantidad.required'=>'El : Cantidad es requerido',
            'Valor_Total.required'=>'El : Valor_Total es requerido',
            'Fecha_Ingreso.required'=>'El : Fecha_Ingreso es requerido',
            'Fecha_vencimiento.required'=>'El : Fecha_vencimiento es requerido',
            'Ventas_Dia.required'=>'El : Ventas_Dia es requerido',
            'Ventas_Semana.required'=>'El : Ventas_Semana es requerido',
            'Ventas_Mes.required'=>'El : Ventas_Mes es requerido',
            'venta_Anual.required'=>'El : venta_Anual es requerido',
            'Foto.required'=>'La foto es necesaria'
        ];

        $this->validate($request, $campos, $mensaje);

        $Existencias=request()->except('_token');
        if($request->hasFile('Foto')){
            $existencias['Foto'] =$request->file('Foto')->store('uploads', 'public');
        }
        Existencias::insert($Existencias);
        //return response()->json($Existencias);
        return redirect('tienda')->with('mensaje', 'Producto Agregado Con EXITO');
    }

    /**
     * Display the specified resource.
     */
    public function show(Existencias $existencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $Existencias=Existencias::findOrFail($id);
        return view ('tienda.edit', compact('Existencias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[

            
            'Nombre_Producto'=>'required|string|max:100',
            'Cantidad'=>'required|string|max:100',
            'Valor_Total'=>'required|string|max:100',
            'Fecha_Ingreso'=>'required|string|max:100',
            'Fecha_vencimiento'=>'required|string|max:100',
            'Ventas_Dia'=>'required|string|max:100',
            'Ventas_Semana'=>'required|string|max:100',
            'Ventas_Mes'=>'required|string|max:100',
            'venta_Anual'=>'required|string|max:100',
        ];
        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|File|max:1000|mimes:jpeg,jpg,png'];
            $mensaje=['Foto.required'=>'la Foto Es Necesaria'];
        }



        $Existencias= request()->except(['_token', '_method']);
        if($request->hasFile('Foto')){
             $existencias=Existencias::findOrFail($id);
             Storage::delete('public/'.$existencias->Foto);

             $existencias['Foto']=$request->file('Foto')->store('uploads', 'public');
        }
        Existencias::where('id','=',$id)->update($Existencias);
        $Existencias=Existencias::findOrFail($id);
        return view('tienda.edit', compact('Existencias'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $Existencias=Existencias::findOrFail($id);
        if(Storage::delete('public/.$Existencias->Foto')){
             Existencias::destroy($id);
            

        }
       
        return redirect('tienda')->with('mensaje', 'Producto ELIMINADO');
    }
}
