<?php declare(strict_types=1);

namespace App\Component\Product\Persistence\Csv;

use App\Component\Category\Business\CategoryBusinessFacadeInterface;
use App\Shared\Dto\CategoryDataTransferObject;

class ValidatorCsv
{
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;

    public function whenNoExistInDb(CategoryDataTransferObject $categoryDto): CategoryDataTransferObject
    {
        $category = $categoryDto;
        if(!isset($category)) {
            $category = new CategoryDataTransferObject();
            $category->setName($csvDto->getCategoryName());
            $this->categoryBusinessFacade->save($category);
        }
    }

}