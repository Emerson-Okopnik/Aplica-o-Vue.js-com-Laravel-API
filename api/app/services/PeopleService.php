<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\People;

class PeopleService
{
    private People $People;

    public function __construct(People $People)
    {
        $this->People = $People;
    }
    
    public function create(array $data): int
    {
        return $this->People->create($data)->id;
    }

    public function update(int $id, array $data): int
    {
       return $this->People->find($id)->update($data);
    }

    public function delete(int $id): int
    {
       return $this->People->find($id)->delete();
    }

    public function findById(int $id): array
    {
        return $this->People->find($id)->toArray();
    }

    public function findAll(): array
    {
        return $this->People->all()->toArray();
    }
}