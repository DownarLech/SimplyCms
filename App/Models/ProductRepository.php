<?php

declare(strict_types=1);


namespace App\Models;

use App\Models\Dto\ProductDataTransferObject;
use App\Models\Mapper\ProductMapper;

class ProductRepository
{
    private array $productList;
    private ProductMapper $productMapper;


    public function __construct()
    {
        $url = __DIR__ ."/../../productList.json";
        $data = file_get_contents($url);
        if ($data === false) {
            throw new \Exception("Load file to string failed.");
        }

        $json_a = json_decode($data, true);
        if ($json_a === null) {
            throw new \Exception("Decode json file failed");
        }

        //$this->productList=$json_a;

        $this->productMapper = new ProductMapper();

        if(!empty($json_a)) {
            foreach ($json_a as $product) {
                $this->productList[(int)$product['id']] = $this->productMapper->map($product);
            }
        }
    }



    public function getProductList(): array
    {
        return $this->productList;
    }


    public function getProduct(int $id) : ProductDataTransferObject
    {

        if(!$this->hasProduct($id)) {
            throw new \Exception("This product is no in the database.");
        }
        return $this->productList[$id];
    }


    public function hasProduct(int $id) : bool {

        return isset($this->productList[$id]);

    }
}