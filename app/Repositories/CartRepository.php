<?php

namespace App\Repositories;

class CartRepository
{

    public function getAmount(mixed $product_id)
    {
        return $this->product->find($product_id)->amount;
    }

}
