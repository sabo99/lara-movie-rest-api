<?php

namespace App\Actions\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class UpdateMovieAction
{
    public function handle(string $id, Request $request): array
    {
        $data = Movie::query()
            ->findOrFail($id);

        $data
            ->update([
                'title'       => $request->input('title') ?? $data->title,
                'description' => $request->input('description') ?? $data->description,
                'rating'      => $request->input('rating') ?? $data->rating,
                'image'       => $request->input('image') ?? $data->image,
            ]);

        return [
            'payload' => [
                'message' => 'Movie berhasil diupdate',
                'data'    => $data,
            ],
            'status'  => 200,
        ];
    }
}