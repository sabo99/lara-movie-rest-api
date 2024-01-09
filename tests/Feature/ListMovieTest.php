<?php

use function Pest\Laravel\getJson;

it('list movies', function () {
    getJson('/api/movies')->assertOk();
});
