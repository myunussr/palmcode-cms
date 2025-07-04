<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/v1/categories",
     *     summary="Get list of categories",
     *     tags={"Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="List of categories returned successfully",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/CategorySchema")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return CategoryResource::collection(Category::withCount('posts')->get());
    }

    /**
     * @OA\Get(
     *     path="/v1/categories/{category}",
     *     summary="Get a single category by ID",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="category",
     *         in="path",
     *         description="ID of the category",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category retrieved successfully",
     *         @OA\JsonContent(ref="#/components/schemas/CategorySchema")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found"
     *     )
     * )
     */
    public function show(Category $category)
    {
        return new CategoryResource($category->load('posts'));
    }
}
