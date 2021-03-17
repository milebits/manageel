<?php

namespace App\Http\Controllers;

use App\Http\Requests\Package\StoreRequest;
use App\Http\Requests\Package\UpdateRequest;
use App\Models\Package;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Inertia\Response;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function index(): Response
    {
        $this->authorize('viewAny.packages');
        return inertia('Packages/Index', ['packages' => Package::filtered()->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create(): Response
    {
        $this->authorize('store.packages');
        return inertia('Packages/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return Package
     * @throws AuthorizationException
     */
    public function store(StoreRequest $request): Package
    {
        $this->authorize('store.packages');
        return Package::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param Package $package
     * @return Response
     * @throws AuthorizationException
     */
    public function show(Package $package): Response
    {
        $this->authorize('view.packages');
        return inertia('Packages/Show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Package $package
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Package $package): Response
    {
        $this->authorize('update.packages');
        return inertia('Packages/Edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Package $package
     * @return Package
     * @throws AuthorizationException
     */
    public function update(UpdateRequest $request, Package $package): Package
    {
        $this->authorize('update.packages');
        $package->update($request->validated());
        return $package;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Package $package
     * @return bool
     * @throws AuthorizationException|Exception
     */
    public function destroy(Package $package): bool
    {
        $this->authorize('delete.packages');
        return $package->delete();
    }
}
