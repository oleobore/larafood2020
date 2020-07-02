<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateDetailPlan;
use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($slugPlan)
    {
        if (!$plan = $this->plan->where('slug',$slugPlan)->first()) {
            return redirect()->back();
        }

        //$details = $plan->details();
        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    public function create($slugPlan)
    {   
        if (!$plan = $this->plan->where('slug',$slugPlan)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan,
        ]);
    }

    public function store(StoreUpdateDetailPlan $request, $slugPlan)
    {   
        if (!$plan = $this->plan->where('slug',$slugPlan)->first()) {
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->slug);
    }

    public function edit($slugPlan, $idDetail)
    {   
        $plan = $this->plan->where('slug',$slugPlan)->first();
        $detail = $this->repository->find($idDetail);
        
        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    public function update(StoreUpdateDetailPlan $request, $slugPlan, $idDetail)
    {   
        $plan = $this->plan->where('slug',$slugPlan)->first();
        $detail = $this->repository->find($idDetail);
        
        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->update($request->all());
        return redirect()->route('details.plan.index', $plan->slug);

    }

    public function show($slugPlan, $idDetail)
    {   
        $plan = $this->plan->where('slug',$slugPlan)->first();
        $detail = $this->repository->find($idDetail);
        
        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    public function destroy($slugPlan, $idDetail)
    {   
        $plan = $this->plan->where('slug',$slugPlan)->first();
        $detail = $this->repository->find($idDetail);
        
        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->delete();

        return redirect()->route('details.plan.index', $plan->slug);

    }
}
