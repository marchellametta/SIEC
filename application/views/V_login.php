<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <form class="form-horizontal" action='' method="POST">
    <fieldset class="m-auto col-md-6">
    <div class="text-left ml-3 border-bottom"><h5>Login</h5></div>
    <div class="form-group ml-3 mt-3">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="form-group ml-3">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <?php if (isset($result)): ?>
         <div class="alert alert-info alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <?php echo $result; ?>
         </div>
     <?php endif ?>
    <div class="text-right mt-5">
      <input type="submit" value="Login" class="btn btn-primary">
    </div>
  </fieldset>
  </form>
</div>
