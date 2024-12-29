<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Redirect;


class InterestController extends Controller
{
    public function showInterestsForm()
    {   
        $interests = auth()->user()->interests->pluck('interest_name')->toArray();
        if (empty($interests)) {
            // Log a message or use a fallback value
            $interests = ['No interests found.'];
        }
        return view('student.selectInterests', compact('interests'));
    }
    public function storeInterests(Request $request)
    {
        $request->validate([
            'interests' => 'required|array|min:1',
            'interests.*' => 'string|max:255',
            'custom_interests' => 'nullable|string',
        ]);

        $user = Auth::user();
        
        // Remove existing interests (if needed)
        Interest::where('user_id', $user->id)->delete();

        // Store new interests from the predefined list
        foreach ($request->interests as $interest) {
            Interest::create([
                'user_id' => $user->id,
                'interest_name' => ucwords(strtolower($interest)),
            ]);
        }

        // Store custom interests with validation
        if ($request->filled('custom_interests')) {
            $existingCategories = Interest::distinct()->pluck('interest_name')->toArray();
            $customInterests = explode(',', $request->custom_interests); // Split by comma

            foreach ($customInterests as $interest) {
                $enteredInterest = ucwords(strtolower(trim($interest)));
                $suggestedInterest = $this->findMostSimilarCategory($enteredInterest, $existingCategories);

                if ($suggestedInterest['similarity'] > 0.8) {
                    // Use the suggested similar category if similarity is above 80%
                    $interestName = $suggestedInterest['category'];
                } else {
                    // Check each word with the dictionary API
                    $words = explode(' ', $enteredInterest);
                    $allWordsValid = true;

                    foreach ($words as $word) {
                        if (!$this->isValidWord($word)) {
                            $allWordsValid = false;
                            break;
                        }
                    }

                    // If any word is invalid, skip storing this interest
                    if (!$allWordsValid) {
                        return Redirect::back()->withErrors(['custom_interests' => 'The interest "' . $enteredInterest . '" contains invalid words.']);
                    }

                    $interestName = $enteredInterest;
                }

                // Store the validated interest
                Interest::create([
                    'user_id' => $user->id,
                    'interest_name' => $interestName,
                ]);
            }
        }

        return redirect()->route('student.profile');
    }
    public function showInterestsForReSelection()
    {
        // Get the logged-in user
        $user = Auth::user();

        // Retrieve current interests
        $currentInterests = $user->interests->pluck('interest_name')->toArray();

        $allInterests = ['Programming', 'Game Development', 'AI', '3D Animation', 'UI/UX', 'Networking', 'Data Science']; // Add all available interests here

        // Pass current interests to the view for pre-selecting
        return view('student.selectInterests', compact('currentInterests', 'allInterests'));
    }


    // Method to find the most similar category based on Levenshtein distance
    private function findMostSimilarCategory($enteredCategory, $existingCategories)
    {
        $maxSimilarity = 0;
        $mostSimilarCategory = '';

        foreach ($existingCategories as $category) {
            $similarity = 1 - (levenshtein($enteredCategory, $category) / max(strlen($enteredCategory), strlen($category)));
            
            if ($similarity > $maxSimilarity) {
                $maxSimilarity = $similarity;
                $mostSimilarCategory = $category;
            }
        }

        return ['category' => $mostSimilarCategory, 'similarity' => $maxSimilarity];
    }

    // Method to check if a word is valid using the dictionaryapi.dev API
    private function isValidWord($word)
    {
        $client = new \GuzzleHttp\Client();
        $dictionaryApiUrl = 'https://api.dictionaryapi.dev/api/v2/entries/en/';

        try {
            $response = $client->get($dictionaryApiUrl . urlencode($word));
            $data = json_decode($response->getBody(), true);

            // Check if the API response has any meanings, indicating a valid word
            return !empty($data) && !empty($data[0]['meanings']);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // If the API request fails, assume the word is not valid
            return false;
        }
    }


    public function studentDashboard()
    {
        $user = Auth::user();
        // Get the interests of the logged-in user
        $userInterests = $user->interests->pluck('interest_name');

        // Find other students with similar interests
        $studentInterest = User::whereHas('interests', function($query) use ($userInterests) {
            $query->whereIn('interest_name', $userInterests);
        })->where('id', '!=', $user->id) // Exclude the logged-in user
        ->get();

        // Pass the students with similar interests to the view
        return view('student.studentDashboard', compact('studentInterest'));
    }

}
