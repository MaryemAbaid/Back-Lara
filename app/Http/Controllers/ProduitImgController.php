<?php

namespace App\Http\Controllers;

use App\Models\produit_Img;
use Illuminate\Http\Request;

class ProduitImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return produit_Img::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produit_Img  $produit_Img
     * @return \Illuminate\Http\Response
     */
    public function show(produit_Img $produit_Img)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produit_Img  $produit_Img
     * @return \Illuminate\Http\Response
     */
    public function edit(produit_Img $produit_Img)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produit_Img  $produit_Img
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, produit_Img $produit_Img)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produit_Img  $produit_Img
     * @return \Illuminate\Http\Response
     */
    public function destroy(produit_Img $produit_Img)
    {
        //
    }
}
