<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskStoreRequest;
use App\Http\Resources\DeskResource;
use App\Models\Desk;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return DeskResource::collection(Desk::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DeskStoreRequest $request
     * @return DeskResource
     */
    public function store(DeskStoreRequest $request)
    {
        $createdDesk = Desk::create($request->validated());

        return new DeskResource($createdDesk);
    }

    /**
     * Display the specified resource.
     *
     * @param Desk $desk
     * @return DeskResource
     */
    public function show(Desk $desk)
    {
        return new DeskResource($desk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DeskStoreRequest $request
     * @param Desk $desk
     * @return DeskResource
     */
    public function update(DeskStoreRequest $request, Desk $desk)
    {
        $desk->update($request->validated());

        return new DeskResource($desk);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Desk $desk
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Desk $desk)
    {
        $desk->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
