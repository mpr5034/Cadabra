<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $nextBillignDate = \Cache::remember('next_billing_date_for_' . $user->id, 60, function () use ($user) {

            if ($sub = Auth::user()->subscription('main') != null) {
                $sub = Auth::user()->subscription('main')->asStripeSubscription();
                return Carbon::createFromTimeStamp($sub->current_period_end)->format('Y-m-d');
            }
            return "";
        });

        $invoices = \Cache::remember('invoices_for_' . $user->id, 15, function () use ($user) {
            try {
                return $user->invoicesIncludingPending();
            }catch (\Exception $exception){
                return [];
            }
        });
        return view('account.index')->with('next_billing_date', $nextBillignDate)->with('invoices', $invoices);
    }
}
