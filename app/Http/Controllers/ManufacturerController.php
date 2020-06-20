<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $manufacturers = Manufacturer::all();

        return view('manufacturers.index', [
            'manufacturers' => $manufacturers
        ]);
    }


    public function form()
    {
        return view('manufacturers.form');
    }


    public function formUpdate(Manufacturer $manufacturer)
    {
        return view('manufacturers.form', [
            'manufacturer' => $manufacturer
        ]);
    }


    public function store(Request $request)
    {
        $manufacturesData = $request->all();

        Manufacturer::create($manufacturesData);

        return redirect('manufacturer');
    }


    public function update(Request $request, Manufacturer $manufacturer)
    {
        $manufacturesData = $request->all();

        $manufacturer->update($manufacturesData);

        return redirect('manufacturer');
    }

   
    public function delete(Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        return redirect('manufacturer');
    }
}
