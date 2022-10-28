<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSales = Sale::all();
        return view('sales.index', compact('allSales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'saleClientName' => '',
            'saleProducts' => 'required',
            'saleTotalPrice' => 'required|numeric|min:0',
            'saleParcelNumber' => 'required|numeric|min:1',
        ]);
        $sale = new Sale;
        $sale->saleClientName = $request->saleClientName;
        $sale->saleProducts = $request->saleProducts;
        $sale->saleTotalPrice = $request->saleTotalPrice;
        $sale->saleParcelNumber = $request->saleParcelNumber;
        $sale->save();
        return redirect()->route('sales.index')->with('status', 'Venda adicionada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::find($id);
        return view('sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'saleClientName' => '',
            'saleProducts' => 'required',
            'saleTotalPrice' => 'required|numeric|min:0',
            'saleParcelNumber' => 'required|numeric|min:1',
        ]);
        $sale = Sale::find($id);
        $sale->saleClientName = $request->saleClientName;
        $sale->saleProducts = $request->saleProducts;
        $sale->saleTotalPrice = $request->saleTotalPrice;
        $sale->saleParcelNumber = $request->saleParcelNumber;
        $sale->update();
        return redirect()->route('sales.index')->with('status', 'Venda atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);
        $sale->delete();
        return redirect()->route('sales.index')->with('status', 'Venda deletada com sucesso.');
    }
}
