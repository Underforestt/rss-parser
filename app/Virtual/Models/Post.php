<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Post",
 *     description="Post model",
 *     @OA\Xml(
 *         name="Post"
 *     )
 * )
 */
class Post
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

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

    /**
     * @OA\Property(
     *     title="pub_date",
     *     description="date of publication",
     *     example="2022-02-24 05:00:00",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $pub_date;
}
