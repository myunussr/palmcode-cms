<?php

namespace App\Docs;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="CategorySchema",
 *     type="object",
 *     title="Category",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Technology"),
 *    @OA\Property(property="slug", type="string", example="technology"),
 *    @OA\Property(property="posts_count", type="integer", example=10),
 *    @OA\Property(property="created_at", type="string", format="date-time", example="2025-07-03 16:19:06")
 * )
 */
class CategorySchema {}
