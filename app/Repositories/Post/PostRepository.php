<?php


namespace App\Repositories\Post;


use App\Post;
use App\User;
use Illuminate\Http\Request;
use Hashids;
use Illuminate\Support\Facades\Auth;

class PostRepository implements PostRepositoryInterface
{

    protected $user;
    protected $post;
    protected $hashids;

    /**
     * PostRepository constructor.
     * @param Hashids $hashids
     * @param Post $post
     * @param User $user
     */
    public function __construct(Hashids $hashids, Post $post, User $user)
    {
        $this->hashids = $hashids;
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * @inheritDoc
     */
    public function all()
    {
        return $this->post->get();
    }

    /**
     * @inheritDoc
     */
    public function get($encodedPostId)
    {
        $id = $this->hashids::decode($encodedPostId)[0];
        return $this->post->where('id', $id)->first();
    }

    /**
     * @inheritDoc
     */
    public function store(Request $request)
    {
        $post = $this->post;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return $post;
    }

    /**
     * @inheritDoc
     */
    public function update(Request $request, $encodedPostId)
    {
        $post = $this->get($encodedPostId);
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return $post;
    }

    /**
     * @inheritDoc
     */
    public function delete($encodedPostId)
    {
        $post = $this->get($encodedPostId);
        return $post->delete();
    }

    /**
     * @inheritDoc
     */
    public function getUserPosts()
    {
        return $this->post->where('user_id', Auth::id())->get();
    }
}
