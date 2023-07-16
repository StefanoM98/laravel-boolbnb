@extends('layouts.admin')

@section('page-name', 'Pagamento')

@section('head')
    {{-- BRAINTREE --}}
    {{-- <script src="https://js.braintreegateway.com/web/dropin/1.37.0/js/dropin.min.js"></script> --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

    {{-- JQUERY --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@endsection

@section('content')
    <section id="payment" class="container payment">
        <div class="row">
            <div class="col position-relative">
                <div id="isSent" class="text-bg-success message success d-none align-items-center justify-content-center">
                    <i class="fa-solid fa-circle-check fa-fade"></i>
                    <span class="ms-2 me-4">Payment done! <br> You will be redirected to the apartment's page...</span>
                </div>
                <div id="isSentNone" class="text-bg-danger message danger d-none align-items-center justify-content-center">
                    <i class="fa-solid fa-circle-check fa-fade"></i>
                    <span class="ms-2 me-4">Payment rejected!</span>
                </div>
            </div>
        </div>
        {{-- div fornito da Braintree per il layout --}}
        <div id="dropin-container"></div>
        <div class="d-flex justify-content-between">
            <div>
                <button id="submit-button" class="btn btn-primary">Buy</button>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.sponsors.index') }}" class="btn btn-primary">
                    Go back to sponsor's page
                </a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        var button = document.querySelector('#submit-button');
        let instance;

        // Recuperiamo stringa url
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        // Salviamo i valori dei parametri nell'url
        let sponsor = urlParams.get('sponsor_id');
        let apartment = urlParams.get('apartment_id');
        let slug = urlParams.get('slug')
        console.log(sponsor, apartment, slug);
        // Script Braintree
        braintree.dropin.create({
            authorization: '{{ $token }}',
            selector: '#dropin-container'
        }, function(err, dropinInstance) {
            if (err) {
                console.error(err);
                return;
            }
            instance = dropinInstance;
            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    // API alla funzione make del PaymentController passando i parametri payload, sponsor e apartment
                    $.get('{{ route('admin.payment.make') }}', {
                        payload,
                        sponsor,
                        apartment,
                    }, function(response) {
                        if (response.success) {
                            // messaggio di successo
                            $('#isSent').removeClass('d-none').addClass('d-flex');
                            $('#submit-button').addClass('d-none');
                            setTimeout(function() {
                                $('#isSent').removeClass('d-flex').addClass(
                                    'd-none');
                            }, 3000);
                            setTimeout(function() {
                                window.location.replace('/admin/apartments/' +
                                    slug);
                            }, 5000);

                            // window.location.replace('{{ route('admin.sponsors.index') }}'); 
                            // alert('Pagamento avvenuto con successo!');

                        } else {
                            $('#isSentNone').removeClass('d-none').addClass('d-flex');

                            setTimeout(function() {
                                $('#isSentNone').removeClass('d-flex').addClass(
                                    'd-none');
                            }, 5000);


                            alert('Payment Failed. Retry');
                        }
                    }, 'json');
                });
            });
        });
    </script>

    <style>
        .payment {
            margin-top: 20rem
        }
    </style>
@endsection
