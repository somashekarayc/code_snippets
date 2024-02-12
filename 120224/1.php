<?php

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // All user cards
    public function cards()
    {
        // Queries
        $active_plan = Plan::where('plan_id', Auth::user()->plan_id)->first();
        $plan = User::where('user_id', Auth::user()->user_id)->first();
        $active_plan = json_decode($plan->plan_details);

        // Check active plan in user
        if ($active_plan != null) {

            // Queries
            $business_cards = DB::table('business_cards')
                ->join('users', 'business_cards.user_id', '=', 'users.user_id')
                ->select('users.user_id', 'users.plan_validity', 'business_cards.*')
                ->where('business_cards.user_id', Auth::user()->user_id)->where('business_cards.card_type', 'vcard')->where('business_cards.status', 1)->where('business_cards.card_status', '!=', 'deleted')->orderBy('business_cards.id', 'desc')->get();

            // Queries
            $settings = Setting::where('status', 1)->first();

            return view('user.cards.cards', compact('business_cards', 'settings'));
        } else {
            return redirect()->route('user.plans');
        }
    }

    // All user stores
    public function stores()
    {
        // Queries
        $active_plan = Plan::where('plan_id', Auth::user()->plan_id)->first();
        $plan = User::where('user_id', Auth::user()->user_id)->first();
        $active_plan = json_decode($plan->plan_details);

        // Check active plan in user
        if ($active_plan != null) {
            $business_cards = DB::table('business_cards')
                ->join('users', 'business_cards.user_id', '=', 'users.user_id')
                ->select('users.user_id', 'users.plan_validity', 'business_cards.*')
                ->where('business_cards.user_id', Auth::user()->user_id)->where('business_cards.card_type', 'store')->where('business_cards.status', 1)->where('business_cards.card_status', '!=', 'deleted')->orderBy('business_cards.id', 'desc')->get();

            // Queries
            $settings = Setting::where('status', 1)->first();

            return view('user.stores.index', compact('business_cards', 'settings'));
        } else {
            return redirect()->route('user.plans');
        }
    }

        // Plans
        public function plans()
        {
            // Queries
            $plans = DB::table('plans')->where('is_private', 0)->where('status', 1)->get();
            $config = DB::table('config')->get();
            $free_plan = Transaction::where('user_id', Auth::user()->id)->where('transaction_amount', '0')->count();
            $plan = User::where('user_id', Auth::user()->user_id)->first();
            $active_plan = json_decode($plan->plan_details);
            $settings = Setting::where('status', 1)->first();
            $currency = Currency::where('iso_code', $config[1]->config_value)->first();
            $remaining_days = 0;
    
            // Check active plan in user
            if (isset($active_plan)) {
    
                // Get plan validity into current date (remaining days)
                $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
                $current_date = Carbon::now();
                $remaining_days = $current_date->diffInDays($plan_validity, false);
            }
    
            return view('user.plans.plans', compact('plans', 'settings', 'currency', 'active_plan', 'remaining_days', 'config', 'free_plan'));
        }
}
