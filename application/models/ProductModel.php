<?php

class ProductModel extends CI_Model
{

  public function empty_response()
  {
    $response['status'] = 502;
    $response['error'] = true;
    $response['message'] = 'Field tidak boleh kosong';
    return $response;
  }

  public function addProduct($name, $price, $description, $pic)
  {

    if (empty($name) || empty($price) || empty($description) || empty($pic)) {
      return $this->empty_response();
    } else {
      $filename = $this->random() . ".jpeg";
      $path = $_SERVER['DOCUMENT_ROOT'] . str_replace(
        basename($_SERVER['SCRIPT_NAME']),
        "",
        $_SERVER['SCRIPT_NAME']
      ) . "assets/upload/images/" . $filename;
      if (file_put_contents($path, base64_decode($pic))) {
        $data = array(
          "product_name" => $name,
          "price" => $price,
          "description" => $description,
          "pic" => $filename
        );

        $insert = $this->db->insert("product", $data);

        if ($insert) {
          $response['status'] = 200;
          $response['error'] = false;
          $response['message'] = 'Data mahasiswa berhasil ditambahkan.';
          return $response;
        } else {
          $response['status'] = 502;
          $response['error'] = true;
          $response['message'] = 'Data mahasiswa gagal ditambahkan.';
          return $response;
        }
      }
    }
  }

  public function getProducts()
  {

    $products = $this->db->get("product")->result();
    $response['status'] = 200;
    $response['error'] = false;
    $response = $products;
    return $response;
  }

  public function editProduct($id, $name, $price, $description, $pic, $_pic)
  {

    if (empty($id) || empty($name) || empty($price) || empty($description) || empty($_pic)) {
      return $this->empty_response();
    } else {
      $path = $_SERVER['DOCUMENT_ROOT'] . str_replace(
        basename($_SERVER['SCRIPT_NAME']),
        "",
        $_SERVER['SCRIPT_NAME']
      ) . "assets/upload/images/" . $_pic;

      $where = array(
        "product_id" => $id
      );

      $data = array(
        "product_name" => $name,
        "price" => $price,
        "description" => $description,
        "pic" => $_pic
      );

      if (empty($pic)) {
        $this->db->where($where);
        $update = $this->db->update("product", $data);
        if ($update) {
          $response['status'] = 200;
          $response['error'] = false;
          $response['message'] = 'Data mahasiswa berhasil diubah.';
          return $response;
        } else {
          $response['status'] = 502;
          $response['error'] = true;
          $response['message'] = 'Data mahasiswa gagal diubah.';
          return $response;
        }
      } else {
        if (file_put_contents($path, base64_decode($pic))) {
          $this->db->where($where);
          $update = $this->db->update("product", $data);
          if ($update) {
            $response['status'] = 200;
            $response['error'] = false;
            $response['message'] = 'Data mahasiswa berhasil diubah.';
            return $response;
          } else {
            $response['status'] = 502;
            $response['error'] = true;
            $response['message'] = 'Data mahasiswa gagal diubah.';
            return $response;
          }
        }
      }
    }
  }

  public function getSingleProduct($id)
  {

    $product = $this->db->get_where("product", array("product_id" => $id))->result();
    $response['status'] = 200;
    $response['error'] = false;
    $response['product'] = $product;
    return $response;
  }

  public function deleteProduct($id)
  {

    if ($id == '') {
      return $this->empty_response();
    } else {
      $where = array(
        "product_id" => $id
      );

      $this->db->where($where);
      $delete = $this->db->delete("product");
      if ($delete) {
        $response['status'] = 200;
        $response['error'] = false;
        $response['message'] = 'Data mahasiswa berhasil dihapus.';
        return $response;
      } else {
        $response['status'] = 502;
        $response['error'] = true;
        $response['message'] = 'Data mahasiswa gagal dihapus.';
        return $response;
      }
    }
  }

  private function random()
  {
    $pool = '1234567890abcdefghijkmnopqrstuvwxyz';
    $word = '';
    for ($i = 0; $i < 8; $i++) {
      $word .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
    }
    return $word;
  }
}
