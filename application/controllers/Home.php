<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();	
		$this->load->library('stripegateway');
		$this->load->model('store_model');			
	}

	public function index()
	{

		$data=array();


		$this->load->view('header_view');
		$this->load->view('albumsList_view', $data, FALSE);
		$this->load->view('footer_view');
		
	}

	function buyAlbum(){

		$data["message"] = "";
		if(!empty($_POST)){
			$price= $this->input->post('amount');
			$albumId= $this->input->post('productId');
			$cardnumber= $this->input->post('cardnumber');
			$expirymonth= $this->input->post('expirymonth');
			$expiryyear= $this->input->post('expiryyear');

							
			$data = array(
				'number' => $cardnumber,
				'exp_month' => $expirymonth,
				'exp_year'=> $expiryyear,
				'amount' => $price
			);


			$data["message"] = $this->stripegateway->checkout($data);
		}else{
			$data["message"]="the purchase could not be processed";
		}

		if ($data['message']=="succeeded") {
			/**
			 * safe data on DB
			 */
			$safeData=$this->store_model->insert_pay($this->input->post());

			if ($safeData!=false) {
				$data["message2"]="data saved in database";

				/**
				 * send email
				 */
				$this->sendEmail('userEmail@gmail.com');
				
			}else{
				$data["message2"]="data not saved in database";

			}

			

		
		}		

		echo json_encode($data);exit;
	}

	function sendEmail($email){
		$this->email->from('pruebas@store.com','Albums Store');
                $this->email->to($email);
                $this->email->subject('email notification');

                $data=array();

                $this->email->message($this->load->view('notif_email', $data, TRUE));

                
                //$r = $this->email->send(true);
                $r = true;
                $this->email->clear(true);

                if (!$r):
                    //var_dump($this->email->print_debugger());
                    return array(
                                    'result'=>false
                            );
                else:
                    return array(
                                    'result'=>true
                            );
                endif;
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */