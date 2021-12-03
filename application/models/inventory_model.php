<?php

class Inventory_model extends CI_Model
{
	function sc_control($table)
	{
		return  $this->db->get($table);
	}

	public function update($data, $table, $where)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	function getProduk()
	{
		$query = $this->db->query("select i_product.id_product, i_product.shipref, i_product.product_name, i_product.description, i_product.storage_loc, i_product.quantity, i_volume_product.l,i_volume_product.w,i_volume_product.h,i_volume_product.pallet,i_volume_product.cbm,i_volume_product.total_cbm from i_product INNER JOIN i_volume_product On i_product.id_product = i_volume_product.id_product");
		return $query->result();
	}

	//input data dari excel dengan metode array()
	public function inputArray($data, $table)
	{
		return $this->db->insert_batch($data, $table);
	}

	public function table()
	{
		$query = $this->db->query("SELECT i_product.id_product, i_product.product_name,i_product.description,i_product.storage_loc,i_product.quantity,i_volume_product.l,i_volume_product.w,i_volume_product.h,i_volume_product.cbm,i_volume_product.total_cbm,i_volume_product.pallet,i_volume_product.tanggal FROM i_product INNER JOIN i_volume_product ON i_product.id_product = i_volume_product.id_product;");
		return $query->result();
	}

	public function inputData($data, $table)
	{
		return $this->db->insert($table, $data);
	}

	//cari data berdasarkan inputan 
	public function cari($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function cek($shipref, $product_number)
	{
		$this->db->select("*");
		$this->db->from("i_stock");
		$this->db->where(array("i_stock.shipref" => $shipref, 'i_stock.product_number' => $product_number));
		return $this->db->get();
	}

	public function cekDq($awb)
	{
		$this->db->select("*");
		$this->db->from("i_data_requirment");
		$this->db->where(array("i_data_requirment.awb" => $awb, 'i_delivery_order.awb' => $awb));
		return $this->db->get();
	}

	// delete data quantity yang telah habis
	public function delData($where, $table)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}
}
