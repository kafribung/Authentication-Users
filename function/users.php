<?php
function cek_nama($name)
{
  global $link;

  $query  = "SELECT * FROM users WHERE username= '$name'";
  $result = mysqli_query($link, $query);

  return mysqli_num_rows($result);
}

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Register
function register_user($name, $pass, $email, $address)
{
  global $link;
  $name    = escape($name);
  $pass    = escape($pass);
  $email   = escape($email);
  $address = escape($address);

  // hash password
  $pass = password_hash($pass, PASSWORD_DEFAULT);

  $query = "INSERT INTO users (username, email, password, address) VALUES ('$name', '$email', '$pass', '$address')";
  if (mysqli_query($link, $query)) {
    return true;
  } else return false;
}

function redirect_login()
{
  header('Location:login.php');
}


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Login
function cek_password($name, $pass)
{
  global $link;
  $query  = "SELECT password FROM users WHERE username= '$name'";
  $result = mysqli_query($link, $query);
  $data   = mysqli_fetch_assoc($result)['password'];

  // Uji kebenaran pass
  if (password_verify($pass, $data)) return true;
  else return false;
}

function redirect_index($name)
{
  // setcookie('user', $name,  time() + (86400 * 30), "/");
  $_SESSION['user'] = $name;
  header('Location: index.php');
}

// Index

function flash_message()
{
  echo $_SESSION['pesan'];
  // setcookie('pesan', 'login terlebih dahulu', time() - (86400 * 30), "/");
  session_unset();
}


// Cek session
function cek_session_user()
{
  if (isset($_SESSION['user'])) {
    header('Location:index.php');
  }
}

// Data User
function  data_user($nama)
{
  global $link;
  $query = "SELECT * FROM users WHERE username = '$nama'";
  $result = mysqli_query($link, $query);
  return $result;
}

// Data admin
function data_admin($nama)
{
  global $link;

  $query  = "SELECT role FROM users WHERE username= '$nama'";
  $result = mysqli_query($link, $query);
  $data  = mysqli_fetch_assoc($result);
  return $data;
}













// Sqli injection
function escape($data)
{
  global $link;

  return mysqli_real_escape_string($link, $data);
}
