<?php

test('has a name attribute', function () {
    $movie = new \App\Models\Movie([
        'title' => 'Back to the Future',
        'description' => 'This is description',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/d/d2/Back_to_the_Future.jpg',
        'rating' => '8.5',
    ]);
    expect(true)->toBeTrue();
    expect($movie->title)->toBe('Back to the Future');
    expect($movie->description)->toBe('This is description');
    expect($movie->image)->toBe('https://upload.wikimedia.org/wikipedia/en/d/d2/Back_to_the_Future.jpg');
    expect($movie->rating)->toBe(8.5);
});
