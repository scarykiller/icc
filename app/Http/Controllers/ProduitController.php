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
        $this->middleware('admin');
        $this->produitRepository = $produitRepository;
    }


    public function index()
    {

        $produits = $this->produitRepository->getPaginate(2);
        $links = $produits->render();

        return view('achat', compact('produits', 'links'));

    }

    public function create()
    {
        return view('produits.add');

    }
    public function store(ProduitRequest $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);

        $post = $this->produitRepository->store($inputs);


        return redirect(route('post.index'));
    }



    //
}
