<?php

require APPPATH . 'libraries/REST_Controller.php';

class Products extends REST_Controller
{

  // construct
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('ProductModel');
  }


  public function index_get()
  {
    $response = $this->ProductModel->getProducts();
    $this->response($response);
  }

  public function add_post()
  {
    $response = $this->ProductModel->addProduct(
      $this->post('product_name'),
      $this->post('price'),
      $this->post('description'),
      $this->post('pic')
    );
    $this->response($response);
  }

  public function id_post()
  {
    $response = $this->ProductModel->getSingleProduct($this->post('id'));
    $this->response($response);
  }

  public function update_put()
  {
    $response = $this->ProductModel->editProduct(
      $this->put('product_id'),
      $this->put('product_name'),
      $this->put('price'),
      $this->put('description'),
      $this->put('pic'),
      $this->put('pic_name')
    );
    $this->response($response);
  }

  public function delete_post()
  {
    $response = $this->ProductModel->deleteProduct(
      $this->post('product_id')
    );
    $this->response($response);
  }
}
