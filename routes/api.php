<?php

use App\Http\Controllers\AdressUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\EtoileController;
use App\Http\Controllers\HearthController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProduitColorSizeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProduitImgController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProUSerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// user
Route::post("/register", [UserController::class, "register"]);
Route::post("/login", [UserController::class, "login"]);
Route::get("/users", [UserController::class, "index"]);
Route::post("/users/{user}", [UserController::class, "update"]);
// produit
Route::post("/Produit/create", [ProduitController::class, "store"]);
Route::post("/Produit/delete/{produit}", [ProduitController::class, "destroy"]);
Route::post("/Produit/update/{produit}", [ProduitController::class, "update"]);
Route::post("/Produit/updatePro/{produit}", [ProduitController::class, "updatePromo"]);
Route::get("/Produit/show/{produit}", [ProduitController::class, "show"]);
Route::get("/Produit", [ProduitController::class, "index"]);
Route::get("/Produit/Nouveau", [ProduitController::class, "Nouveau"]);
Route::get("/Produit/count", [ProduitController::class, "count"]);
//
Route::get("/ProduitImage", [ProduitImgController::class, "index"]);
// hearth
Route::post("/hearth/delete/{hearth}", [HearthController::class, "destroy"]);
Route::post("/hearth/deleteT/{iduser}", [HearthController::class, "delete"]);
Route::post("/hearth/create", [HearthController::class, "store"]);
Route::get("/hearth", [HearthController::class, "index"]);

// category
Route::get("/cat", [CategoryController::class, "index"]);
Route::post("/cat/create", [CategoryController::class, "store"]);
Route::get("/cat/show/{category}", [CategoryController::class, "show"]);
Route::post("/cat/update/{category}", [CategoryController::class, "update"]);
Route::post("/cat/delete/{category}", [CategoryController::class, "destroy"]);
Route::get("/cat/count", [CategoryController::class, "count"]);

// notification
Route::post("/notification/create", [NotificationController::class, "store"]);
Route::get("/notification", [NotificationController::class, "index"]);


// size
Route::post("/size/create", [SizeController::class, "store"]);
Route::post("/size/delete/{size}", [SizeController::class, "destroy"]);
Route::get("/size/show/{size}", [SizeController::class, "show"]);
Route::post("/size/update/{size}", [SizeController::class, "update"]);
Route::get("/size", [SizeController::class, "index"]);

// carts
Route::post("/cart", [CartController::class, "store"]);
Route::get("/list/cart", [CartController::class, "index"]);
Route::delete("/list/delete/{iteam_id}", [CartController::class, "removeCart"]);
Route::delete("/list/deleteUser/{user}", [CartController::class, "deletUser"]);
Route::put("/updateQty/{cart_id}/{scope}", [CartController::class, "updateQty"]);
Route::get("/countCart", [CartController::class, "countCart"]);
Route::post("/Prouser", [ProUSerController::class, "store"]);
Route::get("/Prouser/list", [ProUSerController::class, "index"]);
Route::post("/Prouser/delete/{user}", [ProUSerController::class, "delete"]);
// adress user

Route::get('/adress', [AdressUserController::class, 'index']);
Route::post("/adress/user", [AdressUserController::class, "store"]);
Route::post("/adress/update", [AdressUserController::class, "update"]);
Route::get("/adress/show/{id_user}", [AdressUserController::class, "show"]);
// Commentaire
Route::get("/commentaire", [CommentaireController::class, "index"]);
Route::get("/commentaire/{commentaire}", [CommentaireController::class, "show"]);
Route::post("/commentaire/create", [CommentaireController::class, "store"]);
Route::post("/commentaire/{commentaire}", [CommentaireController::class, "destroy"]);
Route::post("/commentaire/update/{commentaire}", [CommentaireController::class, "update"]);
Route::post("/commentaire/Status/{commentaire}", [CommentaireController::class, "Status"]);
Route::post("/commentaire/StatusC/{commentaire}", [CommentaireController::class, "StatusC"]);
// etoile
Route::get("/etoile", [EtoileController::class, "index"]);
Route::post("/etoile/create", [EtoileController::class, "store"]);

//Payment
Route::post("/payment/store", [PaymentController::class, "store"]);
Route::get("/payment", [PaymentController::class, "index"]);
