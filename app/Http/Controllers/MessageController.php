<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function get($id)
    {
        $getMessage = Message::where('id', $id)->firstOrFail();
        return response()->json([
            'message' => 'success',
            'feedback' => $getMessage,
        ]);
    }

    public function update(Request $request, $id)
    {
        $feedback = Message::find($id);

            if($feedback)
            {
                $feedback->security = $request->input('security');
                $feedback->feedback = $request->input('feedback');
                $feedback->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'feedback SuccessFully',
                ]);
            }else{
                return response()->json([
                    'status'=> 404,
                    'message'=> 'feedback Not Found'
                ]);
            }
    }
}
