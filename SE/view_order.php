<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);  
require_once './config/config.php';
require_once 'includes/auth_validate.php';


// Sanitize if you want
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;
 $db = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //Get customer id form query string parameter.
    $id = filter_input(INPUT_GET, 'customer_id', FILTER_SANITIZE_STRING);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);
    
    $data_to_update['updated_at'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    $db->where('id',$customer_id);
    $stat = $db->update('products', $data_to_update);

    if($stat)
    {
        $_SESSION['success'] = "Customer updated successfully!";
        //Redirect to the listing page,
        header('location: customers.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }
}


//If edit variable is set, we are performing the update operation.

    $db->where('id', $id);
    //Get data to pre-populate the form.
    $orders = $db->getOne("orders");

   //h print_r($orders);
    $localcost=0;
    $tranafer='';
    $mccb='';
    //transerfer
    $transfering=false;

    // metering
    $metering=false;
    $mfm='';
    $ct='';
    $lamp='';
    $mcb='';

    // surge
    $surge=false;
    $spd='';
   // outgoing
    $outgoing=false;
    $mcb_otg='';

    // $monitoring
    $monitoring=false;
    $hmi='';

    $bcpm='';

    // pdu
    $pdu_cib=false;
    $cooling_fan='';
    $frame='';


    ////
    $serial=1;

    /// condtion 
    //Array ( [id] => 9 [transfarmer] => 3 [transfarmer_qty] => 1 [mccb] => 2 [mccb_qty] => 1 [mfm] => 2 [mfm_qty] => 2 [ct] => 2 [ct_qty] => 2 [lamp] => 1 [lamp_qty] => 1 [control_mcb] => 2 [control_mcb_qty] => 2 [spd] => 1 [spd_qty] => 2 [mcb_otg] => 2 [mcb_otg_qty] => 2 [hmi] => 1 [hmi_qty] => 1 [bcpm] => 2 [bcpm_qty] => 2 [cf] => 1 [cf_qty] => 1 [frame] => 4 [frame_qty] => 1 [created_at] => 2024-06-11 19:11:24 [updated_at] => [created_by] => 4 )
    //Array ( [id] => 9 [transfarmer] => 3 [transfarmer_qty] => 1 [mccb] => 2 [mccb_qty] => 1 [mfm] => 2 [mfm_qty] => 2 [ct] => 2 [ct_qty] => 2 [lamp] => 1 [lamp_qty] => 1 [control_mcb] => 2 [control_mcb_qty] => 2 [spd] => 1 [spd_qty] => 2 [mcb_otg] => 2 [mcb_otg_qty] => 2 [hmi] => 1 [hmi_qty] => 1 [bcpm] => 2 [bcpm_qty] => 2 [cf] => 1 [cf_qty] => 1 [frame] => 4 [frame_qty] => 1 [created_at] => 2024-06-11 19:11:24 [updated_at] => [created_by] => 4 )
   if($orders['transfarmer']!='' && $orders['transfarmer']!=0) 
    {
       $data=explode(',',$orders['transfarmer']);
       $qty=explode(',',$orders['transfarmer_qty']);
      // $trans_yes=array();
     
       $c=0;
       $transfering=true;
       foreach($data as $d){
       $db->where('tf_id', $d);
       $trans_yes = $db->getOne("transfers");  
       $tranafer.="<tr><td>".$serial."</td><td>Transformer</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$c]."</td></tr>";
       $localcost= $localcost + ($qty[$c]*$trans_yes['Unit_cost']);
        $tran_heading =explode(',',$trans_yes['Bill_of_Material']);
        $tran_heading = $tran_heading[0].' PDU';
       
       $serial++;
       $c++;

       }
    }

    if($orders['mccb']!='')
    {
       $data=explode(',',$orders['mccb']);
       $qty=explode(',',$orders['mccb_qty']);
      // $trans_yes=array();
    
       $mc=0;
       
       foreach($data as $d){
       $db->where('mccb_id', $d);
       $trans_yes = $db->getOne("mccb");  
       $mk=$mc+1;
       $mccb.="<tr><td>".$serial."</td><td>MCCB (Q".$mk.")</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$mc]."</td></tr>";
       $localcost= $localcost + ($qty[$mc]*$trans_yes['Unit_cost']);
       $serial++;
       $mc++;

       }
    }

    if($orders['mfm']!='')
    {
       $data=explode(',',$orders['mfm']);
       $qty=explode(',',$orders['mfm_qty']);
      // $trans_yes=array();
      $metering=true;
       $mfm_c=0;
       foreach($data as $d){
       $db->where('mfm_id', $d);
       $trans_yes = $db->getOne("mfm");  
       $mfm.="<tr><td>".$serial."</td><td>MFM</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$mfm_c]."</td></tr>";
       $localcost= $localcost + ($qty[$mfm_c]*$trans_yes['Unit_cost']);
       $serial++;
       $mfm_c++;

       }
    }

    
    if($orders['ct']!='')
    {
       $data=explode(',',$orders['ct']);
       $qty=explode(',',$orders['ct_qty']);
      // $trans_yes=array();
      $metering=true;
       $ct_c=0;
       foreach($data as $d){
       $db->where('ct_id', $d);
       $trans_yes = $db->getOne("ct");  
       $ct.="<tr><td>".$serial."</td><td>CT</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$ct_c]."</td></tr>";
       $localcost= $localcost + ($qty[$ct_c]*$trans_yes['Unit_cost']);
       $serial++;
       $ct_c++;

       }
    }

     
    if($orders['lamp']!='')
    {
       $data=explode(',',$orders['lamp']);
       $qty=explode(',',$orders['lamp_qty']);
      // $trans_yes=array();
      $metering=true;
       $lamp_c=0;
       foreach($data as $d){
       $db->where('lamp_id', $d);
       $trans_yes = $db->getOne("lamps");  
       $lamp.="<tr><td>".$serial."</td><td>Lamps</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$lamp_c]."</td></tr>";
       $localcost= $localcost + ($qty[$lamp_c]*$trans_yes['Unit_cost']);
       $serial++;
       $lamp_c++;

       }
    }

      
    if($orders['control_mcb']!='')
    {
       $data=explode(',',$orders['control_mcb']);
       $qty=explode(',',$orders['control_mcb_qty']);
      // $trans_yes=array();
      $metering=true;
       $mcb_c=0;
       foreach($data as $d){
       $db->where('control_mcb_id', $d);
       $trans_yes = $db->getOne("control_mcb");  
       $mcb.="<tr><td>".$serial."</td><td>MCB</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$mcb_c]."</td></tr>";
       $localcost= $localcost + ($qty[$mcb_c]*$trans_yes['Unit_cost']);
       $serial++;
       $mcb_c++;

       }
    }


    if($orders['spd']!='')
    {
       $data=explode(',',$orders['spd']);
       $qty=explode(',',$orders['spd_qty']);
      // $trans_yes=array();
      $surge=true;
       $spd_c=0;
       foreach($data as $d){
       $db->where('spd_id', $d);
       $trans_yes = $db->getOne("surge_protection");  
       $spd.="<tr><td>".$serial."</td><td>SPD</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$spd_c]."</td></tr>";
       $localcost= $localcost + ($qty[$spd_c]*$trans_yes['Unit_cost']);
       $serial++;
       $spd_c++;

       }
    }
    

    if($orders['mcb_otg']!='')
    {
       $data=explode(',',$orders['mcb_otg']);
       $qty=explode(',',$orders['mcb_otg_qty']);
      // $trans_yes=array();
      $outgoing=true;
       $mcbo_c=0;
       foreach($data as $d){
       $db->where('mcb_ot_id', $d);
       $trans_yes = $db->getOne("outgoing_mcb");  
       $mcb_otg.="<tr><td>".$serial."</td><td>MCB</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$mcbo_c]."</td></tr>";
       $localcost= $localcost + ($qty[$mcbo_c]*$trans_yes['Unit_cost']);
       $serial++;
       $mcbo_c++;

       }
    }


    if($orders['hmi']!='')
    {
       $data=explode(',',$orders['hmi']);
       $qty=explode(',',$orders['hmi_qty']);
      // $trans_yes=array();
      $monitoring=true;
       $hmi_c=0;
       foreach($data as $d){
       $db->where('hmi_id', $d);
       $trans_yes = $db->getOne("hmi");  
       $hmi.="<tr><td>".$serial."</td><td>HMI</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$hmi_c]."</td></tr>";
       $localcost= $localcost + ($qty[$hmi_c]*$trans_yes['Unit_cost']);
       $serial++;
       $hmi_c++;

       }
    }
    
    if($orders['bcpm']!='')
    {
       $data=explode(',',$orders['bcpm']);
       $qty=explode(',',$orders['bcpm_qty']);
      // $trans_yes=array();
      $monitoring=true;
       $bcpm_c=0;
       foreach($data as $d){
       $db->where('bcpma_id', $d);
       $trans_yes = $db->getOne("bcpma");  
       $bcpm.="<tr><td>".$serial."</td><td>BCPM</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$bcpm_c]."</td></tr>";
       $localcost= $localcost + ($qty[$bcpm_c]*$trans_yes['Unit_cost']);
       $serial++;
       $bcpm_c++;

       }
    }

    if($orders['cf']!='')
    {
       $data=explode(',',$orders['cf']);
       $qty=explode(',',$orders['cf_qty']);
      // $trans_yes=array();
      $pdu_cib=true;
       $cf_c=0;
       foreach($data as $d){
       $db->where('cooling_id', $d);
       $trans_yes = $db->getOne("cooling_fan");  
       $cooling_fan.="<tr><td>".$serial."</td><td>Cooling Fan</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$cf_c]."</td></tr>";
       $localcost= $localcost + ($qty[$cf_c]*$trans_yes['Unit_cost']);
       $serial++;
       $cf_c++;

       }
    }

    if($orders['frame']!='')
    {
       $data=explode(',',$orders['frame']);
       $qty=explode(',',$orders['frame_qty']);
      // $trans_yes=array();
      $pdu_cib=true;
       $frame_c=0;
       foreach($data as $d){
       $db->where('frame_id', $d);
       $trans_yes = $db->getOne("frame");  
       $frame.="<tr><td>".$serial."</td><td>Frame</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$frame_c]."</td></tr>";
       $localcost= $localcost + ($qty[$frame_c]*$trans_yes['Unit_cost']);
       $serial++;
       $frame_c++;

       }
    }

?>


<?php
    include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Orders</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            //Include the common form for add and edit  
            require_once('./forms/view_order_form.php'); 
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; 

function IND_money_format($number){
    $decimal = (string)($number - floor($number));
    $money = floor($number);
    $length = strlen($money);
    $delimiter = '';
    $money = strrev($money);

    for($i=0;$i<$length;$i++){
        if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$length){
            $delimiter .=',';
        }
        $delimiter .=$money[$i];
    }

    $result = strrev($delimiter);
    $decimal = preg_replace("/0\./i", ".", $decimal);
    $decimal = substr($decimal, 0, 3);

    if( $decimal != '0'){
        $result = $result.$decimal;
    }

    return $result;
}

?>
<script>
function printDiv() {
        //Get the HTML of div
        document.getElementById("headline").style.display = "block";
        var divElements = document.getElementById('mytable').innerHTML;
       // alert(divElements);
        document.getElementById("headline").style.display = "none";
        
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        var htmlToPrint = '' +
'<style type="text/css"> print-color-adjust: exact;' +
'table {' +
  'border-collapse: collapse;' +
  '}'+
'table tr {' +
'border-top: 1px solid gray !important;' +
'}' +
'td{' +
'border-top: 1px solid gray !important;' +
'}' +
'img {' +
'top: 0; left: 0; postion:relative; display:block;' +
'}' + 
'</style>';
        document.body.innerHTML =  "<html><head><title></title></head><body>" + htmlToPrint +
divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;

    }
</script>    

