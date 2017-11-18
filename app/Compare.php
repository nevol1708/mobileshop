<?php

namespace App;

class Compare
{
	public $items = null;

	public function __construct($oldCompare) {
		if($oldCompare){
			$this->items = $oldCompare->items;
		}
	}

	public function add($item, $id) {
		$compare = ['item' => $item];
		$this->items[$id] = $compare;
	}

	public function removeItem($id){
		unset($this->items[$id]);
	}
}