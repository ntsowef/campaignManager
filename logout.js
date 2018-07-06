function SignOut(){
   
   sessionStorage.clear();
    unset($_COOKIE['wp_user_logged_in']);
    setcookie('ser_logged_in', null, -1, '/');
   location.href = "index.html";
   
}