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
}