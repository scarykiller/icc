<?php
namespace App\Repositories;

use App\Tag;
use Illuminate\Support\Str;

class TagRepository
{

    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function store($inputs)
    {
        return $this->tag->create($inputs);


    }

    public function getTagsById($id)
    {
        //  return Produit::all()->where("catégorie","info");

       // return \DB::table('tags')->where("post_id", '$id')->paginate(15);
        return $this->tag->with('user')->where("post_id",$id)->paginate("10");


    }
}