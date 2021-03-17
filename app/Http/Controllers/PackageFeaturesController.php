<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageFeature\StoreRequest;
use App\Http\Requests\PackageFeature\UpdateRequest;
use App\Models\PackageFeature;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Inertia\Response;

class PackageFeaturesController extends Controller
{
    /**
     * @return Response
     * @throws AuthorizationException
     */
    public function index(): Response
    {
        $this->authorize('viewAny.package_features');
        return inertia('Packages/Features/Index', ['packageFeatures' => PackageFeature::filtered()->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create(): Response
    {
        $this->authorize('store.package_features');
        return inertia('Packages/Features/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return PackageFeature|null
     * @throws AuthorizationException
     */
    public function store(StoreRequest $request): ?PackageFeature
    {
        $this->authorize('store.package_features');
        return PackageFeature::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param PackageFeature $packageFeature
     * @return Response
     * @throws AuthorizationException
     */
    public function show(PackageFeature $packageFeature): Response
    {
        $this->authorize('view.package_features');
        return inertia('Packages/Features/Show', compact('packageFeature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PackageFeature $packageFeature
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(PackageFeature $packageFeature): Response
    {
        $this->authorize('update.package_features');
        return inertia('Packages/Features/Edit', compact('packageFeature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param PackageFeature $packageFeature
     * @return PackageFeature|null
     * @throws AuthorizationException
     */
    public function update(UpdateRequest $request, PackageFeature $packageFeature): ?PackageFeature
    {
        $this->authorize('update.package_features');
        $packageFeature->update($request->validated());
        return $packageFeature;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PackageFeature $packageFeature
     * @return bool
     * @throws AuthorizationException|Exception
     */
    public function destroy(PackageFeature $packageFeature): bool
    {
        $this->authorize('delete.package_features');
        return $packageFeature->delete();
    }
}
