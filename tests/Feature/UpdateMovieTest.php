<?php

it('update movies', function () {
    $response = $this->post('/api/movies', [
        'title' => 'The Matrix',
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c1/The_Matrix_Poster.jpg',
        'rating' => '8.7',
    ]);

    $id = $response->json()['data']['id'];

    \Pest\Laravel\putJson('/api/movies/' .$id, [
        'title' => 'The Matrix',
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c1/The_Matrix_Poster.jpg',
        'rating' => '8.7',
    ])->assertOk();
});

it('update movies - not found', function () {
    \Pest\Laravel\putJson('/api/movies/999', [
        'title' => 'The Matrix',
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c1/The_Matrix_Poster.jpg',
        'rating' => '8.7',
    ])->assertNotFound();
});


it('update movies - error validation', function () {

    \Pest\Laravel\postJson('/api/movies', [
        'title' => 'The Matrix 2',
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c1/The_Matrix2_Poster.jpg',
        'rating' => '7.7',
    ]);

    \Pest\Laravel\postJson('/api/movies', [
        'title' => 'The Matrix 3',
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c1/The_Matrix3_Poster.jpg',
        'rating' => '6.7',
    ]);


    \Pest\Laravel\putJson('/api/movies/1', [
        'title' => 'The Matrix 3',
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c1/The_Matrix3_Poster.jpg',
        'rating' => '6.7',
    ])->assertStatus(422);
});