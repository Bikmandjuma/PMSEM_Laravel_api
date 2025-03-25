<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CropData;

class SoilController extends Controller
{
    public function postCropData(Request $request){
        $request->validate([
            'N' => 'required|numeric',
            'P' => 'required|numeric',
            'K' => 'required|numeric',
            'temperature' => 'required|numeric',
            'pH' => 'required|numeric',
            'soil_moisture' => 'required|numeric',
            'conductivity' => 'required|numeric',
        ]);

        $cropInput = CropData::create([
            'N' => $request->N,
            'P' => $request->P,
            'K' => $request->K,
            'temperature' => $request->temperature,
            'pH' => $request->pH,
            'soil_moisture' => $request->soil_moisture,
            'conductivity' => $request->conductivity,
        ]);

        return response()->json([
            'message' => 'Data received successfully',
            'data' => $cropInput
        ], 201);

    }

    public function getCropData(){
        $data = CropData::latest()->first();

        if (!$data) {
            
            return response()->json([
                'error' => 'No data found'
            ], 404);

        }

        $formattedData = [
            'N' => (string) $data->N,
            'P' => (string) $data->P,
            'K' => (string) $data->K,
            'temperature' => (float) $data->temperature,
            'pH' => (float) $data->pH,
            'soil_moisture' => (float) $data->soil_moisture,
            'conductivity' => (float) $data->conductivity,
        ];

        return response()->json($formattedData);
    }


}