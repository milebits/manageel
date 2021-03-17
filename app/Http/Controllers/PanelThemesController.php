<?php

namespace App\Http\Controllers;

use App\Http\Requests\PanelTheme\StoreRequest;
use App\Http\Requests\PanelTheme\UpdateRequest;
use App\Models\PanelTheme;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Inertia\Response;

class PanelThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function index(): Response
    {
        $this->authorize('viewAny', PanelTheme::class);
        return inertia('PanelThemes/Index', ['panelThemes' => PanelTheme::filtered()->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create(): Response
    {
        $this->authorize('store', PanelTheme::class);
        return inertia('PanelThemes/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return PanelTheme
     * @throws AuthorizationException
     */
    public function store(StoreRequest $request): PanelTheme
    {
        $this->authorize('store', PanelTheme::class);
        return PanelTheme::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param PanelTheme $panelTheme
     * @return Response
     * @throws AuthorizationException
     */
    public function show(PanelTheme $panelTheme): Response
    {
        $this->authorize('view', $panelTheme);
        return inertia('PanelThemes/Show', compact('panelTheme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PanelTheme $panelTheme
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(PanelTheme $panelTheme): Response
    {
        $this->authorize('update', $panelTheme);
        return inertia('PanelThemes/Update', compact('panelTheme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param PanelTheme $panelTheme
     * @return PanelTheme
     * @throws AuthorizationException
     */
    public function update(UpdateRequest $request, PanelTheme $panelTheme): PanelTheme
    {
        $this->authorize('update', $panelTheme);
        $panelTheme->update($request->validated());
        return $panelTheme;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PanelTheme $panelTheme
     * @return bool
     * @throws AuthorizationException|Exception
     */
    public function destroy(PanelTheme $panelTheme): bool
    {
        $this->authorize('delete', $panelTheme);
        return $panelTheme->delete();
    }

    /**
     * @param PanelTheme $panelTheme
     * @return bool
     * @throws AuthorizationException
     */
    public function forceDestroy(PanelTheme $panelTheme): bool
    {
        $this->authorize('forceDelete', $panelTheme);
        return $panelTheme->forceDelete();
    }
}
