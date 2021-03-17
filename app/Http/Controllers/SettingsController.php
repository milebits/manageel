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
        $this->authorize('viewAny.settings');
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
        $this->authorize('store.settings');
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
        $this->authorize('store.settings');
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
        $this->authorize('view.settings');
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
        $this->authorize('update.settings');
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
        $this->authorize('update.settings');
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
        $this->authorize('viewAny.settings');
        return $setting->delete();
    }
}
