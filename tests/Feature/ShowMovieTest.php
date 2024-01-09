<?php

it('show movies', function () {

    \Pest\Laravel\postJson('/api/movies', [
        'title' => 'The Matrix',
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c1/The_Matrix_Poster.jpg',
        'rating' => '8.7',
    ]);

    \Pest\Laravel\getJson('/api/movies/1')->assertOk();
});


it('show movies - not found', function () {
    \Pest\Laravel\getJson('/api/movies/999')->assertNotFound();
});

