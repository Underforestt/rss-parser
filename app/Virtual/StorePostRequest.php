<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Project request",
 *      description="Store Project request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StorePostRequest
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="Post title",
     *      example="Simple title"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="body",
     *      description="Post body",
     *      example="Simple post body"
     * )
     *
     * @var string
     */
    public $body;
}
