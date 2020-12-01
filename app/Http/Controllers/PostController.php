<?php

namespace App\Http\Controllers;

use App\Repositories\Post\PostRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    protected $postRepository;

    /**
     * PostController constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(){
        $posts = $this->postRepository->all();

        return view('posts', compact('posts'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(){
        return view('create');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request){
        $post = $this->postRepository->store($request);
        return redirect()->route('posts')->with('status', 'Post created successfully!');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function view($id){
        $post = $this->postRepository->get($id);
        $posts = $this->postRepository->all()->where('id', '>', $post->id);

        return view('view', compact('post', 'posts'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id){
        $post = $this->postRepository->get($id);
        return view('edit', compact('post'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id){
        $post = $this->postRepository->update($request, $id);
        return redirect()->route('posts')->with('status', 'Post updated successfully!');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id){
        $post = $this->postRepository->delete($id);
        return redirect()->route('posts')->with('status', 'Post deleted successfully!');
    }
}
