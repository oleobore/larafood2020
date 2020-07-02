<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class PlanController extends Controller
{

    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate();
        return view('admin.pages.plans.index',[
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    public function show($slug)
    {
        $plan = $this->repository->where('slug',$slug)->first();
        //dd($plan);

        if (!$plan) 
            return redirect()->back();
        
        return view('admin.pages.plans.show',[
            'plan' => $plan
        ]);

    }

    public function destroy($slug)
    {
        $plan = $this->repository
                        ->with('details')
                        ->where('slug',$slug)
                        ->first();

        if (!$plan) 
            return redirect()->back();

        if ($plan->details->count() > 0) {
            return redirect()
                    ->back()
                    ->with('error','Existem detalhes relacionados a este plano');
        }
        
        $plan->delete();

        return redirect()->route('plans.index');

    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index',[
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }

    public function edit($slug)
    {
        $plan = $this->repository->where('slug',$slug)->first();
        //dd($plan);

        if (!$plan) 
            return redirect()->back();
        
        return view('admin.pages.plans.edit',[
            'plan' => $plan,
        ]);

    }

    public function update(StoreUpdatePlan $request, $slug)
    {
        $plan = $this->repository->where('slug',$slug)->first();

        if (!$plan) 
            return redirect()->back();
        
        $plan->update($request->all());
        
        return redirect()->route('plans.index');

    }
}
