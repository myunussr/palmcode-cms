<?php

namespace App\Docs;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PostSchema",
 *     type="object",
 *     title="Post",
 *     required={"id", "title"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Hello World"),
 *     @OA\Property(property="slug", type="string", example="hello-world"),
 *     @OA\Property(property="excerpt", type="string", example="Short excerpt..."),
 *     @OA\Property(property="status", type="string", example="published"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-07-03T14:48:00.000Z")
 * )
 */
class PostSchema {}
