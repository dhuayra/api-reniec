<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiPeruController extends Controller
{
    public function number(Request $request){
        try {
            $request->validate([
                'token' => "required",
                'number' => "required"
            ]);

            $params = json_encode(['dni' => $request->number]);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://apiperu.dev/api/dni",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_POSTFIELDS => $params,        
                CURLOPT_HTTPHEADER => [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization: Bearer '.$request->token
                ],        
            ));
            $response = curl_exec($curl);
            $error = curl_error($curl);
            curl_close($curl);

            if ($error) {
                return view('welcome')->with('error', $error);
            } else {
                return view('welcome')->with('response', $response);
            }

        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return view('welcome')->with('error', $error);
        }

    }
}
