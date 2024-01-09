<?php

namespace App\Actions\Controllers;

use App\Models\Movie;

class DeleteMovieAction
{
    public function handle(string $id): array
    {
        $data = Movie::query()->find($id);

        $data->delete();

        return [
            'payload' => [
                'message' => 'Movie berhasil dihapus.',
            ],
            'status'  => 200,
        ];
    }
}