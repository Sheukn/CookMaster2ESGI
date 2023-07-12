<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the subscriptions page.
     *
     * @return View
     */
    public function index(): View
    {
        return view("plans");
    }

    /**
     * Display the subscription details for the free plan.
     */
    public function freePlan()
    {
        return [
            'subscription_type' => 'freePlan',
            'price_per_month' => 0.0,
            'annual_price' => 0,
            'advertising' => true,
            'commenting' => true,
            'lessons' => 1,
            'chat' => false,
            'discount' => false,
            'free_delivery' => 'none',
            'kitchen_space' => false,
            'exclusive_events' => false,
            'referral_reward' => false,
            'renewal_bonus' => false,
        ];
    }

    /**
     * Display the subscription details for the starter plan.
     */
    public function starterPlan()
    {
        return [
            'subscription_type' => 'starterPlan',
            'price_per_month' => 9.90,
            'annual_price' => 113,
            'advertising' => false,
            'commenting' => true,
            'lessons' => 5,
            'chat' => true,
            'discount' => false,
            'free_delivery' => 'point_relais',
            'kitchen_space' => false,
            'exclusive_events' => true,
            'referral_reward' => true,
            'renewal_bonus' => false,
        ];
    }

    /**
     * Display the subscription details for the master plan.
     */
    public function masterPlan()
    {
        return [
            'subscription_type' => 'masterPlan',
            'price_per_month' => 19,
            'annual_price' => 220,
            'advertising' => false,
            'commenting' => true,
            'lessons' => 10000,
            'chat' => true,
            'discount' => true,
            'free_delivery' => 'everywhere',
            'kitchen_space' => true,
            'exclusive_events' => true,
            'referral_reward' => true,
            'renewal_bonus' => true,
        ];
    }

    /**
     * Store a new subscription for the authenticated user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subscription_type' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'subscription_price' => ['required', 'string'],
            'price_per_month' => ['required', 'string'],
        ]);

        $user = Auth::user();

        $plan = new Plan([
            'user_id' => $user->id,
            'subscription_type' => $request->subscription_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'subscription_price' => $request->subscription_price,
            'price_per_month' => $request->price_per_month
        ]);

        $plan->save();

        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully.');
    }

    private function getSubscriptionDetails($plan)
    {
        // Logique pour récupérer les détails de la souscription en fonction du plan
        // Par exemple, vous pouvez utiliser une requête à la base de données ou des conditions
        // pour déterminer les détails en fonction du plan sélectionné

        $subscriptionDetails = [];

        if ($plan === 'freePlan') {
            $subscriptionDetails = $this->freePlan();
        } elseif ($plan === 'starterPlan') {
            $subscriptionDetails = $this->starterPlan();
        } elseif ($plan === 'masterPlan') {
            $subscriptionDetails = $this->masterPlan();
        }

        return $subscriptionDetails;
    }

    public function checkout($plan)
    {
        $user = Auth::user();
        $subscriptionDetails = $this->getSubscriptionDetails($plan);

        if ($subscriptionDetails['subscription_type'] === 'freePlan') {
            return redirect()->route('home')->with('success', 'Free plan subscription created');
        } else {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $intent = PaymentIntent::create([
                'amount' => $subscriptionDetails['price_per_month'] * 100,
                'currency' => env('CASHIER_CURRENCY'),
            ]);

            return view('subscription', [
                'clientSecret' => $intent->client_secret,
                'plan' => $subscriptionDetails,
            ]);
        }
    }

    public function success()
    {
        return view('subscription_success');
    }
}
