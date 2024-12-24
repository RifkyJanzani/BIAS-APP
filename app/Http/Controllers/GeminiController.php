<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;
use App\Models\RaporTest;

class GeminiController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'question' => 'required',
        ]);
        $question = $request->question;
        // Initialize the Gemini API client with the API key from the .env file
        $client = new Client(env('GEMINI_API_KEY'));
        // Use the Gemini API to generate a response for the question
        $response = $client->geminiPro()->generateContent(
            new TextPart($question),
        );
        // Extract the answer from the API response
        $answer = $response->text();
        // Return the question and the generated answer as a JSON response
        return response()->json(['question' => $question, 'answer' => $answer]);
    }

    public function generateRapor($question, $nis)
    {
        dd($question);
        $client = new Client(env('GEMINI_API_KEY'));
        $response = $client->geminiPro()->generateContent(
            new TextPart($question),
        );
        $answer = $response->text();
        RaporTest::create([
            'nis' => $nis,
            'nilai_dari_AI' => $answer
        ]);
        return response()->json(['question' => $question, 'answer' => $answer]);
    }
}
