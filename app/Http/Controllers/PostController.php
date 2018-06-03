<?php

namespace App\Http\Controllers;

use App\Http\Requests\tagRequest;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    protected $postRepository;
    protected $tagRepository;
    protected $nbrPerPage = 4;

    public function __construct(PostRepository $postRepository,TagRepository $tagRepository)
    {
        $this->middleware('auth', ['except' => ['index', 'indexTag']]);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
    }

    public function show(){

    }

    public function index()
    {
        $posts = $this->postRepository->getWithUserAndTagsPaginate($this->nbrPerPage);
        $links = $posts->render();

        return view('posts.liste', compact('posts', 'links'));
    }

    public function create()
    {
        return view('posts.add');
    }

    public function store(PostRequest $request, TagRepository $tagRepository)
    {
        $inputs = array_merge($request->all());
        $post = $this->postRepository->store($inputs);

        return redirect(route('post.index'));
    }
    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return redirect()->back();
    }

    public function indexTag($articleId)
        //Montre les commentaires (tags) d'un article par l'id de l'article($tag)
    {
        $tags = $this->tagRepository->getTagsById($articleId);
        $links = $tags->render();
        $article = $this->postRepository->getWithId($articleId);
        session(["id_post" => $articleId]);
        return view('tags', compact('tags', 'links'),compact('article'));
    }
    public function createTag(tagRequest $tagRequest,TagRepository $tagRepository){
        $inputs = array_merge($tagRequest->all(),['user_id' => $tagRequest->user()->id]);
        $inputs = array_merge($inputs,["post_id" => session("id_post")]);



        $post = $this->tagRepository->store($inputs);
        return redirect(route('post.index'));



    }


}