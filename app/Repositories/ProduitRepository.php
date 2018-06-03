<?php

namespace App\Repositories;

use App\Produit;

class ProduitRepository {

    protected $produit;

    public function __construct(Produit $produit)
    {
        $this->produit = $produit;
    }

    public function getProduits($categorie,$n)
    {
      //  return Produit::all()->where("catégorie","info");
        return \DB::table('produits')->where("catégorie",$categorie)->paginate($n);
    }
    public function getProduit($id){
        $retour =\DB::table('produits')->where("id",$id)->get()->toArray();
        return ($retour);
    }
    public function getIds(){
        $retour = \DB::table('produit')->select("id")->get()->toArray();
        return $retour;
    }

    public function getWithUserAndTagsForTagPaginate($tag, $n)
    {
        return $this->queryWithUserAndTags()
            ->whereHas('tags', function($q) use ($tag)
            {
                $q->where('tags.tag_url', $tag);
            })->paginate($n);
    }

    public function store($inputs)
    {
        return $this->produit->create($inputs);
    }

    public function destroy($id)
    {
        $produit = $this->produit->findOrFail($id);
      //  $produit->tags()->detach();
        $produit->delete();
    }

}