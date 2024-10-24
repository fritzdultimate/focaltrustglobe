<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChildInvestmentPlanRequest;
use App\Models\ChildInvestmentPlan;
use App\Models\ParentInvestmentPlan;
use Illuminate\Http\Request;

class ChildInvestmentPlanController extends Controller {
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChildInvestmentPlanRequest $request, ChildInvestmentPlan $plan) {
        $crypto_plan = ParentInvestmentPlan::where('name', 'crypto')->first();
        if(!$crypto_plan) {
            ParentInvestmentPlan::create(['name' => 'crypto']);
        }
        $crypto_plan = ParentInvestmentPlan::where('name', 'crypto')->first();
        $plan->name = $request->name;
        $plan->minimum_amount = $request->minimum_amount;
        $plan->maximum_amount = $request->maximum_amount;
        $plan->interest_rate = $request->interest_rate;
        $plan->duration = $request->duration;
        $plan->referral_bonus = $request->referral_bonus;
        $plan->parent_investment_plan_id = $crypto_plan->id;
        $store_plan = $plan->save();
        
        $last_id = ChildInvestmentPlan::latest()->first();

        if($store_plan) {
            return response()->json(
                [
                'success' => [
                    'message' => ["Child investment plan created successfully"],
                    'id' => $last_id->id
                    ]
                ], 201
            );
        }
    }

    public function promo(StoreChildInvestmentPlanRequest $request, ChildInvestmentPlan $plan) {

        $crypto_plan = ParentInvestmentPlan::where('name', 'promo')->first();
        if(!$crypto_plan) {
            ParentInvestmentPlan::create(['name' => 'promo']);
        }
        $crypto_plan = ParentInvestmentPlan::where('name', 'promo')->first();
        
        $exp_date = $request->due_date;
        $plan->name = $request->name;
        $plan->minimum_amount = $request->minimum_amount;
        $plan->maximum_amount = $request->maximum_amount;
        $plan->interest_rate = $request->interest_rate;
        $plan->duration = $request->duration;
        $plan->referral_bonus = $request->referral_bonus;
        $plan->parent_investment_plan_id = $crypto_plan->id;
        $plan->exp_date = $exp_date;
        $store_plan = $plan->save();

        $last_id = ChildInvestmentPlan::latest()->first();

        if($store_plan) {
            return response()->json(
                [
                'success' => [
                    'message' => ["Child investment plan created successfully"],
                    'id' => $last_id->id
                    ]
                ], 201
            );
        }
    }

    public function updatePromo(Request $request) {
        $plan = ChildInvestmentPlan::where('id', $request->id)->first();
        if(!$plan) {
            return response()->json(
                [
                'errors' => [
                    'message' => ["invalid plan"],
                    ]
                ], 401
            );
        }

        ChildInvestmentPlan::where('id', $request->id)->update([
            'name' => $request->name,
            'exp_date' => $request->due_date,
            'minimum_amount' => $request->minimum_amount,
            'maximum_amount' => $request->maximum_amount,
            'interest_rate' => $request->interest_rate,
            'duration' => $request->duration,
            'referral_bonus' => $request->referral_bonus,
            'expired' => $request->expired
        ]);
        

        
        return response()->json(
            [
            'success' => [
                'message' => ["investment plan edited successfully"],
                ]
            ], 201
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParentInvestmentPlan  $parentInvestmentPlan
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChildInvestmentPlanRequest $request, ChildInvestmentPlan $plan) {
        $plan->where('id', $request->id)
        ->update([
            'name' => $request->name,
            'minimum_amount' => $request->minimum_amount,
            'maximum_amount' => $request->maximum_amount,
            'interest_rate' => $request->interest_rate,
            'duration' => $request->duration,
            'referral_bonus' => $request->referral_bonus
        ]);
        

        return response()->json([
            'success' => [
                ['Child investment plan updated successfully']
            ]
        ]);
    }

    public function getPlans(Request $request, ParentInvestmentPlan $parentPlans, ChildInvestmentPlan $childPlans, $parent = null) {
        $parent = $parentPlans->where('name', $parent)->first();

        if($parent) {
            return $childPlans->where('parent_plan_id', $parent->id)->get();
        }
        return [];
    }

    public function showPlan(ChildInvestmentPlan $childPlans, $id = null) {
        return $childPlans->where('id', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParentInvestmentPlan  $parentInvestmentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ChildInvestmentPlan $childInvestmentPlan) {
        $childInvestmentPlan->where('id', $request->id)->delete();

        return response()->json([
            'success' => [
                ['Child investment plan deleted successfully']
            ]
        ]);
    }
}
