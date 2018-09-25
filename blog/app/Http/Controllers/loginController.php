<?php

/**
 * Created by PhpStorm.
 * User: Nikita-PHP
 * Date: 10/24/2017
 * Time: 6:36 PM
 */
namespace App\Http\Controllers;

use App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

session_start();
class loginController extends Controller
{


    /*check user login Credential*/
   public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type");
        //header("Access-Control-Allow-Origin: http://localhost:8100");
    }


    public function admin_login_ajax_api(){
        if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $User = new User();
            $User->set_email($email);
            $login_data = $User->check_admin_login();

            if (isset($login_data) && !empty($login_data[0])) {
                if ($password == $login_data[0]->password){
                    $response['SUCCESS'] = 'True';
                    $response['DATA'] = $login_data[0];
                    $response['MESSAGE'] = 'Login Success';
                    $response['ERROR'] = '200';
                }else{
                    $response['SUCCESS'] = 'FALSE';
                    $response['MESSAGE'] = 'Incorrect Username or Password';
                    $response['ERROR'] = '404';
                }

            } else {
                $response['SUCCESS'] = 'FALSE';
                $response['MESSAGE'] = 'Incorrect Username or Password';
                $response['ERROR'] = '404';
            }
        } else {
            $response['SUCCESS'] = 'FALSE';
            $response['MESSAGE'] = 'Incorrect Username or Password';
            $response['ERROR'] = '404';
        }
        $response_json = json_encode($response, true);
        echo $response_json;
    }

    public function product_details(){
    try {
      
        $User = new User();
        $product_details = $User->product_details();
        if (isset($product_details) && !empty($product_details)) {
               foreach($product_details as $product){
                 $product->image = "http://localhost:7777/server/blog/public/mobileimage/".$product->product_image;
			   }
                $response['SUCCESS'] = 'True';
                $response['DATA'] = $product_details;
                $response['MESSAGE'] = 'Product Found';
                $response['ERROR'] = '200';

        } else {
            $response['SUCCESS'] = 'FALSE';
            $response['MESSAGE'] = 'No Product Found';
            $response['ERROR'] = '404';
        }
        $response_json = json_encode($response, true);
        echo $response_json;
    }catch (Exception $ex) {
         $response_json = json_encode($ex->getMessage());
        echo $response_json;         
        }
     }
}