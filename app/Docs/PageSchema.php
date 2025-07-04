<?php

namespace App\Docs;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PageSchema",
 *     type="object",
 *     title="Page",
 *     required={"id", "title"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Contact Us"),
 *     @OA\Property(property="slug", type="string", example="contact-us"),
 *     @OA\Property(property="body", type="string", example="Content of the page..."),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-07-03 16:19:06")
 * )
 */
class PageSchema {}
