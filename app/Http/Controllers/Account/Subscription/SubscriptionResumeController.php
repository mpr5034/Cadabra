<?php

namespace App\Http\Controllers\Account\Subscription;

use App\Service\SaasApplicationService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionResumeController extends Controller
{

    private $saasService;

    public function __construct(SaasApplicationService $saasService)
    {
        $this->saasService = $saasService;
    }

    public function index()
    {
        return view('account.subscription.resume.index');
    }

    public function store(Request $request)
    {
        $request->user()->subscription('main')->resume();

        $user = Auth::user();

        try {

            $result = $this->saasService->resumeAccount($user);

            if ($result->status) {
                flash(trans('saas.your_subscription_has_been_resumed'))->success();
            } else {
                flash(trans('saas.error_something_went_wrong'))->error();
            }

        } catch (\Exception $exception) {
            flash(trans('saas.error_something_went_wrong'))->error();
        }




        return redirect()->route('account.index');
    }
}
