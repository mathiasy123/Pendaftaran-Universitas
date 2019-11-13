<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- OWN CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/style.css">

    <!-- JQUERY -->
    <script src="<?php echo base_url(); ?>assets2/js/jquery-3.3.1.min.js"></script>

    <!-- SCRIPT -->
    <script tupe="text/javascript" src="<?php echo base_url(); ?>assets2/js/script.js"></script>

    <!-- AJAX SCRIPT -->
    <script tupe="text/javascript" src="<?php echo base_url(); ?>assets/js/script_for_ajax.js"></script>

    <!-- TITLE --> 
    <title><?php echo $judul; ?></title>
</head>

<body>
    <!-- FLOATING BUTTON LOGOUT -->
    <div class="fixed-action-btn">
        <a href="<?php echo base_url(); ?>auth/logout" class="btn-floating btn-large red waves-effect waves-light">
            <i class="large material-icons">power_settings_new</i>
        </a>
    </div>
    <!-- END FLOATING BUTTON LOGOUT -->
    
    <!-- FLOATING BUTTON LOGOUT -->
    <div class="fixed-action-btn btn-top">
        <a href="#modalFormNomor" class="btn-floating modal-trigger btn-large blue waves-effect waves-light">
            <i class="large material-icons">info</i>
        </a>
    </div>
    <!-- END FLOATING BUTTON LOGOUT -->

    <!-- Modal Structure -->
    <div id="modalFormNomor" class="modal">
        <div class="modal-content center-align">
            <h4>Nomor Pendaftaran</h4>
            <h5>Nomor Pendaftaran Anda: <?php echo $user["nomor_pendaftaran"]; ?></h5>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close red lighten-1 white-text waves-effect waves-light btn-flat">Tutup</a>
        </div>
    </div>