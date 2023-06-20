<?php

namespace App\Http\Controllers;

use App\Models\produit;
use App\Models\produit_color_size;
use App\Models\produit_Img;
use App\Models\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProduitController extends Controller
{
    public function index()
    {
        $produit = DB::table('produits')
            ->join('categories', 'produits.idC', '=', 'categories.id')
            ->select('categories.nom as nameCat', 'produits.nom as nomP', 'produits.image as imageP', 'produits.id as idPro', 'produits.*', 'categories.*')
            ->get();

        // return $hearth;

        return $produit;
    }
    public function count()
    {
        return produit::get()->count();
    }
    public function Nouveau()
    {


        return produit::orderBy("id", 'desc')->limit(4)->get();
    }

    public function store(Request $request)
    {

        $produit = new produit();
        $produit->nom = $request->nom;
        $produit->description = $request->description;
        $produit->categories_parent = $request->categories_parent;
        $produit->price = $request->price;
        $produit->price_of = $request->price_of;
        $produit->brefDesc = $request->brefDesc;
        $produit->marque = $request->marque;
        $produit->idC = $request->idC;
        $produit->Quantite = $request->Quantite;
        $produit->marque = $request->marque;
        $produit->datePromo = $request->datePromo;
        $produit->Promotion = $request->Promotion;
        $imgPr = $request->file('imgPr');
        $imgPrName = time() . "." . $imgPr->getClientOriginalExtension();
        $imgPr->move('produit/', $imgPrName);
        $produit->image = $imgPrName;

        $produit->save();
        if ($request->hasfile('fil')) {

            foreach ($request->file('fil') as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move('produit/', $name);
                $Produit_Color_Size = new produit_Img();
                $Produit_Color_Size->Produit_Id = $produit->id;
                $Produit_Color_Size->image = $name;
                $Produit_Color_Size->save();
            }
        }

        if ($request->size !== null) {
            if (is_array($request->size) || is_object($request->size)) {
                foreach ($request->size as $key) {
                    $Produit_image = new size();
                    $Produit_image->Produit_Id = $produit->id;
                    $Produit_image->size = $key;
                    $Produit_image->save();
                }
            }
        }

        return response()->json([
            'message' => $request->fil,
        ]);
    }
    public function show(produit $produit)
    {
        return response()->json([
            'produit' => $produit
        ]);
        ;
    }

    public function update(Request $request, produit $produit)
    {
        $Produit_Color_Size = new produit_Img();
        $Produit_Color_Size->where('Produit_Id', $produit->id)->delete();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imgName = time() . "." . $image->getClientOriginalExtension();
            $image->move('produit/', $imgName);
            $produit->update([
                'image' => $imgName,
            ]);
        }
        if ($request->nom !== null) {
            $produit->update([
                'nom' => $request->nom,
            ]);
        }
        if ($request->categories_parent !== null) {
            $produit->update([
                'categories_parent' => $request->categories_parent,
            ]);
        }
        if ($request->idC !== null) {
            $produit->update([
                'idC' => $request->idC,
            ]);
        }

        if ($request->tendence !== null) {
            $produit->update([
                'tendence' => $request->tendence,
            ]);
        }
        if ($request->price !== null) {
            $produit->update([
                'price' => $request->price,
            ]);
        }
        if ($request->price_ofrire !== null) {
            $produit->update([
                'price_of' => $request->price_ofrire,
            ]);
        }
        if ($request->brefDesc !== null) {
            $produit->update([
                'brefDesc' => $request->brefDesc,
            ]);
        }
        if ($request->Quantite !== null) {
            $produit->update([
                'Quantite' => $request->Quantite,
            ]);
        }
        if ($request->Promotion !== null) {
            $produit->update([
                'Promotion' => $request->Promotion,
            ]);
        }
        if ($request->datePromo !== null) {
            $produit->update([
                'datePromo' => $request->datePromo,
            ]);
        }
        if($request->Glissier!==null){
            $produit->update([
                'Glissier' => $request->Glissier,
            ]);
        }
        // image


        // if ($request->hasfile('fil')) {
        //     foreach ($request->file('fil') as $image) {
        //         $name = time() . $image->getClientOriginalName();
        //         $image->move('produit/', $name);
        //         $Produit_Color_Size->Produit_Id = $produit->id;
        //         $Produit_Color_Size->image = $name;
        //         $Produit_Color_Size->save();
        //     }
        // }
        if ($request->hasfile('fil')) {

            foreach ($request->file('fil') as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move('produit/', $name);
                $Produit_Color_Size = new produit_Img();
                $Produit_Color_Size->Produit_Id = $produit->id;
                $Produit_Color_Size->image = $name;
                $Produit_Color_Size->save();
            }
        }
        // size
        if ($request->size !== null) {
            if (is_array($request->size) || is_object($request->size)) {
                $P_size = new size();
                $P_size->where('Produit_Id', $produit->id)->delete();
                foreach ($request->size as $key) {
                    $Produit_image = new size();
                    $Produit_image->Produit_Id = $produit->id;
                    $Produit_image->size = $key;
                    $Produit_image->save();
                }
            }
        }
        return response()->json([
            'message' => '$request->image'
        ]);
    }
    public function updatePromo(Request $request, produit $produit)
    {
        if ($request->Promotion !== null) {
            $produit->update([
                'Promotion' => $request->Promotion,
            ]);
        }
        if ($request->datePromo !== null) {
            $produit->update([
                'datePromo' => $request->datePromo,
            ]);
        }

        return response()->json([
            'message' => '$request->image'
        ]);
    }
    public function destroy(produit $produit)
    {
        $produit->delete();
    }
}
