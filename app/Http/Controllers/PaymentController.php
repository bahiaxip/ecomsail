<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        //Crear cliente
        $customer = \Stripe\Customer::create([
            'source' => 'tok_mastercard',
            'email' => 'bahiaxip@hotmail.com'
        ]);
        //Cargar 
        //crear conexión (restringida por Stripe al ser modo prueba)
        //$stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        //$stripe->accounts->create(['type' => 'standard']);
        return view('payment',[
            'intent' => $user->createSetupIntent(),
        ]);
    }

    public function singleCharge(Request $request){
        //necesario validar amount (cantidad) desde JavaScript
        if(!$request->amount){
            $amount = 100;
        }else{
            $amount = ($request->amount * 100);    
        }
        
        
        $payment_method = $request->payment_method;
        $user = auth()->user();
        //dd($amount);
    //opción 1
        //creamos cliente
        $user->createOrGetStripeCustomer();
    //opción 2
        /*
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = \Stripe\Customer::create([
            'source' => 'tok_mastercard',
            'email' => 'bahiaxip@hotmail.com'
        ]);
        */
    //opción 1
        $paymentMethod = $user->addPaymentMethod($payment_method);
        try {
            //$user->charge(1000, 'pm_card_threeDSecure2Required');
        //opción 1
            $stripe_payment = $user->charge($amount,$paymentMethod->id);
        //opción 2
            /*
            $charge = \Stripe\Charge::create([
                'amount' => 1500,
                'currency' => 'eur',
                'customer' => $customer->id
            ]);            
            */
            if($stripe_payment->status == 'succeeded'){
//actualizar pedido
//reducir stock de productos o sus combinaciones (si existen)
//crear notificación
                //dd($stripe_payment);
                return redirect('/');
            }            
        } catch (IncompletePayment $exception) {
            // Get the payment intent status...
            $exception->payment->status;
         
            // Check specific conditions...
            if ($exception->payment->requiresPaymentMethod()) {
                // ...
            } elseif ($exception->payment->requiresConfirmation()) {
                // ...
            }
        }

    }

}
