<title>Data Karyawans</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>aset/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>aset/easyui/jquery.easyui.min.js"></script>
    <table id="dg" title="Tabel Karyawan" class="easyui-datagrid" style="width:100%;height:400px"
            url="<?php echo base_url(); ?>Tabelkaryawan/gettabelkaryawan"
            toolbar="#toolbar" pagination="false"
            rownumbers="false" fitColumns="false" singleSelect="false">
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Tambah Data karyawan</a>
    </div>
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
       <form url="<?php echo base_url(); ?>Tabelkaryawan/gettabelkaryawan"  id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h2>Masukan Data Karyawan</h2>
            <div style="margin-bottom:10px">
                <p> id karyawan : </p>
                <input name="Id_karyawan" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <p> nama karyawan : </p>
                <input name="nama_karyawan" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <p> Alamat : </p>
                <input name="alamat" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <p> Tempat Tanggal Lahir : </p>
                <input name="ttl" class="easyui-textbox" required="true"  style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <p> Pendidikan Terakhir : </p>
                <input name="pendidikan_terakhir" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <p> No Handphone : </p>
                <input name="no_hp" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <p> Email : </p>
                <input name="email" class="easyui-textbox" required="true" validType="email" style="width:100%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Tambah Data Karyawan');
            $('#fm').form('clear');
            url = '<?php echo base_url(); ?>Tabelkaryawan/SimpanData';
        }
        function saveUser(){
            $('#fm').form('submit',{
                url: url,
                iframe:false,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        alert(result.konfirmasi);
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }
    </script>   