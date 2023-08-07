<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreDepartmentRequest;
use App\Http\Requests\V1\UpdateDepartmentRequest;
use App\Http\Resources\V1\DepartmentResource;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DepartmentResource::collection(Department::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create($request->validated());

        return new DepartmentResource($department);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return new DepartmentResource($department);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());

        return new DepartmentResource($department);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return response()->noContent();
    }
}
