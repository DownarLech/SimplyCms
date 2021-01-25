<?php


namespace App\Models;


class ProductRepository
{
    private array $productList;


    public function __construct()
    {

    }


    public function loadData()
    {

        $string = file_get_contents("/home/developer/PhpstormProjects/SimplyCms/productList.json");
        if ($string === false) {
            throw new \Exception("Load file to string failed.");
        }

        $json_a = json_decode($string, true);
        if ($json_a === null) {
            throw new \Exception("Decode json file failed");
        }

        $this->productList=$json_a;
    }


    public function getProductList(): array
    {
        $this->loadData();
        return $this->productList;
    }


    public function getProduct(int $id) {

        if(!$this->hasProduct($id)) {
            throw new \Exception("This product is no in the database.");
        }
        return $this->productList[$id];
    }


    public function hasProduct(int $id) : bool {

        return isset($this->productList[$id]);

    }

}