<?php $this->load->view('includes/header'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Nhà sách BookBook - Đăng nhập</title>
  </head>
  <body>
    <h1>Đăng Nhập</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('verifylogin'); ?>
      <label for="username">Tên đăng nhập</label>
      <input type="text" size="20" id="username" name="username"/>
      <br/>
      <label for="password">Mật khẩu</label>
      <input type="password" size="20" id="passowrd" name="password"/>
      <br/>
      <input type="submit" value="Đăng Nhập"/>
    <?php echo form_close(); ?>
  </body>
</html>
