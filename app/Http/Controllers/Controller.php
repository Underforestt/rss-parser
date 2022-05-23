<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="RSS-Parser API documentation",
 *      description="Here you can discover provided endpoints.",
 *      @OA\Contact(
 *          email="yaroslav.pidlisny@gmail.com"
 *      ),
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="RSS-Parser API Server"
 * )
 *
 * @OA\Tag(
 *     name="Posts",
 *     description="API Endpoints of Posts"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
