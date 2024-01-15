<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Modules\Home\HomeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // we use dependency injection to inject home service class
    public function __construct(
        
        public readonly HomeService $homeService
    )
    {
    }
    public function home(Request $request): View
    {
        return view('home', $this->homeService->home($request));
    }
}
