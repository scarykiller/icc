<?php

namespace App\Http\Controllers;

use App\Repositories\ProduitRepository;
use Illuminate\Http\Request;
use App\Http\Requests\ProduitRequest;


class ProduitController extends Controller
{
    protected $produitRepository;

    public function __construct(ProduitRepository $produitRepository)
    {
       // $this->middleware('auth');
        $this->produitRepository = $produitRepository;
    }


    public function index()

    {
        $categorie ="";
        if (\Session::exists("categorie")):
        $categorie = \Session::get("categorie");
        else:
            $categorie = "info";
        endif;



        $produits = $this->produitRepository->getProduits($categorie,6);
        $links = $produits->render();

        //$_SESSION["categorie"] ="hifi";
        //Session::put("categorie","hifi");

        return view('achat', compact('produits', 'links'));


    }
    public function updatePanier($n){
        if(\Session::exists("cart")):{
            $n=$this->produitRepository->getProduit($n);
            \Session::push("cart",$n);

        }
        else: {
            $n=$this->produitRepository->getProduit($n);
            $produit = [$n];
            \Session::put("cart", $produit);

        }
        endif;

        if (\Session::exists("categorie")):
            $categorie = \Session::get("categorie");
        else:
            $categorie = "info";
        endif;

        $produits = $this->produitRepository->getProduits($categorie,6);
        $links = $produits->render();
        return view('achat', compact('produits', 'links'));


    }

    public function create()
    {
        \Session::put("categorie","info");
        return view('produits.add');

    }
    public function cat($n){
        \Session::put("categorie","$n");
        $categorie = \Session::get("categorie");
        $produits = $this->produitRepository->getProduits($categorie,6);
        $links = $produits->render();

        //$_SESSION["categorie"] ="hifi";
        //Session::put("categorie","hifi");
        return view('achat', compact('produits', 'links'));

    }


    public function store(ProduitRequest $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);

        $post = $this->produitRepository->store($inputs);

        $_SESSION["categorie"]="info";
        return redirect(route('produit.index'));

    }

    public function destroy($id)
    {
        $this->produitRepository->destroy($id);

        return redirect()->back();

    }
    public function destroyPanier($id){
        //TODO : A tester
        $sortie=0;
        if(\Session::exists("cart") ) :
            foreach (\Session::get("cart") as $product):
                if($sortie==1):
                    break;

                elseif (($product[0]->id == $id) && !($product[0]->name=="")):
                    $product[0]->name = "";
                    $sortie=1;

                    endif;
            endforeach;

            $categorie ="";
            if (\Session::exists("categorie")):
                $categorie = \Session::get("categorie");
            else:
                $categorie = "info";
            endif;



            $produits = $this->produitRepository->getProduits($categorie,6);
            $links = $produits->render();

            //$_SESSION["categorie"] ="hifi";
            //Session::put("categorie","hifi");

            return view('achat', compact('produits', 'links'));





            endif;
    }
    //
}
