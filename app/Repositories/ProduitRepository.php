<?php

namespace App\Repositories;

use App\Produit;

class ProduitRepository {

    protected $produit;

    public function __construct(Produit $produit)
    {
        $this->produit = $produit;
    }

    public function getProduits()
    {
        return Produit::all();
    }

    public function getPaginate($n)
    {
        return $this->produit->paginate($n);

    //        return $this->getProduits()->paginate($n);
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