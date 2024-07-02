






<div id="export-section">


        <button class="btn btn-sm btn-primary" onclick="printDiv()"><i class="glyphicon glyphicon-print"></i></button>
        
    </div>
<div id="mytable">

         
      
        
        
   
<table class="table table-bordered">
        <thead>
            <tr ><th colspan="7">  <img id="headline" src='http://localhost/SE/assets/images/plogo-1.png'/> </th></tr>
            <tr bgcolor="#FFFF00">
                <th scope="col">Sl.No</th>
                <th scope="col">Equipment</th>
                <th scope="col">Bill of Material </th>
                <th scope="col">Make</th>
                <th scope="col">Type</th>
                <th scope="col">Qty</th>
                <th scope="col">Unit Cost</th>
            </tr>
        </thead>
        <tbody>
       
            <?php if($transfering){ ?>       
                <tr bgcolor="#FFA500">
                <td></td><td > <b>QSKU</b> </td><td><b><?php echo $tran_heading; ?></b></td><td></td> <td></td><td>1</td>  
                <td bgcolor="#FFFFFF" rowspan="<?php echo $serial+6; ?>"> INR <?php echo IND_money_format($localcost); ?></td>
                 
               </tr> 
                
                <?php echo $tranafer;?>
                <? } else { ?> 

                    <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                 <td rowspan="<?php echo $serial+6; ?>"> INR <?php echo IND_money_format($localcost); ?></td>
            </tr>
                
                <?php }
                 ?>

               
             <?php if($mccb!=''){ ?>       
                <tr>
                <td colspan="6" bgcolor="#F7D6D0" style="background-color:#F7D6D0;" > <b>Primary and Secondary MCCB</b></td>
             
               </tr>   
           
            <?php echo $mccb;?>
            <?php } ?>

            <?php if($metering){ ?>       
                <tr>
                <td colspan="6" bgcolor="#F7D6D0" > <b>Metering and  Indication</b></td>  
                 
               </tr>   
           
            <?php if($mfm!=''){  echo $mfm; }?>
            <?php if($ct!=''){  echo $ct; }?>
            <?php if($lamp!=''){  echo $lamp; }?>
            <?php if($mcb!=''){  echo $mcb; }?>


            <?php } ?>


            <?php if($surge){ ?>       
                <tr>
                <td colspan="6" bgcolor="#F7D6D0" > <b>Surge Protection</b></td>  
                 
               </tr>   
           
            <?php if($spd!=''){  echo $spd; }?>   
            <?php } ?>

            <?php if($outgoing){ ?>       
                <tr>
                <td colspan="6" bgcolor="#F7D6D0"> <b>Outgoings</b></td>  
                 
               </tr>   
           
            <?php if($mcb_otg!=''){  echo $mcb_otg; }?>   
            <?php } ?>

            <?php if($monitoring){ ?>       
                <tr>
                <td colspan="6" bgcolor="#F7D6D0"> <b>Monitoring,Display and Communication Modules</b></td>  
             
               </tr>   
           
            <?php if($hmi!=''){  echo $hmi; }?>   
            <?php if($bcpm!=''){  echo $bcpm; }?>   
            <?php } ?>

      
        



            <?php if($pdu_cib){ ?>       
                <tr>
                <td colspan="6" bgcolor="#F7D6D0"> <b>PDU Cubicle</b></td>  
               </tr>   
           
            <?php if($cooling_fan!=''){  echo $cooling_fan; }?>   
            <?php if($frame!=''){  echo $frame; }?>   

            
            <?php } ?>





        </tbody>
    </table>
            </div>
    

            <script>

                // A $( document ).ready() block.
$( document ).ready(function() {
    document.getElementById("headline").style.display = "none";
});


</script>