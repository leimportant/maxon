<?
         $CI =& get_instance();
         $CI->load->model('company_model');
         $model=$CI->company_model->get_by_id($CI->access->cid)->row();
         $CI->load->model('inventory_model');
?>
<link href="<?php echo base_url();?>/themes/standard/style_print.css" rel="stylesheet">
<table cellspacing="0" cellpadding="1" border="0" width='800px'> 
     <tr>
     	<td colspan='2'><h2><?=$model->company_name?></h2></td><td colspan='2'><h2>BUKTI TRANSFER STOCK</h2></td>     	
     </tr>
     <tr>
     	<td colspan='2'><?=$model->street?></td><td>Nomor: <?=$transfer_id?></td>     	
     </tr>
     <tr>
     	<td colspan='2'><?=$model->suite?></td>     	
     </tr>
     <tr>
     	<td colspan=4 style='border-bottom: black solid 1px'><?=$model->city_state_zip_code?> - Phone: <?=$model->phone_number?>
     	</td>     	
     	
     </tr>
     <tr>
     	<td>Tanggal</td><td><?=$date_trans?></td>
     	<td colspan='2'></td>
     </tr>
     <tr>
     	<td>Gudang Sumber</td><td><?=$from_location?></td>
     	<td colspan='2'></td>
     </tr>
     <tr>
     	<td>Gudang Tujuan</td><td><?=$to_location?></td>
     	<td colspan='2'></td>
     </tr>
     <tr>
     	<td>Catatan</td><td><?=$comments?></td>
     	<td colspan='2'></td>
     </tr>
     <tr>
     	<td></td><td></td>
     	<td colspan='2'></td>
     </tr>
     <tr>
     	<td></td><td></td>
     	<td colspan='2'></td>
     </tr>
     <tr>
     	<td colspan="8">
     	<table class='titem'>
     		<thead>
     			<tr><td>Kode Barang</td><td>Nama Barang</td><td>Qty</td><td>Unit</td>
     			</tr>
     		</thead>
     		<tbody>
     			<?
		       $sql="select i.item_number,s.description,i.from_qty,i.unit 
		                from inventory_moving i left join inventory s on s.item_number=i.item_number
		                where i.transfer_id='".$transfer_id."'";
		        $query=$CI->db->query($sql);

     			$tbl="";
                 foreach($query->result() as $row){
                    $tbl.="<tr>";
                    $tbl.="<td>".$row->item_number."</td>";
                    $tbl.="<td>".$row->description."</td>";
                    $tbl.="<td align='right'>".number_format($row->from_qty)."</td>";
                    $tbl.="<td>".$row->unit."</td>";
                    $tbl.="</tr>";
               };
			   echo $tbl;
    			?>
     		</tbody>
     	</table>
     	
     	
     	</td>
     </tr>
</table>
