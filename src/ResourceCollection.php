<?php

namespace TeamZac\OpenZac;

use Illuminate\Support\Collection;

class ResourceCollection extends Collection
{
    public $links;
    public $metadata;

    public static function fromJson($json)
    {
        $resources = collect($json->data)->map(function($item) {
            return new Resource($item);
        });

        return (new static($resources))
            ->setLinks($json->links)
            ->setMetadata($json->meta);
    }

    public function setLinks($links)
    {
        $this->links = $links;
        return $this;
    }

    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }
    
}