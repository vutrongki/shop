<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    private $review;

    public function __construct(Review $review) {
        $this->review = $review;
    }

    public function review(Request $request) {

    }
}
