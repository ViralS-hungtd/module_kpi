<?php

namespace Modules\Description\Repository;

use App\Repositories\Base\BaseRepository;
use Modules\Description\Entities\Description;

class DescriptionRepository extends BaseRepository implements DescriptionRepositoryInterface
{
    public function getModel()
    {
        return Description::class;
    }
}
