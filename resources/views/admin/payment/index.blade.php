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
    <section id="payment" class="container my-5">
        <div class="row">
            <div class="col position-relative">
                <div id="isSent" class="text-bg-success message p-3 d-none success align-items-center justify-content-center">
                    <i class="fa-solid fa-circle-check fa-fade"></i>
                    <span class="ms-2 me-4">Payment done! <br> You will be redirected to the apartment's page...</span>
                </div>
                <div id="isSentNone" class="text-bg-danger message p-3 d-none danger align-items-center justify-content-center">
                    <i class="fa-solid fa-circle-check fa-fade"></i>
                    <span class="ms-2 me-4">Payment rejected!</span>
                </div>
            </div>
        </div>
        {{-- div fornito da Braintree per il layout --}}
        <div id="dropin-container"></div>
        <div class="d-flex justify-content-between">
            <div>
                <button id="submit-button" class="btn btn_color">Buy</button>
            </div>
            
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.sponsors.index') }}" class="btn btn_color">
                    Go back to sponsor's page
                </a>
            </div>
        </div>
    </section>
    <style lang="scss" scoped>
        :root {
            --primary-color: #24ADE3
        }

        .p_color {
            color: var(--primary-color)
        }

        .btn_color {
            background-color: var(--primary-color);
            color: white
        }

        .btn:hover {
            background-color: rgb(27, 133, 174);
            color: black
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-control:focus {
            color: var(--primary-color);
            background-color: var(--bs-body-bg);
            border-color: var(--primary-color);
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(27, 133, 174, 0.25);
        }
    </style>
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
                            }, 3500);
                            setTimeout(function() {
                                window.location.replace('/admin/apartments/' + slug);
                            }, 4000);

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
@endsection