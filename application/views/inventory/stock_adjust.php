<h1>|| ADJUSTMENT STOCK || 
	<?
	echo link_button("Print","print_adjust()","print");	
	?>	
</H1>
<form id="frmItem" method='post' >
   <table>
	<tr>
		<td>Nomor</td><td><?php 
                echo form_input('shipment_id',$shipment_id,'id=shipment_id');
        ?></td>
	</tr>
       <tr>
		<td>Tanggal</td><td><?php  
                echo form_input('date_received',$date_received
				,"id='date_received' class='easyui-datetimebox' required");
                
        ?></td>
       </tr>
	<tr>
		<td>Gudang</td><td><?php 
                echo form_dropdown('warehouse_code',
                    $warehouse_list,$warehouse_code,'id=warehouse_code');
                
                ?></td>
	</tr>
    <tr>
		<td>Catatan</td>
		<td><?php 
                	echo form_input('comments',$comments,'style="width:400px"');
        ?></td>
     </tr>
	 <tr><td>&nbsp</td><td>&nbsp</td></tr>
   </table>
<H1></H1>
<!-- LINEITEMS -->	
<h1>ITEMS DETAIL</H1>
<div id='dgItem'><?=load_view('inventory/select_item_no_price.php')?></div>
</form>


<div id='divItem' style='display:<?=$mode=="add"?"":""?>'>
	<table id="dg" class="easyui-datagrid"  
		style="width:800px;min-height:800px"
		data-options="
			iconCls: 'icon-edit',
			singleSelect: true,
			toolbar: '#tb',
			url: url_load_item
		">
		<thead>
			<tr>
				<th data-options="field:'item_number',width:80">Kode Barang</th>
				<th data-options="field:'description',width:150">Nama Barang</th>
				<th data-options="field:'quantity_received',width:50,align:'right',editor:{type:'numberbox',options:{precision:2}}">Qty</th>
				<th data-options="field:'unit',width:50,align:'left',editor:'text'">Satuan</th>
				<th data-options="field:'line_number',width:30,align:'right'">Line</th>
			</tr>
		</thead>
	</table>
</div>	
<!-- LINEITEMS -->

 <script language='javascript'>
 	var grid_output="dg";
	var url_save_item = '<?=base_url()?>index.php/stock_adjust/save_item';
	var url_load_item = url_detail();
	var url_del_item  = '<?=base_url()?>index.php/stock_adjust/del_item';

    function url_detail(){
	 	var nomor=$('#shipment_id').val();
    	$('#ref_number').val(nomor);
    	return ('<?=base_url()?>index.php/stock_adjust/items/'+nomor+'/json');
    }
	function print_adjust(){
		nomor=$("#shipment_id").val();
		url="<?=base_url()?>index.php/stock_adjust/print_adjust/"+nomor;
		window.open(url,'_blank');
	}
    
 </script>
