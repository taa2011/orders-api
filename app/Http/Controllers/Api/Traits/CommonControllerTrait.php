<?php

namespace App\Http\Controllers\Api\Traits;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

trait CommonControllerTrait
{
    protected function toResponse($content)
    {
        if (!is_array($content) && get_class($content) === AnonymousResourceCollection::class && get_class($content->resource) === LengthAwarePaginator::class) {
            $content = $this->addMeta($content);
        }
        return response($content, 200, ['Content-Type' => 'application/json; charset=UTF-8']);
    }

    protected function addMeta(AnonymousResourceCollection $content): array
    {
        return [
            'data' => $content->jsonSerialize(),
            'meta' => [
                'currentPage' => $content->currentPage(),
                'from' => $content->firstItem(),
                'lastPage' => $content->lastPage(),
                'perPage' => (int)$content->perPage(),
                'to' => $content->lastItem(),
                'total' => $content->total()
            ]
        ];
    }

}
