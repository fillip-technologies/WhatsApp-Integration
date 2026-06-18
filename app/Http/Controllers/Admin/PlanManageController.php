<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanManageController extends Controller
{
    public function listPlan(){
        $plans = Plan::paginate(10);
        return view('admin.plans.list',compact('plans'));
    }
    public function CreatePlan(){
    return view('admin.plans.create');
    }

    public function storePlan(Request $request)
{
    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'price'         => 'required|numeric|min:0',
        'description'   => 'required|string',
        'plans'         => 'required|string',
        'message_limit' => 'required|integer|min:0',
        'validity_day'  => 'required|integer|min:1',
        'feature'       => 'required|array|min:1',
        'button'=>'required|string',
        'feature.*'     => 'required|string|max:255',
    ]);

    Plan::create([
        'name'          => $validated['name'],
        'price'         => $validated['price'],
        'description'   => $validated['description'],
        'plans'         => $validated['plans'],
        'button'=>$validated['button'],
        'message_limit' => $validated['message_limit'],
        'validity_day'  => $validated['validity_day'],
        'feature'       => $validated['feature'],
    ]);

    return redirect()
        ->back()
        ->with('success', 'Plan created successfully.');
}

 public function EditPlan($id)
{
    $plan = Plan::findOrFail($id);
    return view('admin.plans.edit',compact('plan'));
}

   public function updatePlan(Request $request, $id)
{
    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'price'         => 'required|numeric|min:0',
        'description'   => 'required|string',
        'plans'         => 'required|string',
         'button'=>'required|string',
        'message_limit' => 'required|integer|min:0',
        'validity_day'  => 'required|integer|min:1',
        'feature'       => 'required|array|min:1',
        'feature.*'     => 'required|string|max:255',
    ]);

    $plan = Plan::findOrFail($id);

    $plan->update([
        'name'          => $validated['name'],
        'price'         => $validated['price'],
        'description'   => $validated['description'],
        'plans'         => $validated['plans'],
        'button'=>$validated['button'],
        'message_limit' => $validated['message_limit'],
        'validity_day'  => $validated['validity_day'],
        'feature'       => $validated['feature'],
    ]);

    return redirect()
        ->route('plan.list')
        ->with('success', 'Plan updated successfully.');
}

    public function deletePlan($id)
{
    $plan = Plan::findOrFail($id);
    $plan->delete();
    return redirect()
        ->back()
        ->with('success', 'Plan deleted successfully.');
}
}
