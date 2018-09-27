<?php
class DatabaseAdaptor {
    // The instance variable used in every one of the functions in class DatbaseAdaptor
    private $DB;
    // Make a connection to the data based named 'imdb_small' (described in project).
    public function __construct() {
        $db = 'mysql:dbname=shopping;host=127.0.0.1;charset=utf8';
        $user = 'root';
        $password = '';
        
        try {
            $this->DB = new PDO ( $db, $user, $password );
            $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch ( PDOException $e ) {
            echo ('Error establishing Connection');
            exit ();
        }
    }
    
    public function check($user) {
        //$stmt = $this->DB->prepare( "SELECT * FROM users where username IN (\"" . $user . "\")");
        $stmt = $this->DB->prepare( "SELECT * FROM users where username IN (:username)");
        $stmt->bindParam( 'username', $user );
        $stmt->execute ();
        return $stmt->fetchAll ( PDO::FETCH_ASSOC );
    }
    
    public function Register($user,$password){
        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->DB->prepare("insert into users(username, hash) values ('".$user."','".$hashed_pwd."')");
        $stmt->execute ();
        return;
    }
	
	public function resetPassword($user,$newPassword)
	{
		$hashed_pwd = password_hash($newPassword, PASSWORD_DEFAULT);
		$stmt = $this->DB->prepare("update users set hash ="."\"".$hashed_pwd."\""." where username ="."\"".$user."\"");
		$stmt->execute ();
		return;
	}
    
    public function addToCart($user, $item,$quantity,$price){
       // $stmt = $this->DB->prepare("insert into shoppingcart(username, item,quantity,price) values ('".$user."','".$item."','".$quantity."','".$price."')");
        $stmt = $this->DB->prepare("insert into shoppingcart(username, item,quantity,price) values (:username,:item,:quantity,:price)");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'item', $item );
        $stmt->bindParam( 'quantity', $quantity );
        $stmt->bindParam( 'price', $price );
        $stmt->execute ();
        return;
    }
    
    public function checkItem($user, $item){
        //$stmt = $this->DB->prepare("select * from shoppingcart where username in (\"" . $user . "\") and item in (\"" . $item."\")");
        $stmt = $this->DB->prepare("select * from shoppingcart where username in (:username) and item in (:item)");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'item', $item );
        $stmt->execute ();
        return $stmt->fetchAll ( PDO::FETCH_ASSOC );
    }
    
    public function viewShoppingcart($user){
       // $stmt = $this->DB->prepare("select * from shoppingcart where username="."\"".$user."\"");
        $stmt = $this->DB->prepare("select * from shoppingcart where username=:username");
        $stmt->bindParam( 'username', $user );
        $stmt->execute ();
        return $stmt->fetchAll ( PDO::FETCH_ASSOC );
    }
    
    public function vieworderHistory($user){
        //$stmt = $this->DB->prepare("select * from orderhistory where username="."\"".$user."\"");
        $stmt = $this->DB->prepare("select * from orderhistory where username=:username");
        $stmt->bindParam( 'username', $user );
        $stmt->execute ();
        return $stmt->fetchAll ( PDO::FETCH_ASSOC );
    }
    
    public function IncreaseQuantity($user,$item,$quantity){
        $quantity=$quantity+1;
        //$stmt = $this->DB->prepare( "UPDATE shoppingcart SET quantity=".$quantity." WHERE username=\"".$user."\" and item=\"".$item."\"");
        $stmt = $this->DB->prepare( "UPDATE shoppingcart SET quantity=:quantity WHERE username=:username and item=:item");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'item', $item );
        $stmt->bindParam( 'quantity', $quantity );
        $stmt->execute ();
        return;
    }
    
    public function buyItNow($user,$item,$quantity){
        //$stmt = $this->DB->prepare( "UPDATE shoppingcart SET quantity=".$quantity." WHERE username=\"".$user."\" and item=\"".$item."\"");
        $stmt = $this->DB->prepare( "UPDATE shoppingcart SET quantity=:quantity WHERE username=:username and item=:item");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'item', $item );
        $stmt->bindParam( 'quantity', $quantity );
        $stmt->execute ();
        return;
    }
    
    public function isEmpty($user) {
        //$stmt = $this->DB->prepare( "SELECT * FROM shoppingcart where username IN (\"" . $user . "\")");
        $stmt = $this->DB->prepare( "SELECT * FROM shoppingcart where username IN (:username)");
        $stmt->bindParam( 'username', $user );
        $stmt->execute ();
        return $stmt->fetchAll ( PDO::FETCH_ASSOC );
    }
    
    public function isorderHistoryEmpty($user) {
        //$stmt = $this->DB->prepare( "SELECT * FROM orderhistory where username IN (\"" . $user . "\")");
        $stmt = $this->DB->prepare("SELECT * FROM orderhistory where username IN (:username)");
        $stmt->bindParam( 'username', $user );
        $stmt->execute ();
        return $stmt->fetchAll ( PDO::FETCH_ASSOC );
    }
    
    public function removeGiftcard($user,$item) {
        //$stmt = $this->DB->prepare( "delete from shoppingcart where username = \"".$user."\" and item=\"".$item."\"" );
        $stmt = $this->DB->prepare( "delete from shoppingcart where username =:username and item=:item" );
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'item', $item );
        $stmt->execute ();
        return;
    }
    
    public function checkout($user) {
        //$stmt = $this->DB->prepare( "delete from shoppingcart where username = \"".$user."\"" );
        $stmt = $this->DB->prepare( "delete from shoppingcart where username = :username" );
        $stmt->bindParam( 'username', $user );
        $stmt->execute ();
        return;
    }
    
    public function orderHistory($user,$item,$mydate,$quantity){
        //$stmt = $this->DB->prepare("insert into orderhistory(username,item,date,quantity) values ('".$user."','".$item."','".$mydate."','".$quantity."')");
        $stmt = $this->DB->prepare("insert into orderhistory(username,item,date,quantity) values (:username,:item,:date,:quantity)");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'item', $item );
        $stmt->bindParam( 'quantity', $quantity );
        $stmt->bindParam( 'date', $mydate );
       // $stmt = $this->DB->prepare("select users.id, orderhistory.username from users JOIN orderhistory on users.username=orderhistory.username WHERE users.username=\"".$user."\"");
        $stmt->execute ();
        return;
    }
    
    public function CheckUserHistory($user){
        //$stmt = $this->DB->prepare("select users.id, orderhistory.username from users JOIN orderhistory on users.username=orderhistory.username WHERE users.username=\"".$user."\"");
        $stmt = $this->DB->prepare("select users.id, orderhistory.username from users JOIN orderhistory on users.username=orderhistory.username WHERE users.username=:username");
        $stmt->bindParam( 'username', $user );
        $stmt->execute ();
        return;
    }
    
    public function cleanOrderHistory($user) {
        $stmt = $this->DB->prepare( "delete from orderhistory where username = :username" );
        $stmt->bindParam( 'username', $user );
        $stmt->execute ();
        return;
    }
    
    public function review($user, $item,$comment,$rating){
        // $stmt = $this->DB->prepare("insert into shoppingcart(username, item,quantity,price) values ('".$user."','".$item."','".$quantity."','".$price."')");
        $stmt = $this->DB->prepare("insert into reviews(username, item,review,rating) values (:username,:item,:review,:rating)");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'item', $item );
        $stmt->bindParam( 'review', $comment );
        $stmt->bindParam( 'rating', $rating );
        $stmt->execute ();
        return;
    }
    
    public function getReviews($item){
        $stmt = $this->DB->prepare("select * from reviews where item=:item");
        $stmt->bindParam( 'item', $item );
        $stmt->execute ();
        return $stmt->fetchAll ( PDO::FETCH_ASSOC );
    }
    
    public function saveBg($user, $bg)
    {
        $stmt = $this->DB->prepare("update users set Bg ="."\"".$bg."\""." where username ="."\"".$user."\"");
        $stmt->execute ();
        return;
    }
    
    public function getBg($user)
    {
        $stmt = $this->DB->prepare( "SELECT * FROM users where username='".$user."'");
        $stmt->execute ();
        return $stmt->fetchAll ( PDO::FETCH_ASSOC );
    }
    
    //------------------------------------------------------------------
    public function fname($user,$fname){
        //$stmt = $this->DB->prepare( "UPDATE users SET fname=:fname and lname=:lname and street=:street and city=:city and state=:state and zip=:zip WHERE username=:username");
        $stmt = $this->DB->prepare( "UPDATE users SET fname=:fname WHERE username=:username");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'fname', $fname );
        //$stmt->bindParam( 'street', $street);
        //$stmt->bindParam( 'city', $city);
        //$stmt->bindParam( 'state', $state);
        //$stmt->bindParam( 'zip', $zip);
        $stmt->execute ();
        return;
    }
    
    public function lname($user,$lname){
        $stmt = $this->DB->prepare( "UPDATE users SET lname=:lname WHERE username=:username");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'lname', $lname );
        $stmt->execute ();
        return;
    }
    
    public function city($user,$city){
        $stmt = $this->DB->prepare( "UPDATE users SET city=:city WHERE username=:username");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'city', $city );
        $stmt->execute ();
        return;
    }
    
    public function street($user,$street){
        $stmt = $this->DB->prepare( "UPDATE users SET street=:street WHERE username=:username");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'street', $street);
        $stmt->execute ();
        return;
    }
    
    public function state($user,$state){
        $stmt = $this->DB->prepare( "UPDATE users SET state=:state WHERE username=:username");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'state', $state);
        $stmt->execute ();
        return;
    }
    
    public function zip($user,$zip){
        $stmt = $this->DB->prepare( "UPDATE users SET zip=:zip WHERE username=:username");
        $stmt->bindParam( 'username', $user );
        $stmt->bindParam( 'zip', $zip);
        $stmt->execute ();
        return;
    }
    
    
}
$theDBA = new DatabaseAdaptor ();
?>