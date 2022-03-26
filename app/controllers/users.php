<?php
require_once 'controller.php';
require_once 'validation.php';

class Users extends Controller
{
    public function __construct()
    {

        echo "<h1>inside users controller construct</h1>";
    }
    function index()
    {

        echo "<h1>index of users</h1>";
    }
    function show($id)
    {


        $user = $this->model('user');
        $userName = $user->select($id);
        $this->view('user_view', $userName);
    }
    function add()
    {

        echo "<h1>add of users</h1>";
    }

    function add_user()
    {
        
        if(isset($_POST['submit']))
        {
            $userName=$_POST['name'];
            $password=$_POST['password'];
            $email=$_POST['email'];

           if(!Validation::checkEmpty([$email,$password,$userName] ) )
           {  if(!Validation::checkMinLength($userName)&& !Validation::checkMaxLength($userName)&& !Validation::checkEmailFormat($email) )
                {
               $user_data =array(
                   'name'=>$userName,
                   'password'=>md5($password),
                   'email'=>$email
                   
               );
               $u=$this->model('user');
               $message="";
               if($u->insert($user_data)){
                   $type='success';
                    $message="user created successful";
                    $this->view('feedback',array('type'=>$type,'message'=>$message));

                }
               else {
                   $type='danger';
                   $message="can not create user please check your data ";
               
                   $this->view('register',array('type'=>$type,'message'=>$message));

                }
            }else{
                $type='danger';
            $message="error input value please check";
        
            $this->view('register',array('type'=>$type,'message'=>$message));
            
            }
           }
           else{
            $type='danger';
            $message="empty input check please";
        
            $this->view('register',array('type'=>$type,'message'=>$message));

           }

        }
        
    }
    function register()
    {
        $this->view('register');
    }

    function list_all()
    {
    }
}
