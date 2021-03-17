<?php

namespace App\Http\Controllers;

use App\Http\Requests\Setting\StoreRequest;
use App\Http\Requests\Setting\UpdateRequest;
use App\Models\Setting;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Inertia\Response;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function index(): Response
    {
        $this->authorize('viewAny', Setting::class);
        return inertia('Settings/Index', ['settings', Setting::filtered()->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create(): Response
    {
        $this->authorize('store', Setting::class);
        return inertia('Settings/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return Setting
     * @throws AuthorizationException
     */
    public function store(StoreRequest $request): Setting
    {
        $this->authorize('store', Setting::class);
        return Setting::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param Setting $setting
     * @return Response
     * @throws AuthorizationException
     */
    public function show(Setting $setting): Response
    {
        $this->authorize('view', $setting);
        return inertia('Settings/Show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Setting $setting
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Setting $setting): Response
    {
        $this->authorize('update', $setting);
        return inertia('Setting/Update', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Setting $setting
     * @return Setting
     * @throws AuthorizationException
     */
    public function update(UpdateRequest $request, Setting $setting): Setting
    {
        $this->authorize('update', $setting);
        $setting->update($request->validated());
        return $setting;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setting $setting
     * @return bool
     * @throws AuthorizationException|Exception
     */
    public function destroy(Setting $setting): bool
    {
        $this->authorize('viewAny', $setting);
        return $setting->delete();
    }

    /**
     * @param Setting $setting
     * @return bool
     * @throws AuthorizationException
     */
    public function forceDestroy(Setting $setting): bool
    {
        $this->authorize('forceDelete', $setting);
        return $setting->forceDelete();
    }
}
