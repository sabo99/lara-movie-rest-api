<?php

namespace App\Http\Controllers;

use App\Actions\Controllers\DeleteMovieAction;
use App\Actions\Controllers\ListMovieAction;
use App\Actions\Controllers\ShowMovieAction;
use App\Actions\Controllers\StoreMovieAction;
use App\Actions\Controllers\UpdateMovieAction;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Actions\Controllers\ListMovieAction  $action
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function index(ListMovieAction $action): JsonResponse
    {
        $result = $action->handle();

        return $this->responseJSON($result['payload'], $result['status'] ?? null, $result['throw'] ?? null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest       $request
     * @param  \App\Actions\Controllers\StoreMovieAction  $action
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function store(StoreMovieRequest $request, StoreMovieAction $action): JsonResponse
    {
        $result = $action->handle($request);

        return $this->responseJSON($result['payload'], $result['status'] ?? null, $result['throw'] ?? null);
    }

    /**
     * Display the specified resource.
     *
     * @param  string                                    $id
     * @param  \App\Actions\Controllers\ShowMovieAction  $action
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function show(string $id, ShowMovieAction $action): JsonResponse
    {
        $result = $action->handle($id);

        return $this->responseJSON($result['payload'], $result['status'] ?? null, $result['throw'] ?? null);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest       $request
     * @param  string                                      $id
     * @param  \App\Actions\Controllers\UpdateMovieAction  $action
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update(UpdateMovieRequest $request, string $id, UpdateMovieAction $action): JsonResponse
    {
        $result = $action->handle($id, $request);

        return $this->responseJSON($result['payload'], $result['status'] ?? null, $result['throw'] ?? null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string                                      $id
     * @param  \App\Actions\Controllers\DeleteMovieAction  $action
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function destroy(string $id, DeleteMovieAction $action): JsonResponse
    {
        $result = $action->handle($id);

        return $this->responseJSON($result['payload'], $result['status'] ?? null, $result['throw'] ?? null);
    }

}
