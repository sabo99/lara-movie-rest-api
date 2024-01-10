<?php

namespace App\Actions\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class ListMovieAction
{
    public function handle(Request $request): array
    {
        $query = $request->query('query');

        $data = Movie::query()
            ->search($query)
            ->get();

        return [
            'payload' => [
                'data' => $data,
            ],
            'status'  => 200,
        ];
    }
}