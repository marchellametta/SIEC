<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/dist/css/bootstrap.css">
  <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/dist/js/bootstrap.js"></script>
  <style>
    .btn {
      margin-top   : 15px;
    }
	.legend {
      margin-top   : 30px;
    }
  .form-horizontal {
      margin-left   : 50px;
    }
  .alert-info {
      margin-left   : 30px;
      margin-right   : 30px;
    }
  </style>
</head>

<body>
<div class="container">
    <div class="row">
		<div class="span12">
			<form class="form-horizontal" action='' method="POST">
			  <fieldset>
			    <div id="legend">
			      <legend class="legend">Login</legend>
			    </div>
			    <div class="control-group">
			      <!-- Username -->
			      <label class="control-label"  for="username">Username</label>
			      <div class="controls">
			        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
			      </div>
			    </div>
			    <div class="control-group">
			      <!-- Password-->
			      <label class="control-label" for="password">Password</label>
			      <div class="controls">
			        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
			      </div>
			    </div>
			    <div class="control-group">
			      <!-- Button -->
			      <div class="controls">
              <input type="submit" id="button-login" value="Login" class="btn btn-primary">
			      </div>
			    </div>
			  </fieldset>
			</form>
      <?php if (isset($result)): ?>
          <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $result; ?>
          </div>
      <?php endif ?>

		</div>
	</div>
</div>
</body>
