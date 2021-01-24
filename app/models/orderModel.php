<?php

require_once(__DIR__.'/../../core/db_model.php');

class orderModel extends db_model{

    public function setstaus($id){

        $sql="UPDATE orders SET status=1 WHERE order_id=".$id;

        $result=$this->connection->query($sql);

        echo "done";
       
    }
    public function viewmore_farmer($id){
        $sql = "SELECT a.*, b.*,c.*, d.* from orders as a INNER join order_details as b on a.order_id=b.order_id INNER join farmer AS c ON c.farmer_id=b.farmer_id INNER join user as d on c.user_id=d.user_id where a.order_id=".$id;
        $result=$this->connection->query($sql);
        $arr=array();
        if($result){
         while($row=mysqli_fetch_assoc($result))
         array_push($arr,$row);
       return $arr;
     
 
         }else
         echo "error";
    }
    public function viewmore_driver($id){
        $sql="SELECT a.*, b.*,c.*,e.*,f.name_en as province,g.name_en as city,i.name_en as district FROM orders as a INNER JOIN driver as b ON a.driver_id=b.driver_id INNER JOIN user as c ON b.user_id=c.user_id INNER JOIN address as e on c.user_id=e.user_id INNER JOIN provinces as f on f.id=e.province_name INNER JOIN cities as g on g.id=e.city INNER JOIN districts as i on i.id=e.province_name WHERE a.order_id=".$id;
        $result=$this->connection->query($sql);
        $arr=array();
        if($result){
         while($row=mysqli_fetch_assoc($result))
         array_push($arr,$row);
       return $arr;
     
 
         }else
         echo "error";
    }
    public function get_all_orders($id){
		  return $this->read('order', array('*'), array('buyer_id'=>$id));
    }

<<<<<<< HEAD
    function getdriver_upcomingorders($id){

      return $this->read('orders', array('*'), array('driver_id'=>$id));

    }

    function get_order_details($id){

      return $this->read('orders', array('*'), array('order_id'=>$id));
      
  }

  function  order_buyername($id){
		$sql= "SELECT a.username FROM user AS a INNER JOIN buyer AS b ON a.user_id=b.user_id INNER JOIN orders AS c ON b.buyer_id=c.buyer_id where c.order_id='".$id."'";
		
		$result=$this->connection->query($sql);
		
		$finale=array();
		if($result){
        while($row=mysqli_fetch_assoc($result))
			array_push($finale,$row);
		    return $finale;
		}else
		echo "error";

  }
  
  function  order_drivername($id){

		$sql= "SELECT a.username FROM user AS a INNER JOIN driver AS b ON a.user_id=b.user_id INNER JOIN orders AS c ON b.driver_id=c.driver_id where c.order_id='".$id."'";

		$result=$this->connection->query($sql);
		$finale=array();
		if($result){
      while($row=mysqli_fetch_assoc($result))	
			array_push($finale,$row);
		return $finale;
		}else
		echo "error";

	}

  function  orderdetails_total($orderId){
		$sql = "SELECT vegetable.vege_name ,item.total_cost,order_details.weight FROM order_details INNER JOIN item on item.item_id = order_details.item_id INNER JOIN vegetable ON vegetable.vege_id= item.veg_id where order_details.order_id='".$orderId."'";
		$result=$this->connection->query($sql);
		$finale=array();
		if($result){
           while($row=mysqli_fetch_assoc($result)){
			array_push($finale,$row);
		   }
		  return $finale;

		}else
		echo "error";

  }
  
  function  order_city($id){
		$sql= "SELECT a.name_en FROM districts AS a INNER JOIN orders AS b ON a.id=b.city where b.order_id='".$id."'";
		
		$result=$this->connection->query($sql);
		
		$finale=array();
		if($result){
        while($row=mysqli_fetch_assoc($result))
			array_push($finale,$row);
		    return $finale;
		}else
		echo "error";
	}

=======
    
>>>>>>> a9fba5e9bddc1d541656f1c2aab132beafadc88f
}