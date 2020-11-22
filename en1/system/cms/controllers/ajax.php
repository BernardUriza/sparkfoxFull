<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The basic Ajax controller class.
 * 
 * @author      PyroCMS Dev Team
 * @copyright   Copyright (c) 2012, PyroCMS LLC
 * @package     PyroCMS\Core\Controllers
 */
class Ajax extends MY_Controller
{
	/**
	 * Used in a javascript callback url.
	 * 
	 * Basically this is just an interface to url_title() defined 
	 * in /system/cms/helpers/MY_url_helper.php.
	 * 
	 * @see /system/cms/modules/files/js/functions.js, url_title()
	 */
    public function url_title()
    {
        $this->load->helper('text');

        $slug = trim(url_title($this->input->post('title'), 'dash', true), '-');

        $this->output->set_output($slug);
    }






    public function modal($case = false, $info = false)
    {
    	$data = array();
    	switch($case)
    	{
    		case 'contact-sent':
    			$data['message'] = '
    				<h2>
    					<i class="fa fa-check" aria-hidden="true"></i>
    					Thanks for contacting us
    				</h2>
        			<p>We´ll answer soon. Thank for your insterest in our products.</p>
        			<a href="javascript:void(0);" class="btn-cart" data-dismiss="modal">Continue</a>
        		';
    		break;


    		case 'product-added':
    			$query = $this->db->query("SELECT * FROM default_store_products WHERE id = ?", array($info));
    			$product = $query->row();
     			$data['message'] = '
    				<h2>
    					<i class="fa fa-check" aria-hidden="true"></i>
    					This item was just added to your cart.
    				</h2>
        			<p>We are happy to answer any question you have. Just send us a message <a href="/contact-us">here</a></p>
					<div class="row cart-item">
						<div class="col-lg-2">
							<div class="img-holder">
								<img src="/files/large/'.$product->cover_id.'" class="img-responsive" />
							</div>
						</div>
						<div class="col-lg-10">
							<big>'.$product->name.'</big>
							<small>For Multiplatform</small>
							<span>USD <b>$ '.number_format($product->price,2).'</b></span>
							<a href="/store/cart" class="btn-primary pull-right">Proceed to check out</a>
						</div>
					</div>
        		';
    		break;


    		case 'form-errors':
     			$data['message'] = '
    				<h2>
    					Oops, there are some missing fields in your form
    				</h2>
					<ul class="field-errors">
					</ul>
					<a href="javascript:void(0);" class="btn-cart" data-dismiss="modal">Ok!</a>
        		';    		
    		break;

            case 'newsletter-fail':
                $data['message'] = '
                    <h2>
                        Oops, something went wrong
                    </h2>
                    <ul class="field-errors">
                        <li>It seems that you have provided an incorrect or duplicated e-mail address, please try again.</li>
                    </ul>
                    <a href="javascript:void(0);" class="btn-cart" data-dismiss="modal">Ok!</a>
                ';          
            break;    

            case 'newsletter-sent':
                $data['message'] = '
                    <h2>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        Thank you for subscribing!
                    </h2>
                    <p>We will keep you up to date with the more relevant prodcts and promotions.</p>
                    <a href="javascript:void(0);" class="btn-cart" data-dismiss="modal">Continue</a>
                ';
            break;                    
    	}

    	$this->load->view('modal', $data);
    }






    function get_category_covers()
    {
        $covers = array();

        $query = $this->db->query("SELECT * FROM default_store_categories WHERE 1");
        $categories = $query->result();

        foreach ($categories as $cat)
        {
            $query = $this->db->query("SELECT * FROM default_store_products WHERE category_id = ?", array($cat->id));
            $product = $query->row();

            if($product && $product->cover_id)
            $covers[$cat->id] = $product->cover_id;
        }

        echo json_encode($covers);
    }





    /*********************************************
        Retail Stores =>
    *********************************************/
    function get_retail_stores($id){
        header('Content-Type: application/json');
        $stores = $this->db->query("SELECT DP.title, RS.store_link, RS.store_logo FROM default_pages DP INNER JOIN default_pages_retail_store RS ON RS.id = DP.entry_id WHERE parent_id = ?", array($id))->result();
        echo json_encode($stores);
    }



    /***************************************
        Search Compliance PDF's
    ***************************************/
    function search_compliance(){                                                                    
        header('Content-Type: application/json');
        $json = array();

        $json['results'] = $this->db->query("SELECT DC.compliance_pdf, DC.compliance_product, DC.compliance_model, F.name as filename FROM default_compliance DC INNER JOIN default_files F ON F.id = DC.compliance_pdf INNER JOIN default_keywords_applied KA ON KA.hash = DC.compliance_keywords INNER JOIN default_keywords KW ON KW.id = KA.keyword_id WHERE (DC.compliance_product LIKE '%".$_POST['search-compliance']."%' OR DC.compliance_model LIKE '%".$_POST['search-compliance']."%' OR KW.name LIKE '%".$_POST['search-compliance']."%') GROUP BY DC.id")->result();
        $json['length']  = count($json['results']);

        echo json_encode($json);
    }




    /* Get Consoles */
    function get_consoles(){
        header('Content-Type: application/json');
        $consoles = $this->db->query("SELECT * FROM default_consoles_brands WHERE 1")->result(); 
        echo json_encode($consoles); 
    }


    /* Get Categories */
    function get_categories(){
        header('Content-Type: application/json');
        $categories = $this->db->query("SELECT * FROM default_store_categories WHERE 1 ORDER BY name ASC")->result();
        echo json_encode($categories); 
    }    


    /* Update Console */
    function update_console($product_id){
        if($_POST['console'] != '0')
        {
            $data = array(
                'consolebrand' => $_POST['console']
            );
            $where = "id = ".$product_id.""; 
            $update =  $this->db->update_string('default_store_products', $data, $where);
            $this->db->query($update);
        }
    }

}
