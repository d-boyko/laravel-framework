<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @property mixed $release_date
 * @property mixed $title
 */
class VersionResource extends JsonResource
{
    public static $wrap = 'test';

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
          'title' => $this->title,
          'release_date' => $this->release_date->format('d.m.Y'),
          'meta' => $this->when($this->title == '8.61', function() {
              return 1;
          }, function() {
            return 2;
          }),
        ];
    }
}
