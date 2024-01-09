<?php

use Illuminate\Support\Carbon;

if (!function_exists('httpResponseStatus')) {
    /**
     * @param  int  $statusCode
     *
     * @return string
     */
    function httpResponseStatusCodes(int $statusCode): string
    {
        return [200 => 'OK.',
                201 => 'Created.',
                400 => 'Bad Request.',
                401 => 'Unauthenticated.',
                403 => 'Forbidden.',
                404 => 'Not Found.',
                405 => 'Method Not Allowed.',
                422 => 'Validation Errors.',
                429 => 'Too Many Requests.',
                500 => 'Internal Server Error.',
                501 => 'Not Implemented.',
                502 => 'Bad Gateway.',
                503 => 'Service Unavailable.',
        ][$statusCode];
    }
}


if (!function_exists('convertDate')) {
    /**
     * @param  string|null  $date
     * @param  string       $format
     * @param  bool         $isTranslated
     *
     * @return string|null
     */
    function convertDate(mixed $date, string $format = 'd F Y', bool $isTranslated = true): ?string
    {
        if ($isTranslated) {
            return $date ? Carbon::parse($date)->translatedFormat($format) : null;
        }

        return $date ? Carbon::parse($date)->format($format) : null;
    }
}
