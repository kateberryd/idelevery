<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Payment\PaymentContract;
use Paystack;
use App\Order;
use Sentinel;
use Cart;
use App\OrderProduct;

class PaymentController extends Controller
{
    protected $repo;

    public function __construct(PaymentContract $paymentContract) {
        $this->repo = $paymentContract;
    }
    
  /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {

        $order = Order::create([
            'user_id' => Sentinel::check() ? Sentinel::getUser()->id : null,
            'billing_first_name'=> $request->first_name,
            'billing_last_name'=> $request->last_name,
            'billing_address'=> $request->address,
            'billing_country'=> $request->country,
            'billing_state'=> $request->state,
            'billing_postal_code'=> $request->postal_code,
            'billing_total'=> Cart::total(),
            'billing_subtotal'=> Cart::subtotal(),
            'billing_tax'=> Cart::tax(),
            'billing_city'=> $request->city,
        ]);

     
        foreach(Cart::content() as $item){

            OrderProduct::Create([
                'order_id'=> $order->id,
                'product_id'=> $item->model->id,
                'vendor_id' => $request->vendor_id,
                'qauntity' => $item->qty
            ]);
        }
     
        Cart::instance('default')->destroy();
        return  Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $notification = array(
            'message' => "Payment was  successful",
            'alert-type' => 'success'
          );	

        return redirect()->back()->with($notification);
        // dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
