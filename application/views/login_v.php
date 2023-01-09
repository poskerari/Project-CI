<!doctype html> 
<html>
<head>
    <style>
        body{
            
            background-image: url(aset/image/gg2.png);
        }
    </style>
    <meta charset="UTF-8">  
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Login</title> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/themes/metro/easyui.css">  
    <link rel="stylesheet" type="text/css" href="<?php  echo base_url(); ?>aset/easyui/themes/mobile.css">  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/themes/icon.css">  
    <script type="text/javascript" src="<?php echo base_url(); ?>aset/easyui/jquery.min.js"></script>  
    <script type="text/javascript" src="<?php echo base_url(); ?>aset/easyui/jquery.easyui.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>aset/easyui/jquery.easyui.mobile.js"></script> 
</head>
<script type="text/javascript">
    function submitlogin(){
        document.getElementById("formlogin").submit();
    }
</script>
<body>
    <div class="body">
         <form id="formlogin" name="formlogin" method="post"action="<?php echo base_url();?>Login/ceklogin">
        <header>
            <div class="m-toolbar">
                <center>
            <div>
                <br>
                <font color="black" face="Showcard Gothic"><center><h2>Login to System</h2></center></font>
            </div>
            </div>
        </header>
        <div style="margin:20px auto;width:250px;height:250px;border-radius:250px;overflow:hidden">
            <img src="<?php echo base_url(); ?>aset/image/0.gif" style="margin:0;width:100%;height:100%;">
        </div>
        <div style="padding:0 20px">
            <div style="text-align:center;margin-bottom:10px">
                <input class="easyui-textbox" id="username" name="username"data-options="prompt:'Type username',iconCls:'icon-man'" style="width:50%;height:38px">
            </div>
            <div style="text-align:center;">
                <input class="easyui-passwordbox" id="password" name="password"data-options="prompt:'Type password'" style="width:50%;height:38px">
            </div>
            <div style="text-align:center;margin-top:30px">
                <button><a href="#" class="easyui-linkbutton" onClick="submitlogin()" style="width:70px;height:40px"><span style="font-size:16px">Login</span></a></button>
            </div>
        </div>
        </form>
    </div>
</body>    
</html> 