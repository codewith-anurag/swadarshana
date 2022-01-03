<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Swashoppe extends CI_Controller {

    function __construct() {
        parent::__construct();
        //echo phpinfo();exit;
        $this->load->model("front_model");
        $this->load->library("pagination");
        $this->load->library('cart');
    }

    /**
     *
     * Get Swashoppe
     */
    public function index() {
        $data["page_title"] = "Swa Shoppe";
        $this->load->view('web/includes/header', $data);
        $data["category"] = $this->front_model->get_swashoppe_category();        
        $this->load->view('web/swa_shoppe', $data);
        $this->load->view('web/includes/footer');
    }
    
    /**
     * Search Swa Shoppe Video 
     */
    public function search() {
        $search = $this->input->post("swavideo");
        $data["page_title"] = "Swa Shoppe";
        $this->load->view('web/includes/header', $data);
        $data["swashoppe"] = $this->front_model->get_swashoppe_search($search);         
        $this->load->view('web/swa_shoppe_search', $data);
        $this->load->view('web/includes/footer');
    }

    public function swa_shoppe_video($id) {
        $data["page_title"] = "Swa Shoppe";
        $this->load->view('web/includes/header', $data);
        $data["swashoppedetail"] = $this->front_model->get_swashoppedetail($id);  
        $this->load->view('web/swa_shoppe_video', $data);
        $this->load->view('web/includes/footer');
    }

    /*
     * Get Video Duration 
    */ 
    function getDuration($file){
        if (file_exists($file)){
            //echo 1;exit;
             ## open and read video file
            $handle = fopen($file, "r");
            ## read video file size
            $contents = fread($handle, filesize($file));
            fclose($handle);
            $make_hexa = hexdec(bin2hex(substr($contents,strlen($contents)-3)));
            if (strlen($contents) > $make_hexa){
            $pre_duration = hexdec(bin2hex(substr($contents,strlen($contents)-$make_hexa,3))) ;
            $post_duration = $pre_duration/1000;
            $timehours = $post_duration/3600;
            $timeminutes =($post_duration % 3600)/60;
            $timeseconds = ($post_duration % 3600) % 60;
            $timehours = explode(".", $timehours);
            $timeminutes = explode(".", $timeminutes);
            $timeseconds = explode(".", $timeseconds);
            $duration = $timehours[0]. ":" . $timeminutes[0]. ":" . $timeseconds[0];}
            return $duration;
        }
        else {
            //echo 0;exit;
            return false;
        }
    }

    public function payment() { 	
    if ($this->session->userdata("email") == "" && $this->session->userdata("fullname")=="") {
            redirect(base_url('web/swashoppe/login/'));
        }
        $data["page_title"] = "Payment";
        $this->load->view('web/includes/header', $data);
            
        $this->load->view("web/swa_payment",$data);
        $this->load->view('web/includes/footer', $data);
    }
    public function checkout()
    { 	/*if ($this->session->userdata("email") == "" && $this->session->userdata("fullname")=="") {
    		redirect(base_url('web/swashoppe/login/'));
    	}*/
    	$data["page_title"] = "Checkout";
    	$this->load->view('web/includes/header', $data);
        $data['video_detail'] = $this->cart->contents();

	    $this->load->view("web/swa_addtocart",$data);
	    $this->load->view('web/includes/footer', $data);
    }
    public function paymentReaponse(){
        if(isset($_POST['bank_ref_num'])){
                $paymentData = array(
                    'user_id'=>$this->session->userdata("id"),
                    'txnid' => $_POST['txnid'],
                    'amount' => $_POST['amount'],
                    'status' => $_POST['status'],
                    'fullname'=> $_POST['firstname'].' '.$_POST['lastname'],
                    'email'=> $_POST['email'],
                    'phone' => $_POST['phone'],
                    'bank_ref_num'=> $_POST['bank_ref_num'],
                    'payment_mode' => $_POST['bankcode'],
                    'payuMoneyId' => $_POST['payuMoneyId'],
                    'created_date' => $_POST['addedon'],
                );
            $this->db->insert('video_transaction',$paymentData);
        }
        $data["page_title"] = "Payment Response";
        $data["paymentData"] = $_POST;
        $this->load->view('web/includes/header', $data); 
        $this->load->view('web/paymentResponse', $_POST);
        $this->load->view('web/includes/footer');

        if($_POST['status'] === 'success'){
            $this->insertPurchaseDetail($this->session->userdata("id"));
            $this->session->set_flashdata("success_message","Your transaction has been successful.");
            $this->cartEmpty($this->cart->contents());
        }
        // if($_POST['status'] === 'failure'){
        //     $this->session->set_flashdata("error_message","Your transaction has been failed. please try again!");
        //     redirect(base_url('web/swashoppe/checkout/'));
        //     $this->cartEmpty($this->cart->contents());
        // }

        // redirect(base_url('web/paymentResponse'));
    }
    public function paymentStatus(){
        if ($this->session->userdata("email") == "" && $this->session->userdata("fullname")=="") {
            redirect(base_url('web/swashoppe/login/'));
        }
        $data["page_title"] = "Checkout";
        $this->load->view('web/includes/header', $data);
        $data['video_detail'] = $this->cart->contents();

        $this->load->view("web/swa_addtocart",$data);
        $this->load->view('web/includes/footer', $data);
    }
    public function insertPurchaseDetail($user_id){
        if($user_id){
            foreach ($this->cart->contents() as $video) {
                $insertData = array(
                    'user_id'=>$user_id,
                    'video_id' => $video['id'],
                    'created_at' => date("Y-m-d h:i:s"),
                );
                $this->db->insert('video_purchase_details',$insertData);
            }
        }
    }
    public function cartEmpty($cartdata){
        foreach ($cartdata as $video) {
            $data = array(
                'rowid' => $video['rowid'], 
                'qty' => 0, 
            );
            $this->cart->update($data);
        }    
        $this->get_video_count();
    }
    public function singup()
    {
    	$data["page_title"] = "Swa Sign up";
        $this->load->view('web/includes/header', $data);
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules("full_name",'Full Name','required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules("password",'Password','required');
        if ($this->form_validation->run() == FALSE){
        	
        }else{
        	 if (!empty($_POST)) {
                $email = $this->input->post("email");
                $exist_email = $this->db->query("select * from customer where email = '$email'")->num_rows();
                if($exist_email == 0){
    	        	$data = array("full_name"=>$this->input->post("full_name"),"email"=>$this->input->post("email"),"password"=>md5($this->input->post("password")),"created_date"=>date("Y-m-d"));
    	        	$this->db->insert("customer",$data);
                    $result = $this->db->insert_id();
                    if ($result = TRUE) {
                        $from_email = "noreply@swadarshana.com"; 
                        $to_email = $this->input->post('email'); 
                   
                         //Load email library 
                         $this->load->library('email'); 

                         $this->email->set_mailtype("html");
                   
                         $this->email->from($from_email, 'Swadarshana.com'); 
                         $this->email->to($to_email);
                         $this->email->subject('Swadarshana.com | Registration Successful '); 
                         $fullname = $this->input->post("full_name");
                         $message = "Hi ".$fullname.",<br/><br/>Your Account was created successfully.</br><br/> Username : ".$this->input->post("email")."<br/> Password :".$this->input->post("password")."<br/><br/> <a href='https://www.swadarshana.com/web/swashoppe/login'> CLICK HERE </a> To Login </br><br/> Regards,<br> www.swadarshana.com";
                         $this->email->message($message); 
                   
                         //Send mail 
                         if($this->email->send()){
                           // echo 1;
                         }else {                        
                           // echo 0;
                        }

                         $this->email->from($from_email, 'Swadarshana.com'); 
                         $this->email->to("manish.khernar@gmail.com"); //manish.khernar@gmail.com
                         $this->email->subject('Swadarshana.com | New User Registration on website '); 
                         $fullname = $this->input->post("full_name");
                        $message = "Hello Admin,<br/><br/>A new user has registered on Swadarshana website.</br><br/> Name : ".$this->input->post("full_name")."<br/> Email :".$this->input->post("email")."<br/><br/> Regards, <br> www.swadarshana.com";
                         $this->email->message($message); 
                   
                         //Send mail 
                         if($this->email->send()){
                           // echo 1;
                         }else {                        
                            //echo 0;
                        }
                    }                    
    	        	//$this->session->set_flashdata("success","Sign up Successfully");
    	        	redirect(base_url('web/swashoppe/login'));
                }else{
                    $this->session->set_flashdata("fail","Your Email Already Exist.");
                    redirect(base_url('web/swashoppe/singup'));
                }
        	}
        }

       
        $this->load->view('web/swa_singup',$data);
        $this->load->view('web/includes/footer');    
    }

    public function login($video_id='')
    {
        // var_dump($this->cart->contents()); die;

    	$data["page_title"] = "Swa Login";
        $this->load->view('web/includes/header', $data);

        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules("password",'Password','required');
        if ($this->form_validation->run() == FALSE){
        	
        }else{
        	 if (!empty($_POST)) {
	        	$email = $this->input->post("email");
	        	$password= md5($this->input->post("password"));

                $this->db->where("email",$email);
	        	$this->db->where("password",$password);
	        	
	        	$user_data = $this->db->get("customer")->row();
                
	        	if (!empty($user_data)) {
	        		$customerdata = array("id"=>$user_data->id,"fullname"=>$user_data->full_name,"email"=>$user_data->email,"phone"=>$user_data->phone, "video_id"=>$video_id, 'isLogin'=>true);
	        		$this->session->set_userdata($customerdata);
                    
	        		$this->session->set_flashdata("success","Login Successfully.");
                      if($this->cart->contents()){
                            redirect(base_url('web/swashoppe/checkout/'));

                        }else{
                            redirect(base_url('web/user_videos/get_uservideos'));
                        }

	        	}else{
	        		$this->session->set_flashdata("fail","Invalid Email Or Password.");
	        		redirect(base_url('web/swashoppe/login/'));
	        	}	        	
        	}
        }

       
        $this->load->view('web/swa_login',$data);
        $this->load->view('web/includes/footer');    
    }

    public function logout(){
    	$this->session->sess_destroy();
    	redirect(base_url('web/swashoppe/login/'));
    }

    // Shop
  
public function add_to_cart(){ 
    $data = array(
        'id' => $this->input->post('product_id'), 
        'name' => $this->input->post('product_name'), 
        'price' => $this->input->post('product_price'), 
        'qty' => $this->input->post('quantity'), 
        'image' => $this->input->post('image'), 
    );
    $this->cart->insert($data);
    $this->get_video_count(); 
 }

public function get_video_count(){
  echo count($this->cart->contents());
 }
 public function delete_cart(){ 
    $data = array(
        'rowid' => $this->input->post('row_id'), 
        'qty' => 0, 
    );
    $this->cart->update($data);
    $this->get_video_count();
  }
public function show_qty_on_click(){
  echo count($this->cart->contents());
 }
 public function show_subtotal_on_click(){
  echo '<i class="fa fa-inr"> '.number_format($this->cart->total());
 }

public function show_cart_page(){ 

    $this->cart->contents();
        $output = '';
        $no = 0;
        $output .= '<table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Product Name </th>
                                <th>Quantity</th>
                                <th class="text-center">Total</th>
                                <th> </th>

                            </tr>
                        </thead>
                        <tbody>';
        foreach ($this->cart->contents() as $items) {
            $no++;
            $amount = $this->cart->total()?$this->cart->total():'';
            $totalamount = $amount?$amount*5/100:'';
            $decimal = $totalamount?number_format($amount + $totalamount):'';
            $imageUrl = $items['image'];
            $output .='<tr>
                <td class="col-sm-8 col-md-6">
                <div class="media">
                    
                    <img class="media-object" src="'.$imageUrl.'" style="height: 72px;"> 
                    
                </div></td>
                <td><div >
                        <h4 class="media-heading"><a href="#">'. $items["name"].'</a></h4>
                    </div></td>
                <td class="col-sm-1 col-md-1" style="text-align: center">
                <input type="text" disabled="disabled" class="form-control" value="1">
                </td>
                <td class="col-sm-1 col-md-1 text-center"><strong><i class="fa fa-inr"></i>'.number_format($items['subtotal']).'</strong></td>
                <td class="col-sm-1 col-md-1">
                <a id="'.$items["rowid"].'" href="javascript:void(0)" class="btn btn-danger romove_cart">
                    <span class="fa fa-trash"></span>  </a></td>
            </tr>';
        }
        $output .= '<tr>
            <td colspan="4" class="text-right"><h5>Subtotal</h5></td>
            <td class="text-right"><h5><strong><i class="fa fa-inr"></i> '.number_format($this->cart->total()).'</strong></h5></td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><h5>Service Charges:(5%)</h5></td>
            <td class="text-right"><h5><strong>'.$totalamount.'</strong></h5></td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><h3>Total</h3></td>
            <td class="text-right"><h3><strong><i class="fa fa-inr"></i>'.$decimal.'</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
            <a href="'.base_url('web/swashoppe/payment').'"  class="btn btn-success">
                Pay Now <span class="fa fa-play"></span>
            </a></td>
        </tr></tbody>
        </table>
        ';
        if($no == 0){
          echo '<table class="table table-hover"><tr><td class="text-center">Your cart is empty!<br><br> <a href="'.base_url('web/swashoppe/').'"  class="btn btn-success">Go To Video Page </span>
            </a></td></tr></table>';
        }else{
          echo $output;
        }
}
// public function show_cart_page(){ 

// }
public function load_cart(){ 
  $this->show_cart();
}

// Shop


}
