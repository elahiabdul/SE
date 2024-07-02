<?php
ob_start();
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';

//print_r($_POST);

$trans='';
$mfm_chk='';
$ct_chk='';
$mcbotg_chk='';
$mcbctl_chk='';
if(isset($_REQUEST['filter']))
{
   // print_r($_REQUEST);
    $trans=$_REQUEST['trans'];
    $mfm_chk=$_REQUEST['mfm_chk'];
    $ct_chk=$_REQUEST['ct_chk'];
    $mcbotg_chk=$_REQUEST['mcbotg_chk'];
    $mcbctl_chk=$_REQUEST['mcbctl_chk'];
    
    
}

$db = getDbInstance();
$qry= 'select `Bill_of_Material`,`tf_id` from  transfers';
if($trans!=''){
    $qry.= " where Bill_of_Material like '%".$trans."%'" ;
    $mccb_int = (int)filter_var($trans, FILTER_SANITIZE_NUMBER_INT); 

}   

$transfers= $db->rawQuery($qry);
$dtranfer=array();
$tf_option ='<option value="0">Select Options</option>';
if(count($transfers) > 0){
    
    foreach($transfers as $tf)
    {
       $tf_option .='<option value="'.$tf["tf_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
       array_push($dtranfer,$tf["Bill_of_Material"]);
       
    }
    
}

$my_mccb = [
    "20" => "40A",
    "40" => "100A",
    "60" => "100A",
    "100" => "160A",
    "150" => "250A",
    "200" => "320A",
    "250" => "400A",
    "300" => "630A",
    "350" => "630A",
    "400" => "630A",
    "450" => "800A",
    "500" => "800A"
  ];
  $mccb_chk= @$my_mccb[$mccb_int];
  $qry='select `Bill_of_Material`,`mccb_id` from  mccb';
  if($mccb_chk!=''){
    $qry.= " where Bill_of_Material like '%".$mccb_chk."%'" ;
  }  


  
  
 // echo $qry;
$mccb = $db->rawQuery($qry);
$mccb_option ='<option value="0">Select Options</option>';
if(count($mccb) > 0){
    
    foreach($mccb as $tf)
    {
       $mccb_option .='<option value="'.$tf["mccb_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
    }
    
}

$qry='select `Bill_of_Material`,`mfm_id` from  mfm';


if($mfm_chk!=''){
    $qry.= " where Bill_of_Material like '%".$mfm_chk."%'" ;
  }  

$mfm = $db->rawQuery($qry);

$mfm_option ='<option value="0">Select Options</option>';
if(count($mfm) > 0){
    
    foreach($mfm as $tf)
    {
       $mfm_option .='<option value="'.$tf["mfm_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
    }
    
}

$qry='select `Bill_of_Material`,`ct_id` from  ct';

if($ct_chk!=''){
    $qry.= " where Bill_of_Material like '%".$ct_chk."%'" ;
  } 
$ct = $db->rawQuery($qry);
$ct_option ='<option value="0">Select Options</option>';
if(count($ct) > 0){
   
    foreach($ct as $tf)
    {
       $ct_option .='<option value="'.$tf["ct_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
    }
    
}

$lamp = $db->rawQuery('select `Bill_of_Material`,`lamp_id` from  lamps');

if(count($lamp) > 0){
    $lamp_option ='<option value="0">Select Options</option>';
    foreach($lamp as $tf)
    {
       $lamp_option .='<option value="'.$tf["lamp_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
    }
    
}


$qry='select `Bill_of_Material`,`control_mcb_id` from  control_mcb';

if($mcbctl_chk!=''){
    $qry.= " where Bill_of_Material like '%".$mcbctl_chk."%'" ;
  } 
$control_mcb = $db->rawQuery($qry);

$mcb_option ='<option value="0">Select Options</option>';

if(count($control_mcb) > 0){
   
    foreach($control_mcb as $tf)
    {
       $mcb_option .='<option value="'.$tf["control_mcb_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
    }
    
}


$spd = $db->rawQuery('select `Bill_of_Material`,`spd_id` from  surge_protection');

if(count($spd) > 0){
    $spd_option ='<option value="0">Select Options</option>';
    foreach($spd as $tf)
    {
       $spd_option .='<option value="'.$tf["spd_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
    }
    
}

$qry='select `Bill_of_Material`,`mcb_ot_id` from  outgoing_mcb';

if($mcbotg_chk!=''){
    $qry.= " where Bill_of_Material like '%".$mcbotg_chk."%'" ;
  } 

$outgoing_mcb = $db->rawQuery($qry);
$outgoing_mcb_option ='<option value="0">Select Options</option>';
if(count($outgoing_mcb) > 0){
   
    foreach($outgoing_mcb as $tf)
    {
       $outgoing_mcb_option .='<option value="'.$tf["mcb_ot_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
    }
    
}

$hmi = $db->rawQuery('select `Bill_of_Material`,`hmi_id` from  hmi');

if(count($hmi) > 0){
    $hmi_option ='<option value="0">Select Options</option>';
    foreach($hmi as $tf)
    {
       $hmi_option .='<option value="'.$tf["hmi_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
    }
    
}


$bcpma = $db->rawQuery('select `Bill_of_Material`,`bcpma_id` from  bcpma');

if(count($bcpma) > 0){
    $bcpma_option ='<option value="0">Select Options</option>';
    foreach($bcpma as $tf)
    {
       $bcpma_option .='<option value="'.$tf["bcpma_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
    }
    
}


$cooling = $db->rawQuery('select `Bill_of_Material`,`cooling_id` from  cooling_fan');

if(count($cooling) > 0){
    $cooling_option ='<option value="0">Select Options</option>';
    foreach($cooling as $tf)
    {
       $cooling_option .='<option value="'.$tf["cooling_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
    }
    
}


$frame = $db->rawQuery('select `Bill_of_Material`,`frame_id` from frame');

if(count($frame) > 0){
    $frame_option ='<option value="0">Select Options</option>';
    foreach($frame as $tf)
    {
       $frame_option .='<option value="'.$tf["frame_id"].'"> '.$tf["Bill_of_Material"].'</option>' ; 
    }
    
}





/// qty_arr
$qty_arr='<option value="1">Qty</option>';
for($i=1;$i<=100;$i++)
{
    $qty_arr .='<option value='.$i.'> '.$i.'</option>' ; 

}
//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;



if($_SESSION['admin_type']=='user'){
    $_SESSION['failure'] = "You don't have permission to perform this action";
    header('location: orders.php');
    exit();
}

///// 


//print_r($_SESSION);
//serve POST method, After successful insert, redirect to customers.php page.
if (isset($_REQUEST['hid']) && $_REQUEST['hid']=='1') 
{
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_store = array_filter($_POST);
    //echo count($data_to_store);
   //print_r($data_to_store);
   //print_r($data_to_store);
   //echo "<pre>";
   $error='';
   $values=array();
   $keys=array_keys($data_to_store);
   foreach ($keys as $key){
    
    //echo $key;
    $values[$key]=implode(',',$data_to_store[$key]);
    
   

   }
   //print_r($keys);
   //exit;
  /*
  
   if(!isset($values['mfm']) || $values['mfm']=='0'){
    $error.="<li>MFM data was not filled.</li>";
   // exit;
   }

   if(!isset($values['ct']) || $values['ct']=='0'){
    $error.="<li>CT data was not filled.</li>";
    //exit;
   }

   if(!isset($values['lamp']) || $values['lamp']=='0'){
    $error.="<li>lamp data was not filled.</li>";
    //exit;
   }
   */
   $mandate_array=array('mccb','mfm','ct','lamp','control_mcb','frame');
   foreach($mandate_array as $mnd){

    
    if(!isset($values[$mnd]) || $values[$mnd]=='0'){
        if($mnd!=='control_mcb')
        $error.="<li>".strtoupper($mnd). " data was not filled.</li>";
        else
        $error.="<li>MCB [Control] data was not filled.</li>";
        
       }

   }

 
    
    //Insert timestamp
    unset($values['hid']);

    $values['created_at'] = date('Y-m-d H:i:s');
    $values['created_by'] = $_SESSION['userid'];

    if($error == ''){
        $db = getDbInstance();
        $last_id = $db->insert('orders', $values);
        if($last_id)
        {
            $_SESSION['success'] = "Order added successfully!";
            header('location: orders.php');
            exit();
        }
        else
        {
            
            
            $_SESSION['failure'] = "Error in Form Please contact admin.";
             header('location: orders.php');
            echo 'insert failed: ' . $db->getLastError();
            exit();
        }
   }
   else
   {
    $_SESSION['failure'] = 'Error in data, Below data are mandatory <br/> <br/> <ul>'.$error.'</ul>';
     header('location: orders.php?err=1');
    exit();

   }
}



require_once 'includes/header.php'; 
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Create Order</h2>
        </div>
        
</div>
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  id="customer_form" onchange="loader_price()" enctype="multipart/form-data">
       <?php  include_once('./forms/order_form.php'); ?>
    </form>
</div>


<script type="text/javascript">
$(document).ready(function(){
   $("#customer_form").validate({
       rules: {
            f_name: {
                required: true,
                minlength: 3
            },
            l_name: {
                required: true,
                minlength: 3
            },   
        }
    });
});
</script>

<?php include_once 'includes/footer.php'; ?>
<style>
.form-group.required .control-label:after {
  content:"*";
  color:red;
}
 </style>   