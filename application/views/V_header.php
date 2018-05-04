<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bitter" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery_ui/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery-number/jquery.number.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/js/gijgo.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/utilities/dynamic-data-render.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/canvasjs/canvasjs.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/jquery/jquery_ui/jquery-ui.min.css">
  <script type="text/javascript" src="<?php echo base_url() ?>assets/utilities/form-validator.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
  padding-top:105px;
  background-color: #e0e0d1;
}


@media screen and (max-width: 500px) {
    body {
        padding-top:25%!important;
    }

    h5{
      font-size: 1.8rem!important;
    }

    h6{
      font-size: 1.2rem!important;
    }

    h2{
      font-size: 1.5rem!important;
    }

    .nav-item{
      font-size: 18px!important;
    }
}

@media screen and (max-width: 560px) {
    body {
        padding-top:19%;
    }
}
.navbar {
  -webkit-box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 46px 0px rgba(0,0,0,0.75);
}

.shadow:hover{
  -webkit-box-shadow: 10px 10px 13px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 13px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 13px 0px rgba(0,0,0,0.75);
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
			width: 100%;
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
  font-size: 22px;
}

.nav-tabs .nav-link{
  color:#FFFFFF;
}

h5{
  font-family: "BebasNeue Regular";
  letter-spacing: 2px;
  font-size: 2.3rem;
  font-weight: 900;
}

h6{
  font-family: "BebasNeue Regular";
  letter-spacing: 1px;
  font-size: 1.5rem;
}

h3{
  font-family: "BebasNeue Regular";
  letter-spacing: 1px;
  font-size: 1rem;
}


.hidden {
  display:none;
}

.navbar .dropdown .dropdown-menu .dropdown-item {
  font-size: 22px;
}

.navbar .dropdown:hover>.dropdown-menu {
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

.navbar-brand{
   max-width:75% !important;
}

.pt-10,
.py-10 {
  padding-top: 6rem !important;
}

.big-icon{
  font-size: 25px;
}

.profil td {
  white-space: normal !important;
  word-wrap: break-word;
  vertical-align: top;
}


table {
  table-layout: fixed;
}

.bg-black{
  background-color: #333333;
}

.ui-autocomplete { z-index:2147483647; }


</style>
</head>
