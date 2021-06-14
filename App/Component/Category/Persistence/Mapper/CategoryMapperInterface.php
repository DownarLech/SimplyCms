<?php declare(strict_types=1);

namespace App\Component\Category\Persistence\Mapper;

use App\Shared\Dto\CategoryDataTransferObject;
use Generated\Category;

interface CategoryMapperInterface
{
    public function mapFromPropel(Category $category) : CategoryDataTransferObject;

}