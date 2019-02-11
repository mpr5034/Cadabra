<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\SubscriptionStoreRequest;
use App\Models\Plan;
use App\Service\PlansService;
use App\Service\SaasApplicationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SubscriptionController extends Controller
{
    private $planSservice;

    private $saasService;

    public function __construct(PlansService $plansService, SaasApplicationService $saasService)
    {
        $this->planSservice = $plansService;
        $this->saasService = $saasService;
    }

    public function index()
    {
        $plans = Plan::active()->get();

        return view('subscription.index', compact('plans'));
    }

    /**
     * Store account in application
     *
     * @param SubscriptionStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SubscriptionStoreRequest $request)
    {
        $user = Auth::user();

        $subscription = $request->user()->newSubscription('main', $request->plan);

        if ($request->has('coupon')) {
            $subscription->withCoupon($request->coupon);
        }

        $subscription->create($request->token);

        $plan = $this->planSservice->getByGateway($request->get('plan'));

        $company_name = $request->get('company_name');
        $user_email = $request->get('user_email');
        $user_password = $request->get('user_password');
        $user_name     = $request->get('user_name');

        try {

            $result = $this->saasService->createAccount($company_name, $user_name, $user_email, $user_password, $plan->teams_limit, $plan->storage_limit);

            if ($result->status) {

                $user->application_id = $result->data->company->id;

                if($user->save()){
                    flash(trans('saas.thanks_for_becoming_a_subscriber'))->success();
                }else{
                    flash(trans('saas.error_something_went_wrong'))->error();
                }
            } else {
                flash(trans('saas.error_something_went_wrong'))->error();
            }

        }catch (\Exception $exception){

            flash(trans('saas.error_something_went_wrong'))->error();
        }

        return redirect(route('account.index'));
    }
}
