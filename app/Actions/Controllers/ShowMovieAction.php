<?php

namespace App\Actions\Controllers;

use App\Models\Movie;

class ShowMovieAction
{
    public function handle(string $id): array
    {
        $data = Movie::query()->findOrFail($id);

        return [
            'payload' => [
                'data' => $data,
            ],
            'status'  => 200,
        ];
    }
}