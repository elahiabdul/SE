<table style="border-width: thin;border-spacing: 2px; border-style: none;border-color: black;">

        <tr><td>PMM Rating (in k VA)</td> 
           
        <td> <span style="margin-left:10px;"> <?php echo $customer['PMM'];?> </span> </td> </tr> </tr>
            

  
        <tr><td>Isolation Transformer * </td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['IST'];?> <?php echo $customer['IST_KV'];?> </span> </td> </tr>
        
    </div>
    <?php if ($customer['IST']=='Yes') {  ?> 
    
        
        <tr><td>Isolation Transformer Winding </td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['ITW'];?> </span> </td> </tr>
           <?php $opt_arr = array("Copper", "Aluminium"); ?>
           
           

        <tr><td>Isolation Transformer Efficiency </td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['ITE'];?> </span> </td> </tr>
           
    

    
        <tr><td>Isolation Transformer K Rating </td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['ITKR'];?> </span> </td> </tr>
          
            
    

    
        <tr><td>Isolation Transformer Vector Group </td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['ITVG'];?> </span> </td> </tr>
           
   

    
        <tr><td>Softstarter </td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['Softstarter'];?> </span> </td> </tr>
           
           
   

   
    
        <tr><td> Isolation transformer temperature monitoring - Display </td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['ITTM'];?> </span> </td> </tr>
           
           
   

    
        <tr><td> Isolation Transformer Bypass Switch</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['ITBS'];?> </span> </td> </tr>
           
   
    
</div> <!-- frame end IST -->
     <?php } ?>

        <tr><td> Fan Failure</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['FanFailure'];?> </span> </td> </tr>
           
   

     

        <tr><td> Main Input Breaker</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['MIB'];?> </span> </td> </tr>
           
           
     
    
    
        <tr><td> Main Input Breaker Model</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['MIBM'];?> </span> </td> </tr>
           
     


    
        <tr><td> Main Output Breaker</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['MOB'];?> </span> </td> </tr>
           
     



 
        <tr><td> Main Input(Primary Side)</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['MIP'];?> </span> </td> </tr>
           <?php $opt_arr = array("NO", "EM6400NG","PM5000 series, PM5330, PM5560","PM8000 series"); 
                            ?>
            
     

    
        <tr><td> Main Output(Secondary Side)</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['MOS'];?> </span> </td> </tr>
           <?php $opt_arr = array("NO", "EM6400NG","PM5000 series, PM5330, PM5560","PM8000 series"); 
                            ?>
            
   


    
        <tr><td> HMI</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['HMI'];?> </span> </td> </tr>
           
   

   
 
 <div class="container">
    <div class="row">
    <div class="col-sm-2">
        <tr><td> BCPMA</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['BCPMA'];?> </span> </td> </tr>
           
            </div>
            <div class="col-sm-2" >
            <tr><td> BCPME</td>
            <td>: <span style="margin-left:10px;"> <?php echo $customer['BCPME'];?> </span> </td> </tr>
          
           
            </div>

            <div class="col-sm-2">
        <tr><td> HDPM6000</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['HDPM6000'];?> </span> </td> </tr>
           
            </div>
            </div>
           
   

    
    
        <tr><td> Single Channel Communication</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['SCC'];?> </span> </td> </tr>
           
   
    
        <tr><td> Dual Channel Communication</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['DCC'];?> </span> </td> </tr>
        
   
   
    
        <tr><td> Type of Disbutions</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['TOD'];?> </span> </td> </tr>
        
   


    
        <tr><td> Total branches of distribution</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['TBOD'];?> </span> </td> </tr>
        
   

    
        <tr><td> Entry & Exist</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['EE'];?> </span> </td> </tr>
      
   

    
        <tr><td> PDU Distribution Accessability</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['PDUDA'];?> </span> </td> </tr>
        
   

    
        <tr><td> Transformer Maintainence Access</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['TMA'];?> </span> </td> </tr>
        
   

    
        <tr><td> PDU Color</td>
        <td>: <span style="margin-left:10px;"> <?php echo $customer['PDU'];?> </span> </td> </tr>
        
   
    
    

               



<style>
 td, th {
    border: 1px solid black;
}   
table {
    border-collapse: collapse;
    
}
</style>