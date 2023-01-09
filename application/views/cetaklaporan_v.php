	<title>Cetak Laporan</title>
    <div style="background:#333;width:100%;height: 100%;">
    </div>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>aset/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>aset/easyui/jquery.easyui.min.js"></script>

<div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:false,modal:true,border:'thin',buttons:'#dlg-buttons'" title="Cetak laporan">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            </center><h2>Masukan Data Karyawan</h2>
            <div style="margin-bottom:10px">
            	<p><input name="filter" id="id" type="radio" checked="checked" />Berdasarkan id karyawan :</p>
                <input name="Id_karyawan" id="Id_karyawan" class="easyui-textbox" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
            	<p><input name="filter" id="nama" type="radio" />Berdasarkan nama karyawan :</p>
                <input name="nama_karyawan" id="nama_karyawan" class="easyui-textbox" style="width:100%">
   
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton " iconCls="icon-excel" onclick="Laporan('excel')">CETAK EXCEL</a>

        <a href="javascript:void(0)" class="easyui-linkbutton " iconCls="icon-pdf" onclick="Laporan('pdf')">CETAK PDF</a>
        
    </div>

    <script type="text/javascript">
    	function Laporan(ket){
    		if (document.getElementById('id').checked==true){
    			var datalaporan="filter=id&Id_karyawan="+document.getElementById('Id_karyawan').value;
    		}
    		if (document.getElementById('nama').checked==true){
    			var datalaporan="filter=nama&nama_karyawan="+document.getElementById('nama_karyawan').value;
    		}
    		if(ket=='excel'){
    			window.open('<?php echo base_url(); ?>cetaklaporan/cetakexcel?'+datalaporan);
    		}else{
    			window.open('<?php echo base_url(); ?>cetaklaporan/cetakpdf?'+datalaporan);
    		}
    	}
    </script>	