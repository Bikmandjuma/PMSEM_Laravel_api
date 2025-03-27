<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\StoredData;
use Illuminate\Support\Facades\Auth;
use App\Mail\WarningStateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


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

    public function sendEmail(Request $request)
    {
        Log::info('Received request to send email for state: ' . $request->state);
        
        $email = Auth::guard('user')->user()->email;
        if ($email) {

            Mail::to($email)->send(new WarningStateMail([
                'state' => $request->state
            ]));

            Log::info('Warning email sent to: ' . $email);
            return response()->json(['message' => 'Email sent successfully.']);
        }

        return response()->json(['message' => 'No email sent.'], 400);
    }


}
