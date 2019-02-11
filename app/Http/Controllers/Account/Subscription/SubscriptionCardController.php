<?php

namespace App\Http\Controllers\Account\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionCardController extends Controller
{
    public function index()
    {
        return view('account.subscription.card.index');
    }

    public function store(Request $request)
    {
        $request->user()->updateCard($request->token);

        flash(trans('saas.your_card_has_been_updated'))->success();

        return redirect()->route('account.index');
    }
}
