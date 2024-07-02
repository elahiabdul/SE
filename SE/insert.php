<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';



$orders=$_REQUEST;
//$transfarmer=$_REQUEST['transfarmer'];
//echo '<pre>';
//print_r($orders);
$db = getDbInstance();
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

    // pdu
    $pdu_cib=false;
    $cooling_fan='';
    $frame='';
    $bcpm='';


    ////
    $serial=1;

if(@$orders['transfarmer'][0] > 0) 
    {
       $data=$orders['transfarmer'];
       $qty=$orders['transfarmer_qty'];
      // $trans_yes=array();
     
       $c=0;
       $transfering=true;
       foreach($data as $d){
       $db->where('tf_id', $d);
       $trans_yes = $db->getOne("transfers");  
       $tranafer.="<span>  <p> <b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']." - ".$trans_yes['Type']." <br/><i> Qty : ".$qty[$c]." </i> </p></span>";
       $localcost= $localcost + ($qty[$c]*$trans_yes['Unit_cost']);
        $tran_heading =explode(',',$trans_yes['Bill_of_Material']);
        $tran_heading = $tran_heading[0].' PDU';
       
       $serial++;
       $c++;

       }
	   echo "<h5> Transformer </h5> ".$tranafer;
    }

	if($orders['mccb'][0] > 0)
    {
       $data=$orders['mccb'];
       $qty=$orders['mccb_qty'];
      // $trans_yes=array();
    
       $mc=0;
       
       foreach($data as $d){
       $db->where('mccb_id', $d);
       $trans_yes = $db->getOne("mccb");  
       $mk=$mc+1;
       $mccb.="<span><p><b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']."-".$trans_yes['Type']." <br/><i> Qty :".$qty[$mc]."</i> </p></span>";
       $localcost= $localcost + ($qty[$mc]*$trans_yes['Unit_cost']);
       $serial++;
       $mc++;

       }
	   echo "<h5> MCCB </h5> ".$mccb;
    }

    if($orders['mfm'][0] > 0)
    {
       $data=$orders['mfm'];
       $qty=$orders['mfm_qty'];
      // $trans_yes=array();
      $metering=true;
       $mfm_c=0;
       foreach($data as $d){
       $db->where('mfm_id', $d);
       $trans_yes = $db->getOne("mfm");  
       $mfm.="<span><p><b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']."-".$trans_yes['Type']." <br/><i> Qty :".$qty[$mfm_c]."</i> </p></span>";
       $localcost= $localcost + ($qty[$mfm_c]*$trans_yes['Unit_cost']);
       $serial++;
       $mfm_c++;

       }
	   echo "<h5> MFM </h5> ".$mfm;
    }

    
    if($orders['ct'][0] > 0)
    {
       $data=$orders['ct'];
       $qty=$orders['ct_qty'];
      // $trans_yes=array();
      $metering=true;
       $ct_c=0;
       foreach($data as $d){
       $db->where('ct_id', $d);
       $trans_yes = $db->getOne("ct");  
       $ct.="<span><p><b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']."-".$trans_yes['Type']." <br/><i> Qty :".$qty[$ct_c]."</i> </p></span>";
       $localcost= $localcost + ($qty[$ct_c]*$trans_yes['Unit_cost']);
       $serial++;
       $ct_c++;

       }
	   echo "<h5> CT </h5> ".$ct;
    }

     
    if($orders['lamp'][0] > 0)
    {
       $data=$orders['lamp'];
       $qty=$orders['lamp_qty'];
      // $trans_yes=array();
      $metering=true;
       $lamp_c=0;
       foreach($data as $d){
       $db->where('lamp_id', $d);
       $trans_yes = $db->getOne("lamps");  
	   $lamp.="<span><p><b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']."-".$trans_yes['Type']." <br/><i> Qty :".$qty[$lamp_c]."</i> </p></span>";
       $localcost= $localcost + ($qty[$lamp_c]*$trans_yes['Unit_cost']);
       $serial++;
       $lamp_c++;

       }
	   echo "<h5> Lamp </h5> ".$lamp;
    }

      
    if($orders['control_mcb'][0] > 0)
    {
       $data=$orders['control_mcb'];
       $qty=$orders['control_mcb_qty'];
      // $trans_yes=array();
      $metering=true;
       $mcb_c=0;
       foreach($data as $d){
       $db->where('control_mcb_id', $d);
       $trans_yes = $db->getOne("control_mcb");  
      // $mcb.="<tr><td>".$serial."</td><td>MCB</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$mcb_c]."</td></tr>";
	   $mcb.="<span><p><b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']."-".$trans_yes['Type']." <br/><i> Qty :".$qty[$mcb_c]."</i> </p></span>";
 
	   $localcost= $localcost + ($qty[$mcb_c]*$trans_yes['Unit_cost']);
       $serial++;
       $mcb_c++;

       }
	   echo "<h5> MCB </h5> ".$mcb;
    }


    if($orders['spd'][0] > 0)
    {
       $data=$orders['spd'];
       $qty=$orders['spd_qty'];
      // $trans_yes=array();
      $surge=true;
       $spd_c=0;
       foreach($data as $d){
       $db->where('spd_id', $d);
       $trans_yes = $db->getOne("surge_protection");  
	   $spd.="<span><p><b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']."-".$trans_yes['Type']." <br/><i> Qty :".$qty[$spd_c]."</i> </p></span>";

       //$spd.="<tr><td>".$serial."</td><td>SPD</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$spd_c]."</td></tr>";
       $localcost= $localcost + ($qty[$spd_c]*$trans_yes['Unit_cost']);
       $serial++;
       $spd_c++;

       }
	   echo "<h5> SPD </h5> ".$spd;
    }
    

    if($orders['mcb_otg'][0] > 0)
    {
       $data=$orders['mcb_otg'];
       $qty=$orders['mcb_otg_qty'];
      // $trans_yes=array();
      $outgoing=true;
       $mcbo_c=0;
       foreach($data as $d){
       $db->where('mcb_ot_id', $d);
       $trans_yes = $db->getOne("outgoing_mcb");  
	   $mcb_otg.="<span><p><b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']."-".$trans_yes['Type']." <br/><i> Qty :".$qty[$mcbo_c]."</i> </p></span>";

     //  $mcb_otg.="<tr><td>".$serial."</td><td>MCB</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$mcbo_c]."</td></tr>";
       $localcost= $localcost + ($qty[$mcbo_c]*$trans_yes['Unit_cost']);
       $serial++;
       $mcbo_c++;

       }
	   echo "<h5> MCB [Outgoing] </h5> ".$mcb_otg;
    }


    if($orders['hmi'][0] > 0)
    {
       $data=$orders['hmi'];
       $qty=$orders['hmi_qty'];
      // $trans_yes=array();
      $monitoring=true;
       $hmi_c=0;
       foreach($data as $d){
       $db->where('hmi_id', $d);
       $trans_yes = $db->getOne("hmi");  
	   $hmi.="<span><p><b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']."-".$trans_yes['Type']." <br/><i> Qty :".$qty[$hmi_c]."</i> </p></span>";

    //   $hmi.="<tr><td>".$serial."</td><td>HMI</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$hmi_c]."</td></tr>";
       $localcost= $localcost + ($qty[$hmi_c]*$trans_yes['Unit_cost']);
       $serial++;
       $hmi_c++;

       }
	   echo "<h5> HMI </h5> ".$hmi;
    }
    
    if($orders['bcpm'][0] > 0)
    {
       $data=$orders['bcpm'];
       $qty=$orders['bcpm_qty'];
      // $trans_yes=array();
      $monitoring=true;
       $bcpm_c=0;
       foreach($data as $d){
       $db->where('bcpma_id', $d);
       $trans_yes = $db->getOne("bcpma");  
	    $bcpm.="<span><p><b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']."-".$trans_yes['Type']." <br/><i> Qty :".$qty[$bcpm_c]."</i> </p></span>";

       //$bcpm.="<tr><td>".$serial."</td><td>BCPM</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$bcpm_c]."</td></tr>";
       $localcost= $localcost + ($qty[$bcpm_c]*$trans_yes['Unit_cost']);
       $serial++;
       $bcpm_c++;

       }
	   echo "<h5> BCPM </h5> ".$bcpm;
    }

    if($orders['cf'][0] > 0)
    {
       $data=$orders['cf'];
       $qty=$orders['cf_qty'];
      // $trans_yes=array();
      $pdu_cib=true;
       $cf_c=0;
       foreach($data as $d){
       $db->where('cooling_id', $d);
       $trans_yes = $db->getOne("cooling_fan");  
	   $cooling_fan.="<span><p><b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']."-".$trans_yes['Type']." <br/><i> Qty :".$qty[$cf_c]."</i> </p></span>";

      // $cooling_fan.="<tr><td>".$serial."</td><td>Cooling Fan</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$cf_c]."</td></tr>";
       $localcost= $localcost + ($qty[$cf_c]*$trans_yes['Unit_cost']);
       $serial++;
       $cf_c++;

       }
	   echo "<h5> Cooling Fan </h5> ".$cooling_fan;
    }

    if($orders['frame'][0] > 0)
    {
       $data=$orders['frame'];
       $qty=$orders['frame_qty'];
      // $trans_yes=array();
      $pdu_cib=true;
       $frame_c=0;
       foreach($data as $d){
       $db->where('frame_id', $d);
       $trans_yes = $db->getOne("frame");  
	   $frame.="<span><p><b>".$trans_yes['Bill_of_Material']."</b><br/>".$trans_yes['Make']."-".$trans_yes['Type']." <br/><i> Qty :".$qty[$frame_c]."</i> </p></span>";

      // $frame.="<tr><td>".$serial."</td><td>Frame</td><td>".$trans_yes['Bill_of_Material']."</td> <td>".$trans_yes['Make']." </td><td>".$trans_yes['Type']." </td> <td>".$qty[$frame_c]."</td></tr>";
       $localcost= $localcost + ($qty[$frame_c]*$trans_yes['Unit_cost']);
       $serial++;
       $frame_c++;

       }
	   echo "<h5>  Frame </h5> ".$frame;
    }



	
	?>
<style>
span p {
  /*font-family: ''; */
  font-family: 'Untitled Sans';
  -webkit-text-size-adjust: none;
  font-size: 10px;
  padding: 0 0 2px 4px;
}
 h5 {
	padding: 0 0 2px 2px;
   font-family: 'Untitled Sans';
   text-decoration-line: underline; 
   font-weight: bold;

 }
</style>

