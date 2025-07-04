<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * @OA\Get(
     *     path="/v1/posts",
     *     summary="Get list of published posts",
     *     tags={"Posts"},
     *     @OA\Response(
     *         response=200,
     *         description="List of posts returned successfully",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/PostSchema")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $posts = Post::with('categories')->where('status', 'published')->latest()->paginate(10);
        return PostResource::collection($posts);
    }

    /**
     * @OA\Get(
     *     path="/v1/posts/{post}",
     *     summary="Get a single post by ID",
     *     tags={"Posts"},
     *     @OA\Parameter(
     *         name="post",
     *         in="path",
     *         description="ID of the post",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Post retrieved successfully",
     *         @OA\JsonContent(ref="#/components/schemas/PostSchema")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post not found"
     *     )
     * )
     */
    public function show($post)
    {
        return new PostResource($post->load('categories'));
    }
}
