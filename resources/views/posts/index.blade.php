<?php
public function index()
{
    $posts = $this->postRepository->getPaginate($this->nbrPerPage);
    $links = $posts->render();

    return view('posts.liste', compact('posts', 'links'));
}