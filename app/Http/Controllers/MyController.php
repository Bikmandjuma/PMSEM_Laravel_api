<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\StoredData;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    public function postData(Request $request){
        $request->validate([
            'temperature' => 'required|numeric',
            'vibration' => 'required|numeric',
        ]);

        $dataInput = StoredData::create([
            'temperature' => $request->temperature,
            'vibration' => $request->vibration,
            // 'user_fk_id' => Auth::guard('user')->user()->id,
        ]);

        return response()->json([
            'message' => 'Data received successfully',
            'data' => $dataInput
        ], 201);

    }

    public function getData(){
        // $Auth_user_id = Auth()->guard('user')->user()->id;
        // $data = StoredData::where('id',$Auth_user_id)->latest()->first();
        $data = StoredData::latest()->first();

        if (!$data) {
            
            return response()->json([
                'error' => 'No data found'
            ], 404);

        }

        $formattedData = [
            'temperature' => (string) $data->temperature,
            'vibration' => (float) $data->vibration,
        ];

        return response()->json($formattedData);
    }
}
