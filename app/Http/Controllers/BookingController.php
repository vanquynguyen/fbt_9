<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use Auth;
use App\Models\User;
use App\Models\Tour;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Mail;
use App\Mail\MailBooking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $tour = Tour::find($id)->calculateBooking();
        
        return view('sides.booking', compact('user', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BookingRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['tour_id'] = $id;
        try {
            if ($input['method_payment'] == config('custom.stripe')) {
                $input['status'] = config('custom.paid');
                $stripe = Stripe::make(config('services.stripe.secret'));

                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $input['card_no'],
                        'exp_month' => $input['exp_month'],
                        'exp_year' => $input['exp_year'],
                        'cvc' => $input['cvc_no'],
                    ],
                ]);

                if (!isset($token['id'])) {
                    return back();
                }
   
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => $input['total_amount'],
                    'description' => 'Pay by stripe',
                ]);

                if ($charge['status'] == 'succeeded') {
                    if (Booking::create($input)) {
                        $booking = Booking::get()->last()->with('tour')->get()->last();
                        Mail::to($input['email'])->send(new MailBooking($booking));

                        return back()->with('message', trans('messages.payment_success'));
                    }
                } else {
                    return back()->with('message', trans('messages.payment_error'));
                }
            } else {
                $input['status'] = config('custom.unpaid');
                if (Booking::create($input)) {
                    $booking = Booking::get()->last()->with('tour')->get()->last();
                    Mail::to($input['email'])->send(new MailBooking($booking));

                    return back()->with('message', trans('messages.payment_success'));
                } else {
                    return back()->with('message', trans('messages.payment_error'));
                }
            }
        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserRequest;  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param App\Http\Requests\Request; $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //
    }

    /**
     * Calculate booking's tour
     *
     * @param App\Http\Requests\Request; $request
     * @return json
     */
    public function calculate(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $quantity = $request->quantity;
            $tour = Tour::find($id)->calculateBooking($quantity);

            return response(['totalAmount' => $tour['totalAmount'], 'paymentSurcharge' => $tour['paymentSurcharge']]);
        }
    }
}
