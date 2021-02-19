<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Course $course) {
        return view('payment.checkout', compact('course'));
    }
}
