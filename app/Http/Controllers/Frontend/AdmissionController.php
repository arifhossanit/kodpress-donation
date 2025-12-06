<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdmissionController extends Controller
{
    public function showForm()
    {
        return view('frontend.admissions.apply');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|in:Male,Female',
            'date_of_birth' => 'nullable|date',
            'place_of_birth' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:1000',
            'city' => 'nullable|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'nationality' => 'nullable|string|max:100',
            'identification_document_no' => 'nullable|string|max:50',
            'identification_expiry_date' => 'nullable|date',
            'education_level' => 'nullable|string|max:255',
            'other_qualifications' => 'nullable|string|max:1000',
            'employment_status' => 'nullable|string|max:100',
            'professional_training' => 'nullable|string|max:1000',
            'attended_training_courses' => 'nullable|boolean',
            'desired_course' => 'nullable|string|max:255',
            'training_regulations_accepted' => 'required|boolean',
            'personal_data_disclosure_authorized' => 'required|boolean',
        ]);

        // Attempt to link to an existing user by email
        $user = User::where('email', $data['email'])->first();
        if (empty($user)) {
            // If no user found, create a new user account
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($request->input('password', str()->random(8))), // Random password if not provided
            ]);
        }
        $userId = $user ? $user->id : null;

        $admission = Admission::create([
            'user_id' => $userId,
            'name' => $data['name'],
            'gender' => $data['gender'] ?? null,
            'date_of_birth' => $data['date_of_birth'] ?? null,
            'place_of_birth' => $data['place_of_birth'] ?? null,
            'postal_code' => $data['postal_code'] ?? null,
            'address' => $data['address'] ?? null,
            'city' => $data['city'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'nationality' => $data['nationality'] ?? null,
            'identification_document_no' => $data['identification_document_no'] ?? null,
            'identification_expiry_date' => $data['identification_expiry_date'] ?? null,
            'education_level' => $data['education_level'] ?? null,
            'other_qualifications' => $data['other_qualifications'] ?? null,
            'employment_status' => $data['employment_status'] ?? null,
            'professional_training' => $data['professional_training'] ?? null,
            'attended_training_courses' => $data['attended_training_courses'] ?? false,
            'desired_course' => $data['desired_course'] ?? null,
            'training_regulations_accepted' => $data['training_regulations_accepted'],
            'personal_data_disclosure_authorized' => $data['personal_data_disclosure_authorized'],
            'status' => 'pending',
        ]);

        return redirect()->route('admissions.thankyou');
    }

    public function thankyou()
    {
        return view('frontend.admissions.thankyou');
    }
}
