<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HasResponseJson
{
    /**
     * @param  mixed|array      $payload  ['message', 'data', 'meta' => ['limit', 'offset', 'filtered_total','total'], 'errors']
     * @param  int              $statusCode
     * @param  \Throwable|null  $th
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function responseJson(array $payload = [], int $statusCode = 200, ?\Throwable $th = null): JsonResponse
    {
        // Throw Exception if in local and debug mode
        if ((config('app.env') == 'test' || config('app.env') == 'local' || config('app.debug')) && $th != null) {
            throw $th;
        }

        if ($statusCode >= 200 && $statusCode < 400) {
            if (!empty($payload['meta'])) {
                $payload['meta'] = [
                    'limit'          => (int) $payload['meta']['limit'],
                    'offset'         => (int) $payload['meta']['offset'],
                    'filtered_total' => (int) $payload['meta']['filtered_total'],
                    'total'          => (int) $payload['meta']['total'],
                ];
            }

            return response()->json([
                'message' => $payload['message'] ?? $this->message($statusCode),
                'data'    => $payload['data'] ?? [],
            ], $statusCode);

        } elseif ($statusCode >= 400 && $statusCode < 500) {
            return response()->json([
                'message' => $payload['message'] ?? $this->message($statusCode),
                'errors'  => $payload['errors'] ?? [],
            ], $statusCode);
        } else {
            return response()->json([
                'message' => $payload['message'] ?? $this->message($statusCode),
            ], $statusCode);
        }
    }

    /**
     * @param  int  $statusCode
     *
     * @return string $message
     */
    private function message(int $statusCode): string
    {
        return httpResponseStatusCodes($statusCode);
    }

}