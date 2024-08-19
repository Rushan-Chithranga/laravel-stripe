<x-layouts.layout>
    <section
        class="rounded-3xl flex items-center justify-center mt-[112px] mb-[82px] max-xl:mt-[64px] max-xl:mb-[165px] max-sm:mt-8 max-sm:mb-[265px] px-100 max-w-[1440px] w-full max-xl:px-8 max-sm:px-4">
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold text-center mb-6">Laravel Stripe Payment</h1>

            <div class="flex justify-center">
                <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
                    <div class="mb-4 border-b pb-2">
                        <h3 class="text-xl font-semibold">Payment Details</h3>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success text-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.59 8l-4.3 4.29-2.3-2.3a1 1 0 1 0-1.42 1.42l3 3a1 1 0 0 0 1.42 0l5-5A1 1 0 0 0 14.59 8z"/></svg>
                            </span>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger text-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.59 8l-4.3 4.29-2.3-2.3a1 1 0 1 0-1.42 1.42l3 3a1 1 0 0 0 1.42 0l5-5A1 1 0 0 0 14.59 8z"/></svg>
                            </span>
                            <p>{{ Session::get('error') }}</p>
                        </div>
                        @endif

                        <form role="form" action="{{ route('payment.process') }}" method="POST"
                            class="require-validation" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Name on Card</label>
                                <input class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" size="4" type="text">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Card Number</label>
                                <input autocomplete="off" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 card-number" size="20" type="text">
                            </div>

                            <div class="grid grid-cols-3 gap-4 mb-4">
                                <div class="col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">CVC</label>
                                    <input autocomplete="off" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 card-cvc" placeholder="ex. 311" size="4" type="text">
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">Expiration Month</label>
                                    <input class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 card-expiry-month" placeholder="MM" size="2" type="text">
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">Expiration Year</label>
                                    <input class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 card-expiry-year" placeholder="YYYY" size="4" type="text">
                                </div>
                            </div>

                            <div class="mb-4 hidden">
                                <div class="alert-danger alert bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                                    Please correct the errors and try again.
                                </div>
                            </div>

                            <div>
                                <button class="w-full bg-indigo-600 text-white font-bold py-3 px-4 rounded-md hover:bg-indigo-700" type="submit">Pay Now ($100)</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                localStorage.setItem('stripeStatus', JSON.stringify(status));
                localStorage.setItem('stripeResponse', JSON.stringify(response));
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
</x-layouts.layout>
