<title>Tabel Karyawan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>aset/easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>aset/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>aset/easyui/jquery.easyui.min.js"></script>
    
    <table  id="dg" title="Tabel Karyawan" class="easyui-datagrid" style="width:100%;height:400px"
            url="<?php echo base_url(); ?>Tabelkaryawan/gettabelkaryawan"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="Id_karyawan" width="50">Id Karyawan</th>
                <th field="nama_karyawan" width="50">Nama Karyawan</th>
                <th field="alamat" width="50">Alamat</th>
                <th field="ttl" width="50">Tempat Tanggal Lahir</th>
                <th field="pendidikan_terakhir" width="50">Pendidikan Terakhir</th>
                <th field="no_hp" width="50">No Handphone</th>
                <th field="email" width="50">Email</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit Data Karyawan</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="HapusDataKaryawan()">Remove Data Karyawan</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h2>Masukan Data Karyawan</h2>
            <div style="margin-bottom:10px">
                <input name="Id_karyawan" class="easyui-textbox" required="true" label="id karyawan:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="nama_karyawan" class="easyui-textbox" required="true" label="nama karyawan:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="alamat" class="easyui-textbox" required="true" label="alamat:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="ttl" class="easyui-textbox" required="true" label="Tempat Tanggal Lahir:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="pendidikan_terakhir" class="easyui-textbox" required="true" label="Pendidikan Terakhir:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="no_hp" class="easyui-textbox" required="true" label="No Handphone:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="email" class="easyui-textbox" required="true" validType="email" label="Email:" style="width:100%">
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
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit Data Karyawan');
                $('#fm').form('load',row);
                url = '<?php echo base_url(); ?>Tabelkaryawan/UpdateData?id_Id_karyawan='+row.Id_karyawan;
            }
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
        function HapusDataKaryawan(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Are you sure you want to destroy this data?',function(r){
                    if (r){
                        $.post('<?php base_url(); ?>Tabelkaryawan/Hapusdata',{Id_karyawan:row.Id_karyawan},function(result){
                            if (result.success){
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        },'json');
                    }
                });
            }
        }
    </script>
