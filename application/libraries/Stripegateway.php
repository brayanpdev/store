<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Stripe handling library
 */

class Stripegateway
{
    /**
     * summary
     */
    public function __construct()
    {
    	$stripe= array(
    		"secret_key"=>'sk_test_rQsgjuUHpEwOrswHkk9zKwTw00qkSgoPGE',
    		"public_key"=>'pk_test_9nc6SE7lIZ91VA1Sbw2IaZvv00Ns3B2Y6r'
    	);
        \Stripe\Stripe::setApiKey($stripe['secret_key']);
        
    }

    public function checkout($data){
        $message = "";
        try{
            $mycard = array('number' => $data['number'],
                            'exp_month' => $data['exp_month'],
                            'exp_year' => $data['exp_year']);
            $charge = \Stripe\Charge::create(array('card'=>$mycard,
                                                    'amount'=>$data['amount'],
                                                    'currency'=>'usd'));
            $message = $charge->status;                                         
        }catch (Exception $e){
            $message = $e->getMessage();
        }   
        return $message;
    }


}//*end class





 ?>