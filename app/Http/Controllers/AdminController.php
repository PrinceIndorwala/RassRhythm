<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\Contact;

class AdminController extends Controller
{
    public function showOverview()
    {

        if (auth()->user()->usertype !== 'admin') {
            abort(403, 'Unauthorized access');
        }
        
        $users = User::all();
        $enrollments = Enrollment::all();
        $contacts = Contact::all();

        return view('admin.overview', compact('users', 'enrollments', 'contacts'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        // Check if the user exists and delete
        if ($user) {
            $user->delete();

            return redirect()->back()->with('success', 'User and related records deleted successfully!');
        }

        // Redirect back to the admin overview page
        return redirect()->route('admin.overview');
    }

    // Delete enrollment by ID
    public function deleteEnrollment($id)
    {
        $enrollment = Enrollment::find($id);

        // Check if the enrollment exists and delete
        if ($enrollment) {
            $enrollment->delete();
        }

        // Redirect back to the admin overview page
        return redirect()->route('admin.overview');
    }

    // Delete contact by ID
    public function deleteContact($id)
    {
        $contact = Contact::find($id);

        // Check if the contact exists and delete
        if ($contact) {
            $contact->delete();
        }

        // Redirect back to the admin overview page
        return redirect()->route('admin.overview');
    }
}
