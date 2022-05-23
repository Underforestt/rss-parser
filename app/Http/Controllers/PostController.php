<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Carbon\Carbon;
use function response;

class PostController extends Controller
{
    /**
    * @OA\Get(
    *      path="/posts",
    *      operationId="getPostsList",
    *      tags={"Posts"},
    *      summary="Get list of posts",
    *      description="Returns list of posts",
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *          @OA\JsonContent(ref="#/components/schemas/PostResource")
    *       )
    *     )
    */
    public function index(){
        $posts = Post::all();
        return (new PostResource($posts));
    }

    /**
     * @OA\Post(
     *      path="/posts",
     *      operationId="storePosts",
     *      tags={"Posts"},
     *      summary="Store new post",
     *      description="Returns post data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePostRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PostResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      )
     * )
     */
    public function create(StorePostRequest $request){
        $time = Carbon::now();
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'pub_date' => $time->toDateTimeString(),
        ]);
        return (new PostResource($post))->response()->setStatusCode(201);
    }

    /**
     * @OA\Get(
     *      path="/posts/{id}",
     *      operationId="getPostById",
     *      tags={"Posts"},
     *      summary="Get post`s information",
     *      description="Returns post`s data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PostResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function find(Post $post){
        return new PostResource($post);
    }

    /**
     * @OA\Put(
     *      path="/posts/{id}",
     *      operationId="updatePost",
     *      tags={"Posts"},
     *      summary="Update existing post",
     *      description="Returns updated post data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePostRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PostResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(StorePostRequest $request, Post $post){
        $post->update($request->all());
        return new PostResource($post);
    }

    /**
     * @OA\Delete(
     *      path="/posts/{id}",
     *      operationId="deletePost",
     *      tags={"Posts"},
     *      summary="Delete existing post",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function delete(Post $post){
        $post->delete();
        return response()->json(null, 204);
    }
}
