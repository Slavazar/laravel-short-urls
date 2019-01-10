<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Url;

class GoController extends Controller
{
    public function getView(Request $request, $token)
    {
        $url = Url::where('url_token', $token)->firstOrFail();
        
        return redirect($url->url);
    }
}
