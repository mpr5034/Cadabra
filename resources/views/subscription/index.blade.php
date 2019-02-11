@extends('account.layouts.default')
@section('title',trans('saas.menu.plans'))
@section('account.content')
    <h6>@lang('saas.menu.plans')</h6>
    <div class="card card-default">
        <div class="card-body">

                        @if(config('saas.demo'))
                            <div class="alert alert-outline-danger">
                                @lang('saas.stripe_test_card') <br />
                                @lang('saas.more_info') <a target="_blank" href="https://stripe.com/docs/testing">on stripe.com</a>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('subscription.store') }}" id="payment-form">
                            @csrf

                            <h7>@lang('saas.payment_info')</h7>

                            <div class="form-group row">
                                <label for="plan" class="col-md-4 col-form-label text-md-right">@lang('saas.plan')</label>

                                <div class="col-md-6">
                                    <select name="plan" id="plan" class="form-control form-control-alternative  {{ $errors->has('plan') ? ' is-invalid' : '' }}">
                                        @foreach ($plans as $plan)
                                            <option value="{{ $plan->gateway_id }}" {{ request('plan') === $plan->slug || old('plan') === $plan->gateway_id ? 'selected="selected"' : '' }}>
                                                {{ $plan->name }} ({{ $plan->price }}{{ config('saas.stripe.currency') }})
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('plan'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('plan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="coupon" class="col-sm-4 col-form-label text-md-right">@lang('saas.coupon_code')</label>

                                <div class="col-md-6">
                                    <input type="text" name="coupon" id="coupon" class="form-control form-control-alternative  {{ $errors->has('coupon') ? ' is-invalid' : '' }}" value="{{ old('coupon') }}">

                                    @if ($errors->has('coupon'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('coupon') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <h7>@lang('saas.account_info')</h7>

                            <hr />

                            <div class="form-group row">
                                <label for="coupon" class="col-sm-4 col-form-label text-md-right">@lang('saas.company_name')</label>

                                <div class="col-md-6">
                                    <input type="text" name="company_name" id="company_name" required="required" class="form-control form-control-alternative  {{ $errors->has('company_name') ? ' is-invalid' : '' }}" value="{{ old('company_name') }}">

                                    @if ($errors->has('company_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                    @endif

                                    <small class="form-text text-muted">
                                        @lang('saas.text.this-should-be-your-company-name')
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="coupon" class="col-sm-4 col-form-label text-md-right">@lang('saas.admin_email')</label>

                                <div class="col-md-6">
                                    <input type="email" name="user_email" id="user_email" required="required" class="form-control form-control-alternative  {{ $errors->has('user_email') ? ' is-invalid' : '' }}" value="{{ old('user_email') }}">

                                    @if ($errors->has('user_email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_email') }}</strong>
                                    </span>

                                    @endif

                                    <small class="form-text text-muted">
                                        @lang('saas.text.enter-email-that-you-want-to-login-as-company-administrator-in-crm')
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="coupon" class="col-sm-4 col-form-label text-md-right">@lang('saas.password')</label>

                                <div class="col-md-6">
                                    <input type="password" name="user_password" id="user_password" required="required" class="form-control form-control-alternative  {{ $errors->has('user_password') ? ' is-invalid' : '' }}" value="{{ old('user_password') }}">

                                    @if ($errors->has('user_email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_email') }}</strong>
                                    </span>
                                    @endif

                                    <small class="form-text text-muted">
                                        @lang('saas.text.enter-your-password-for-crm')
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="coupon" class="col-sm-4 col-form-label text-md-right">@lang('saas.your_name')</label>

                                <div class="col-md-6">
                                    <input type="text" name="user_name" id="user_name" required="required" class="form-control form-control-alternative  {{ $errors->has('user_name') ? ' is-invalid' : '' }}" value="{{ old('user_name') }}">

                                    @if ($errors->has('user_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>

                                    @endif

                                </div>
                            </div>





                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success" id="pay">
                                        @lang('saas.secure_payment')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        let handler = StripeCheckout.configure({
            key: '{{ config('services.stripe.key') }}',
            locale: 'auto',
            token: function (token) {
                let form = $('#payment-form');

                $('#pay').prop('disabled', true);

                $('<input>').attr({
                    type: 'hidden',
                    name: 'token',
                    value: token.id
                }).appendTo(form);

                form.submit();
            }
        });

        $('#pay').click(function (e) {
            handler.open({
                name: '{{ config('saas.stripe.name') }}',
                description: '{{ config('saas.stripe.description') }}',
                currency: '{{ config('saas.stripe.currency') }}',
                key: '{{ config('services.stripe.key') }}',
                email: '{{ auth()->user()->email }}'
            });

            e.preventDefault();
        })
    </script>
@endsection