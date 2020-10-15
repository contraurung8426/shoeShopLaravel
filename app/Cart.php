<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $giohang = ['qty' => 0, 'price' => $item->unit_price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $giohang = $this->items[$id];
            }
        }
//        dd($giohang);
        $giohang['qty']++;
//        dd($giohang);
        if ($item->promotion_price > 0)
            $giohang['price'] = $item->promotion_price * $giohang['qty'];
        else
            $giohang['price'] = $item->unit_price * $giohang['qty'];
//        dd($giohang);
        $this->items[$id] = $giohang;
//        dd($this);
        $this->totalQty++;
//        dd($this);
        if ($item->promotion_price > 0)
            $this->totalPrice += $item->promotion_price;
        else
            $this->totalPrice += $item->unit_price;
    }

    //Xoa 1
    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function UpdateCart($id, $qty)
    {
//        dd($this->items[1]);
        $hieu = abs($this->items[$id]['qty'] - $qty);
        $sobitru = abs($this->items[$id]['qty'] - $this->items[$id]['qty'] - $qty);
        $price = $this->items[$id]['item']->promotion_price;
        if ($price == 0) {
            $price = $this->items[$id]['item']->unit_price;
        }
        if ($qty == 0) {
            $this->removeItem($id);
        } else if ($this->items[$id]['qty'] > $qty) {
            $this->items[$id]['qty'] = $sobitru;
            $this->items[$id]['price'] = ($price * $sobitru);
            $this->totalQty -= $hieu;
            $this->totalPrice -= $price * $hieu;
        } else if ($this->items[$id]['qty'] < $qty) {
            $this->items[$id]['qty'] = $sobitru;
            $this->items[$id]['price'] = ($price * $sobitru);
            $this->totalQty += $hieu;
            $this->totalPrice += $price * $hieu;
        }
    }

//Xoa nhieu
    public
    function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

}
