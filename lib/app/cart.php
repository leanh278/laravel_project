<?php
namespace App;
use App\Models\Model\stock;

class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;

        }
    }

    public function AddCart($product, $id){
        $newProduct = ['quanty'=>0,'price'=> $product->prod_price, 'productInfo'=>$product,'sumprice'=>$product->prod_price];
        if($this->products){
            if(array_key_exists($id, $this->products)){
                $newProduct = $this->products[$id];
            }
        }
        if(stock::where('stock_prod', $id)->first()->stock_quantity != $newProduct['quanty'])
        {
        $newProduct['quanty']++;
        $newProduct['sumprice'] = $newProduct['quanty'] * $product->prod_price;
        $newProduct['price'] = $product->prod_price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->prod_price;
        $this->totalQuanty++ ;
        }
    }

    public function DeleteCart($id){
        $this->totalQuanty -=  $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['sumprice'];
        unset($this->products[$id]);
    }

    public function NextCart($id){
        if(stock::where('stock_prod', $id)->first()->stock_quantity != $this->products[$id]['quanty'])
        {
            $this->totalPrice -= $this->products[$id]['sumprice'];
           
            $this->products[$id]['quanty']++;
            $this->products[$id]['sumprice'] += $this->products[$id]['price'];
    
            $this->totalQuanty++;
            $this->totalPrice += $this->products[$id]['sumprice'];
        }
        
    }

    public function PrevCart($id){
        
        if($this->products[$id]['quanty'] != 1){
            $this->totalPrice -= $this->products[$id]['sumprice'];
       
            $this->products[$id]['quanty']--;
            $this->products[$id]['sumprice'] -= $this->products[$id]['price'];
    
            $this->totalQuanty--;
            $this->totalPrice += $this->products[$id]['sumprice'];
        }
       
        
    }

    

}
?>