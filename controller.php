<?php
session_start ();
unset($_SESSION['registerError'] );
unset($_SESSION['loginError']);
include 'model.php';  // for $theDBA, an instance of DataBaseAdaptor

if(isset($_GET["user"])&&isset($_GET["password"]))
{
    $user = $_GET["user"];
    $password = $_GET["password"];
    
    $arr = $theDBA->check($user);
    if(count($arr) == 0)
    {
        $theDBA ->Register($user, $password);
        header('Location: index.php');
    }
    else
    {
        $_SESSION['registerError'] ="Account name already exists";
        header('Location: Register.php');
    }
}

if(isset($_GET["USER"])&&isset($_GET["PASSWORD"]))
{
    $user = $_GET["USER"];
    $password = $_GET["PASSWORD"];
    
    $arr = $theDBA->check($user);
    if(count($arr)==0){
        $_SESSION['loginError'] ="Invalid username or password!";
        header('Location: Login.php');
    }
    else if($user===$arr[0]["username"] && password_verify($password, $arr[0]['hash'])){
        $_SESSION['login'] = $user;
        header('Location: index.php');
    }
    else
    {
        $_SESSION['loginError'] ="Invalid username or password!";
        header('Location: Login.php');
    }
}

if(isset($_GET["logout"])){
    session_destroy ();
    echo json_encode ("");
    //header ( 'Location: index.php' );
}

//giftcard
if(isset($_GET["giftcard"])){
    $item="App Store & iTunes Gift Cards";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=25;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }  
}

if(isset($_GET["removeGiftCard"])){
    $item="App Store & iTunes Gift Cards";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}

if(isset($_GET["buyitGiftCard"])){
    $item="App Store & iTunes Gift Cards";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=25;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["GiftcardcheckOut"])){
    $item="App Store & iTunes Gift Cards";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=25;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }   
}

if(isset($_GET["GiftCardaddCart"])){
    $item="App Store & iTunes Gift Cards";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=25;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: GiftCard.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: GiftCard.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsAPP"){
    
    $user=$_SESSION['login'];
    $item="App Store & iTunes Gift Cards";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}
//*********************************************************************************
//watch
if(isset($_GET["watch"])){
    $item="NEW Fitbit Ionic Smartwatch";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=239;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }
    
}

if(isset($_GET["buyitWatch"])){
    $item="NEW Fitbit Ionic Smartwatch";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=239;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["WatchcheckOut"])){
    $item="NEW Fitbit Ionic Smartwatch";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=239;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }
    
}

if(isset($_GET["WatchaddCart"])){
    $item="NEW Fitbit Ionic Smartwatch";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=239;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: watch.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: watch.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsWatch"){
    
    $user=$_SESSION['login'];
    $item="NEW Fitbit Ionic Smartwatch";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}

if(isset($_GET["removeWatch"])){
    $item="NEW Fitbit Ionic Smartwatch";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}
//*******************************************************************************
//bear
if(isset($_GET["bear"])){
    $item="Brown Giant Teddy Bear";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=46;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }
}

if(isset($_GET["removeBear"])){
    $item="Brown Giant Teddy Bear";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}

if(isset($_GET["buyitBear"])){
    $item="Brown Giant Teddy Bear";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=46;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["BearcheckOut"])){
    $item="Brown Giant Teddy Bear";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=46;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["BearaddCart"])){
    $item="Brown Giant Teddy Bear";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=46;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: bear.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: bear.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsBear"){
    
    $user=$_SESSION['login'];
    $item="Brown Giant Teddy Bear";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}
//*******************************************************************************
//mattress
if(isset($_GET["mattress"])){
    $item="Memory Foam Mattress";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=356;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }
}

if(isset($_GET["removeMattress"])){
    $item="Memory Foam Mattress";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}

if(isset($_GET["buyitMattress"])){
    $item="Memory Foam Mattress";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=356;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["MattresscheckOut"])){
    $item="Memory Foam Mattress";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=356;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["MattressaddCart"])){
    $item="Memory Foam Mattress";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=356;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: mattress.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: mattress.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsMattress"){
    
    $user=$_SESSION['login'];
    $item="Memory Foam Mattress";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}
//*******************************************************************************
//sony
if(isset($_GET["sony"])){
    $item="Sony Headphones";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=290;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }
}

if(isset($_GET["removeSony"])){
    $item="Sony Headphones";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}

if(isset($_GET["buyitSony"])){
    $item="Sony Headphones";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=290;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["SonycheckOut"])){
    $item="Sony Headphones";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=290;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["SonyaddCart"])){
    $item="Sony Headphones";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=290;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: sony.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: sony.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsSony"){
    
    $user=$_SESSION['login'];
    $item="Sony Headphones";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}

//*******************************************************************************
//lamp
if(isset($_GET["lamp"])){
    $item="Floor Lamp";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=189;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }
}

if(isset($_GET["removeLamp"])){
    $item="Floor Lamp";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}

if(isset($_GET["buyitLamp"])){
    $item="Floor Lamp";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=189;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["LampcheckOut"])){
    $item="Floor Lamp";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=189;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["LampaddCart"])){
    $item="Floor Lamp";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=290;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: sony.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: lamp.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsLamp"){
    
    $user=$_SESSION['login'];
    $item="Floor Lamp";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}

//********************************************************************************
//keyboard
if(isset($_GET["keyboard"])){
    $item="Mechanical Keyboard";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=480;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }
}

if(isset($_GET["removeKeyboard"])){
    $item="Mechanical Keyboard";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}

if(isset($_GET["buyitKeyboard"])){
    $item="Mechanical Keyboard";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=480;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["KeyboardcheckOut"])){
    $item="Mechanical Keyboard";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=480;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["KeyboardaddCart"])){
    $item="Mechanical Keyboard";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=480;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: keyboard.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: keyboard.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsKeyboard"){
    
    $user=$_SESSION['login'];
    $item="Mechanical Keyboard";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}

//********************************************************************************
//nike
if(isset($_GET["nike"])){
    $item="Nike Air Force";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=85;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }
}

if(isset($_GET["removeNike"])){
    $item="Nike Air Force";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}

if(isset($_GET["buyitNike"])){
    $item="Nike Air Force";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=85;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["NikecheckOut"])){
    $item="Nike Air Force";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=85;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["NikeaddCart"])){
    $item="Nike Air Force";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=85;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: nike.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: nike.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsNike"){
    
    $user=$_SESSION['login'];
    $item="Nike Air Force";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}

//********************************************************************************
//lufei
if(isset($_GET["lufei"])){
    $item="One piece OP LUFFY";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=13;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }
}

if(isset($_GET["removeLufei"])){
    $item="One piece OP LUFFY";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}

if(isset($_GET["buyitLufei"])){
    $item="One piece OP LUFFY";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=13;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["LufeicheckOut"])){
    $item="One piece OP LUFFY";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=13;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["LufeiaddCart"])){
    $item="One piece OP LUFFY";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=13;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: lufei.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: lufei.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsLufei"){
    
    $user=$_SESSION['login'];
    $item="One piece OP LUFFY";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}
//*******************************************************************************
//chair!!!
if(isset($_GET["chair"])){
    $item="Executive Swivel Office Chair";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=69;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }
}

if(isset($_GET["removeChair"])){
    $item="Executive Swivel Office Chair";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}

if(isset($_GET["buyitChair"])){
    $item="Executive Swivel Office Chair";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=69;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["ChaircheckOut"])){
    $item="Executive Swivel Office Chair";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=69;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["ChairaddCart"])){
    $item="Executive Swivel Office Chair";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=69;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: chair.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: chair.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsChair"){
    
    $user=$_SESSION['login'];
    $item="Executive Swivel Office Chair";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}
//*******************************************************************************
//cabinet
if(isset($_GET["cabinet"])){
    $item="Vertical File Cabinet";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=152;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }
}

if(isset($_GET["removeCabinet"])){
    $item="Vertical File Cabinet";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}

if(isset($_GET["buyitCabinet"])){
    $item="Vertical File Cabinet";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=152;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["CabinetcheckOut"])){
    $item="Vertical File Cabinet";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=152;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["CabinetaddCart"])){
    $item="Vertical File Cabinet";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=152;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: cabinet.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: cabinet.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsCabinet"){
    
    $user=$_SESSION['login'];
    $item="Vertical File Cabinet";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}
//*************************************************************
//Shanks
if(isset($_GET["shanks"])){
    $item="One Piece Portrait of Shanks";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=103;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: index.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: index.php');
    }
}

if(isset($_GET["removeShanks"])){
    $item="One Piece Portrait of Shanks";
    $user=$_SESSION['login'];
    $theDBA->removeGiftcard($user,$item);
    header('Location: shoppingcart.php');
}

if(isset($_GET["buyitShanks"])){
    $item="One Piece Portrait of Shanks";
    $quantity=1;
    $user=$_SESSION['login'];
    $price=103;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $theDBA ->IncreaseQuantity($user, $item,$temp);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["ShankscheckOut"])){
    $item="One Piece Portrait of Shanks";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=103;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shoppingcart.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shoppingcart.php');
    }
}

if(isset($_GET["ShanksaddCart"])){
    $item="One Piece Portrait of Shanks";
    $quantity=$_GET['quantity'];
    $user=$_SESSION['login'];
    $price=103;
    $arr=$theDBA ->checkItem($user, $item);
    if(count($arr)==0){
        $theDBA ->addToCart($user, $item,$quantity,$price);
        header('Location: shanks.php');
    }
    else{
        $temp=$arr[0]['quantity'];
        $quantity=$quantity+$temp;
        $theDBA ->buyItNow($user, $item,$quantity);
        header('Location: shanks.php');
    }
    
}

if(isset($_GET["mode"]) && $_GET["mode"]==="getreviewsShanks"){
    
    $user=$_SESSION['login'];
    $item="One Piece Portrait of Shanks";
    $arr = $theDBA->getReviews($item);
    echo json_encode ( $arr );
}

//***************

if(isset($_GET["firstName"])){
    $check=0;
    $user=$_SESSION['login'];
    $arr=$theDBA->isEmpty($user);
   // $orderhistory=$theDBA->viewShoppingcart($user);
    for($i=0;$i<count($arr);$i++){
       // $temp=$theDBA->checkorderHistory($user,$orderhistory[$i]['item']);
        //if(count($temp)==0){
            date_default_timezone_set( 'America/Phoenix' );  // If you want the correct date
            $mydate = date ( "d-M-Y" );
            
            $theDBA->orderHistory($user, $arr[$i]['item'],$mydate,$arr[$i]['quantity']);
        //}
    }
    if($check==1){
        $theDBA->CheckUserHistory($user);
    }
    $theDBA->checkout($user);
    $fname=$_GET['firstName'];
    $lname=$_GET['lastName'];
    $city=$_GET['city'];
    $state=$_GET['state'];
    $zip=$_GET['zip'];
    $street=$_GET['street'];
    date_default_timezone_set( 'America/Phoenix' );  // If you want the correct date
    $mydate = date ( "d-M-Y" );
    echo "<a href=\"index.php\">Back to Home</a>";
   
    
    echo "<div style=\"margin: auto;
	   border-radius: 5px;
	   padding: 10px;
	   width: 500px;
	   height: 480px;
	   border-radius: 5px;
	   box-shadow: 0 0 15px gray;
       background-color:lightblue;	
       box-shadow:4px 4px black;
	  \">";
    echo "<h1 style=\" text-align:center;\">receipt</h1>";
    echo "Date: ".$mydate;
    echo "<br><br>";
    echo "Buyer: ".$fname." ".$lname;
    echo "<br><br>";
    echo '<fieldset>' . '<legend>Ship to</legend>';
    echo $street."<br>";
    echo $city.",".$state.",".$zip;
    echo "</fieldset>";
    echo "<br><br>";
    echo "<h3>Items</h3>";
    $total=0;
    for($i=0;$i<count($arr);$i++){
        $price=$arr[$i]['quantity']*$arr[$i]['price'];
        echo $arr[$i]['item'];
        echo " quantity: ".$arr[$i]['quantity'];
        echo " price: $" . $price;
        echo "<br>";
        $total+=$price;
    }
    
    echo "<br><br>";
    echo "<h3>Total</h3>";
   
    echo "$".$total;
    echo "<form style=\"text-align:center;\" action=\"orderhistory.php\"><input type=\"submit\" value=\"View My Order History\"></form>";
    echo "</div>";
    //header('Location: index.php');
}


if(isset($_GET["mode"]) && $_GET["mode"]==="shoppingcart"){
    $user=$_SESSION['login'];
    $temp=$theDBA->isEmpty($user);
    if(count($temp)==0){
        echo json_encode ( $temp );
    }
    else{
        $arr = $theDBA->viewShoppingcart($user);
        echo json_encode ( $arr );
    }
}


if(isset($_GET["mode"]) && $_GET["mode"]==="orderhistory"){
    $user=$_SESSION['login'];
    $temp=$theDBA->isorderHistoryEmpty($user);
    if(count($temp)==0){
        echo json_encode ( $temp );
    }
    else{
        $arr = $theDBA->vieworderHistory($user);
        echo json_encode ( $arr );
    }
}


if(isset($_GET["cleanorderhistory"])){
    $user=$_SESSION['login'];
    $temp=$theDBA->cleanOrderHistory($user);
    header('Location: orderhistory.php');
}

if(isset($_GET["review"]))
{
    $user=$_SESSION['login'];
    $item=$_GET['itemreview'];
    $comment=$_GET["comment"];
    $rating=$_GET['rating'];
    $temp=0;
    if($rating==="five"){
        $temp=5;
    }
    else if($rating==="four"){
        $temp=4;
    }
    else if($rating==="three"){
        $temp=3;
    }
    else if($rating==="two"){
        $temp=2;
    }
    else if($rating==="one"){
        $temp=1;
    }
    $theDBA->review($user,$item,$comment,$temp);
    header('Location: index.php');
 }
 
 if(isset($_POST["UserEnterPwd"]) && isset($_POST["NewPwd"]))
 {
     $oldPwd = $_POST["UserEnterPwd"];
     $user = $_SESSION['login'];
     $arr = $theDBA->check($user);
     
     if(password_verify($oldPwd, $arr[0]['hash']))
     {
        $newPassword = $_POST["NewPwd"];
        $theDBA->resetPassword($user, $newPassword);
        echo "Reset Password successfully";
     }
     else
     {
         echo "Invalid Old Password";
     }
 }
 
 if(isset($_GET["userBg"]))
 {
     $userBg = $_GET["userBg"];
     $user = $_SESSION['login'];
     $theDBA->saveBg($user, $userBg);
     header('Location: index.php');
     
 }
 
 if(isset($_GET['getBg']))
 {
     if(isset($_SESSION['login']))
     {
        $user = $_SESSION['login'];
        $arr = $theDBA->getBg($user);
        echo json_encode ( $arr[0]['Bg'] );
     }
     else 
     {
        echo json_encode("LogOut"); 
     }
 }
 
 //-------------------------------------------------------------------------
 if(isset($_GET["mode"]) && $_GET["mode"]==="default")
 {
     $user=$_SESSION['login'];
     $arr=$theDBA->check($user);
     echo json_encode ( $arr );
 }
 
 if(isset($_GET["mode"]) && $_GET["mode"]==="profile"){
     $user=$_SESSION['login'];
     $arr=$theDBA->check($user);
     echo json_encode ( $arr );
 }
 
 if(isset($_GET["save"])){
     $user=$_SESSION['login'];
     $fname=null;
     $lname=null;
     $street=null;
     $city=null;
     $state=null;
     $zip=null;
     if(isset($_GET["fname"])){
         $fname=$_GET['fname'];
     }
     if(isset($_GET["lname"])){
         $lname=$_GET['lname'];
     }
     if(isset($_GET["street"])){
         $street=$_GET['street'];
     }
     if(isset($_GET["city"])){
         $city=$_GET['city'];
     }
     if(isset($_GET["state"])){
         $state=$_GET['state'];
     }
     if(isset($_GET["zip"])){
         $zip=$_GET['zip'];
     }
     $theDBA->fname($user,$fname);
     $theDBA->lname($user,$lname);
     $theDBA->city($user,$city);
     $theDBA->street($user,$street);
     $theDBA->state($user,$state);
     $theDBA->zip($user,$zip);
     // $theDBA->profile($user,$fname);
     echo "Save changes successfully!";
 }

?>