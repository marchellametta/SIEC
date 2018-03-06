<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bitter" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/js/gijgo.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/utilities/dynamic-data-render.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
  padding-top:80px;
}
.navbar {
  -webkit-box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75);
}

.card:hover {
  -webkit-box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75);
}

.shadow:hover{
  -webkit-box-shadow: 3px 3px 14px -1px rgba(0,0,0,0.75);
-moz-box-shadow: 3px 3px 14px -1px rgba(0,0,0,0.75);
box-shadow: 3px 3px 14px -1px rgba(0,0,0,0.75);
}

fieldset
	{
		border: 1px solid #ddd !important;
		margin: 0;
		xmin-width: 0;
		padding: 10px;
		position: relative;
		border-radius:4px;
		background-color:#f5f5f5;
		padding-left:10px!important;
	}

		legend
		{
			font-size:14px;
			font-weight:bold;
			margin-bottom: 0px;
			width: 35%;
			border: 1px solid #ddd;
			border-radius: 4px;
			padding: 5px 5px 5px 10px;
			background-color: #ffffff;
		}

    @font-face {
  font-family: "BebasNeue Regular";
    src: url(<?php echo base_url();?>assets/fonts/BebasNeue-Regular.otf) format("truetype");
}

.nav-item{
  font-family: "BebasNeue Regular";
  letter-spacing: 1px;
  font-size: 18px;
}

h5{
  font-family: "BebasNeue Regular";
  letter-spacing: 1px;
  font-size: 35px;
}

h6{
  font-family: "BebasNeue Regular";
  letter-spacing: 1px;
  font-size: 25px;
}

.nav-item>a:active{
  color:#990000;
}

.hidden {
  display:none;
}

.dropdown:hover>.dropdown-menu {
  display: block;
}

.dropdown-item:hover{
  background-color: #b3b3b3;
}

.nav-link:hover{
  color: #FFFFFF;
}

.nav-link.active{
  color: #FFFFFF!important;
  border-bottom: 2px solid white;
}




</style>
</head>
