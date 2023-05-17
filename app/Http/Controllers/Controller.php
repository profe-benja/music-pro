<?php
namespace App\Http\Controllers;

use OpenApi\Annotations as OA;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Music pro API Versión 1.0",
 *      description="
 *
 *
 *      ",
 *     @OA\Contact(
 *       email="bej.mora@prefesor.duoc.cl",
 *       name="Benjamín Mora Torres",
 *       url="https://www.bemtorres.win",
 *     ),
 *    @OA\License(
 *      name="MIT",
 *      url="https://opensource.org/licenses/MIT"
 *    ),
  *   @OA\Server(
  *     url="http://localhost:8000/api/v1",
  *     description="Localhost"
  *   ),
 *
 * )
 *
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
