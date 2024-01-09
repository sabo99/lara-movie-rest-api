<?php

it('store movies', function () {
    \Pest\Laravel\postJson('/api/movies', [
        'title' => 'The Matrix',
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c1/The_Matrix_Poster.jpg',
        'rating' => '8.7',
    ])->assertOk();

});


it('store movies - error validation', function () {
    \Pest\Laravel\postJson('/api/movies', [
        'title' => null,
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c1/The_Matrix_Poster.jpg',
        'rating' => '8.7',
    ])->assertUnprocessable();
});