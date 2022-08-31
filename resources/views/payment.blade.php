@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('single.charge')}}" method="POST" id="subscribe-form">
                        @csrf
                        {{--añadido --}}
                        <input type="number" name="amount" id="amount" class="form-control">
                        <br>
                        <label for="amount">Card Holder Name</label>
                        {{--
                        <div class="form-group">
                            <div class="row">
                                @foreach($plans as $plan)
                                <div class="col-md-4">
                                    <div class="subscription-option">
                                        <input type="radio" id="plan-silver" name="plan" value='{{$plan->id}}'>
                                        <label for="plan-silver">
                                            <span class="plan-price">{{$plan->currency}}{{$plan->amount/100}}<small> /{{$plan->interval}}</small></span>
                                            <span class="plan-name">{{$plan->product->name}}</span>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        --}}
                        <input id="card-holder-name" type="text">
                        {{--@csrf--}}
                        <div class="form-row">
                            <label for="card-element">Credit or debit card</label>
                            <div id="card-element" class="form-control">
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div class="stripe-errors"></div>
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                            @endforeach
                        </div>
                        @endif
                        <div class="form-group text-center">
                            <button id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-lg btn-success btn-block">SUBMIT</button>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{{--
añadir setTimeout()
--}}
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe,elements,style,card,cardHolderName,cardButton,clientSecret;
    setTimeout(()=>{

        
        stripe = Stripe('{{ env('STRIPE_KEY') }}');
        elements = stripe.elements();
        style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        card = elements.create('card', {hidePostalCode: true,
            style: style});
        card.mount('#card-element');
        console.log("card: ",card);
        //console.log("card: ",card.getElementsByClassName('InputElement'))
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        cardHolderName = document.getElementById('card-holder-name');
        //const cardHolderName = document.getElementById('card-holder-name');
        //var cardHolderName = document.getElementById('card-holder-name');
        //let valueName;
        

        
            
        cardButton = document.getElementById('card-button');
        clientSecret = cardButton.dataset.secret;
        //const cardButton = document.getElementById('card-button');
        //const clientSecret = cardButton.dataset.secret;
        
        
        cardButton.addEventListener('click', async (e) => {
            e.preventDefault();
            console.log("attempting");
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: { name: cardHolderName.value }
                    }
                }
                );
            if (error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                console.log(setupIntent);                
                paymentMethodHandler(setupIntent.payment_method);
            }
        });
        
        
    },100)

    /*
    async function stripe_method(e){
        e.preventDefault();
        console.log("attempting");
        console.log("clientSecret: ",clientSecret)
        console.log("card: ",card)
        console.log("cardholder: ",cardHolderName.value)
        if(cardHolderName.value=""){
            console.log("no tiene valor")
        }
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: { name: valueName }
                }
            }
            );
        if (error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            paymentMethodHandler(setupIntent.payment_method);
        }
    }
    

    function envio(e,value){
        console.log("anda",value);
        valueName = value;
    }
    */

    function paymentMethodHandler(payment_method) {

            var form = document.getElementById('subscribe-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', payment_method);
            form.appendChild(hiddenInput);
            form.submit();
        }
</script>
@endsection