<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class EnrollmentController extends Controller
{
    public function showForm()
    {
        return view('enroll');
    }

    public function enroll(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'time_slot' => 'required',
            'days' => 'required|array',
            'class_level' => 'required',
            'course_fee' => 'required',
        ]);

        \Log::info('Validation passed and reached DB insert block.');

        if (Enrollment::where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'You have already enrolled.');
        }

        
    }

    public function checkout(Request $request)
    {
        

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'inr',
                    'product_data' => [
                        'name' => 'Garba Class Enrollment Fee',
                    ],
                    'unit_amount' => (int) $request->course_fee * 100, // in paise
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);
        
        if (Enrollment::where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'You have already enrolled.');
        }

        $imagePath = $request->file('photo')->store('photos', 'public');

        $enrollment=Enrollment::create([
            'user_id'     => Auth::id(),
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'photo'       => $imagePath,
            'time_slot'   => $request->time_slot,
            'class_level' => $request->class_level,
            'course_fee'  => preg_replace('/[^\d]/', '', $request->course_fee),
            'days'        => implode(',', $request->days),
        ]);

        return redirect($session->url);
    }

    public function paymentSuccess()
    {
        $enrollment = Enrollment::where('user_id', Auth::id())->latest()->first();

        if (!$enrollment) {
            return redirect()->route('enroll')->with('error', 'No enrollment found.');
        }

        return view('icard', compact('enrollment'));
    }

    public function downloadICard()
    {
        $enrollment = Enrollment::where('user_id', Auth::id())->latest()->first();
    
        if (!$enrollment) {
            return redirect()->route('enroll')->with('error', 'No enrollment found.');
        }
    
        $pdf = Pdf::loadView('icard', ['enrollment' => $enrollment]);
        return $pdf->download('Student-iCard.pdf');
    }

    public function paymentCancel()
    {
        return view('payment.cancel'); // You can create this Blade view
    }
}