<?php

namespace App\Actions\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class StoreMovieAction
{
    public function handle(Request $request): array
    {
        $data = Movie::query()
            ->create(
                $request->only([
                    'title',
                    'description',
                    'rating',
                    'image',
                ])
            );

        return [
            'payload' => [
                'message' => 'Movie berhasil ditambahkan',
                'data' => $data,
            ],
            'status'  => 200,
        ];
    }
}