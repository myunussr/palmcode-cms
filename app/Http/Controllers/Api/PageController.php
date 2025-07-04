<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Resources\PageResource;

class PageController extends Controller
{
    /**
     * @OA\Get(
     *     path="/v1/pages",
     *     tags={"Pages"},
     *     summary="List all pages",
     *     @OA\Response(
     *         response=200,
     *         description="List of pages returned successfully",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/PageSchema")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return PageResource::collection(Page::latest()->paginate(10));
    }

    /**
     * @OA\Get(
     *     path="/v1/pages/{page}",
     *     tags={"Pages"},
     *     summary="Get a single page by ID",
     *     @OA\Parameter(
     *         name="page",
     *         in="path",
     *         description="ID of the page",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Page retrieved successfully",
     *         @OA\JsonContent(ref="#/components/schemas/PageSchema")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Page not found"
     *     )
     * )
     */
    public function show(Page $page)
    {
        return new PageResource($page);
    }
}
