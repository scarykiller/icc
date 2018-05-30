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
        if(\Session::exists("cart")):

            $produit=$this->produitRepository->getProduit($n);

            if (isset($produit["quantite"]) && $produit[0]->id == $n):
                $produit["quantite"]++;
            else :
                if($produit[0]->id == $n):
                $produit["quantite"]=1;
            endif;


            \Session::push("cart",$produit);
            endif;


        else: {
            $z=$this->produitRepository->getProduit($n);
            $produit=$z;
            if (isset($produit["quantite"])&& $produit->id == $n ):
                $produit["quantite"]++;
            else :
                $produit["quantite"]=1;

            endif;


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
                    if (isset($product[0]->quantité) && $product[0]->id ==$id ):
                        $product[0]->quantité--;
                    else :
                        if($product[0]->id ==$id):

                        $product[0]->quantité=0;
                        endif;
                    endif;
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
