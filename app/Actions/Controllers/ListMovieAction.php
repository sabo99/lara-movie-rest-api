<?php

namespace App\Actions\Controllers;

use App\Models\Movie;

class ListMovieAction
{
    public function handle(): array
    {
        $data = Movie::all();

        return [
            'payload' => [
                'data' => $data,
            ],
            'status'  => 200,
        ];
    }
}