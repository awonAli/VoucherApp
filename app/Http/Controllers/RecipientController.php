<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Recipient;


class RecipientController extends Controller
{
    public function getAll(Request $request, Response $response)
  {
    $recipients = Recipient::all();
    return response()->json([
        'recipients' => $recipients
    ], 200);
  }
}
