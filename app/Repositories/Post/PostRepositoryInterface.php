<?php


namespace App\Repositories\Post;


use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    /**
     * @return object
     */
    public function all();

    /**
     * @param $encodedPostId
     * @return object
     */
    public function get($encodedPostId);

    /**
     * @return object
     */
    public function getUserPosts();

    /**
     * @param Request $request
     * @return object
     */
    public function store(Request $request);

    /**
     * @param Request $request
     * @param $encodedPostId
     * @return object
     */
    public function update(Request $request, $encodedPostId);

    /**
     * @param $encodedPostId
     * @return object
     */
    public function delete($encodedPostId);
}
