<?php
class User{




    function insert(array $data){
       try{
        $dsn='mysql:hostname=localhost;dbname=mvc_demo';
        $username='root';
        $password='';

        $keys=implode(',',array_keys($data));
        $values=implode("','",array_values($data));
        $query="insert into users ($keys) values('$values')";
        // echo $query;
        $pdo=new PDO($dsn,$username,$password);
        return $pdo->prepare($query)->execute();
       

       } catch(PDOException $ex){
           return false;

       }catch(PDOStatement $ex){
        return false;
       }
        

        



    }

    function select($id){
        $all_users=array('ahmed','afnan','ali','baabood');
        if($id>sizeof($all_users)-1)
        return "incorrect user id ";
        return $all_users[$id];
       
    }
}
?>