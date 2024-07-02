<fieldset>

<div class="form-group">
        <label>PMM Rating (in k VA)</label>
           <?php $opt_arr = array("20", "30", "40", "50", "60", "75", "80", "100", "125", "150", "160", "175", "200", "225", "250", "300", "350", "400", "425", "450", "500"); 
                            ?>
            <select name="PMM" class="form-control selectpicker" required>
                <option value=" " >Please select PMM</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['PMM']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
            
    </div>  

    

    <div class="Isolation Transformer">
        <label>Isolation Transformer * </label>
        <?php $ysel=''; $nsel=''; if($edit && $customer['IST'] == 'Yes'){ $ysel='checked';} else if($edit && $customer['IST'] == 'No') { $nsel ='checked';}  ?> 
        <label class="radio-inline">
            <input type="radio" name="IST" id="IST_YES" value="Yes" <?php echo $ysel; ?>  required="required"/> Yes
        </label>
        <label class="radio-inline">
            <input type="radio" name="IST" id="IST_NO"  value="No" <?php echo $nsel; ?> required="required" /> No
        </label>
    </div>
    <div id="IST_FRAME">
    <div class="form-group" >
      
           <?php $opt_arr = array("20", "30", "40", "50", "60", "75", "80", "100", "125", "150", "160", "175", "200", "225", "250", "300", "350", "400", "425", "450", "500"); 
                            ?>
            <select name="IST_KV" id="IST_KV" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['IST_KV']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
            
    </div>

   
    
    <div class="form-group">
        <label>Isolation Transformer Winding </label>
           <?php $opt_arr = array("Copper", "Aluminium"); ?>
            <select name="ITW" class="form-control selectpicker" required>
                <option value=" " >Isolation Transformer Winding</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['ITW']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>  

    <div class="form-group">
        <label>Isolation Transformer Efficiency </label>
           <?php $opt_arr = array("Standard as 98.5", "Specific to customer requirment"); 
                            ?>
            <select name="ITE" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) { 
            
                    if ($edit && $opt == $customer['ITE']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>  

    <div class="form-group">
        <label>Isolation Transformer K Rating </label>
           <?php $opt_arr = array("K1", "K4","K9","K13","K20"); 
                            ?>
            <select name="ITKR" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['ITKR']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>  

    <div class="form-group">
        <label>Isolation Transformer Vector Group </label>
           <?php $opt_arr = array("Dyn11", "Dzn0"); 
                            ?>
            <select name="ITVG" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['ITVG']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 

    <div class="form-group">
        <label>Softstarter </label>
           <?php $opt_arr = array("No", "Manual","Semi-Automatic","Fully-Automatic"); 
                            ?>
            <select name="Softstarter" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['Softstarter']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 

   
    <div class="form-group">
        <label> Isolation transformer temperature monitoring - Display </label>
           <?php $opt_arr = array("No", "Yes [Through Modbus to BMS]"); 
                            ?>
            <select name="ITTM" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['ITTM']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 

    <div class="form-group">
        <label> Isolation Transformer Bypass Switch</label>
           <?php $opt_arr = array("No", "250A,4P","400A,4P","630A,4P","800A,4P"); 
                            ?>
            <select name="ITBS" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['ITBS']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 
    
</div> <!-- frame end IST -->
    
<div class="form-group">
        <label> Fan Failure</label>
           <?php $opt_arr = array("No", "Yes (For Alarm)"); 
                            ?>
            <select name="FanFailure" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['FanFailure']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 

     
<div class="form-group">
        <label> Main Input Breaker</label>
           <?php $opt_arr = array("Thermal Magnetic Release", "Microprocessor based Release LSI","Microprocessor based Release LSIG"); 
                            ?>
            <select name="MIB" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['MIB']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>   
    
    <div class="form-group">
        <label> Main Input Breaker Model</label>
           <?php $opt_arr = array("Easypact CVS", "Compact NSX"); 
                            ?>
            <select name="MIBM" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['MIBM']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>   


    <div class="form-group">
        <label> Main Output Breaker</label>
           <?php $opt_arr = array("Thermal Magnetic Release", "Microprocessor based Release LSI","Microprocessor based Release LSIG"); 
                            ?>
            <select name="MOB" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['MOB']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>   

 <h4> Meters and Monitoring </h4>
 <p>&nbsp</p>

 <div class="form-group">
        <label> Main Input(Primary Side)</label>
           <?php $opt_arr = array("NO", "EM6400NG","PM5000 series, PM5330, PM5560","PM8000 series"); 
                            ?>
            <select name="MIP" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['MIP']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>   

    <div class="form-group">
        <label> Main Output(Secondary Side)</label>
           <?php $opt_arr = array("NO", "EM6400NG","PM5000 series, PM5330, PM5560","PM8000 series"); 
                            ?>
            <select name="MOS" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['MOS']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 


    <div class="form-group">
        <label> HMI</label>
           <?php $opt_arr = array("NO", "Yes [Default]"); 
                            ?>
            <select name="HMI" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['HMI']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 

    <h4> Branch Monitroing </h4>
 <p>&nbsp</p>
 <div class="form-group">
 <div class="container">
    <div class="row">
    <div class="col-sm-2">
        <label> BCPMA</label>
           <?php $opt_arr = array("42", "82","126","168","210"); 
                            ?>
            <select name="BCPMA" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
            
                    if ($edit && $opt == $customer['BCPMA']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
            </div>
            <div class="col-sm-2" >
            <label> BCPME</label>
           <?php $opt_arr = array("42", "82","126","168","210"); 
                            ?>
            <select name="BCPME" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['BCPME']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
            </div>

            <div class="col-sm-2">
        <label> HDPM6000</label>
           <?php $opt_arr = array("NO","Yes"); 
                            ?>
            <select name="HDPM6000" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
    
                    if ($edit && $opt == $customer['BCPMA']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
            </div>
            </div>
            </div> 
    </div> 

    
    <div class="form-group">
        <label> Single Channel Communication</label>
           <?php $opt_arr = array("Modbus", "TCP/IP", "SNMP","Bacnet"); 
                            ?>
            <select name="SCC" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['SCC']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 
    <div class="form-group">
        <label> Dual Channel Communication</label>
        <?php $opt_arr = array("Modbus", "TCP/IP", "SNMP","Bacnet"); 
                            ?>
            <select name="DCC" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['DCC']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 
   
    <div class="form-group">
        <label> Type of Disbutions</label>
        <?php $opt_arr = array("Conventional","Load center","Isobar/Fishbone"); 
                            ?>
            <select name="TOD" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['TOD']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 


    <div class="form-group">
        <label> Total branches of distribution</label>
        <?php $opt_arr = array("Single Phase","Three Phase"); 
                            ?>
            <select name="TBOD" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['TBOD']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 

    <div class="form-group">
        <label> Entry & Exist</label>
        <?php $opt_arr = array("Top & Top","Top & Bottom","Bottom & Top","Bottom & Bottom"); 
                            ?>
            <select name="EE" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['EE']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 

    <div class="form-group">
        <label> PDU Distribution Accessability</label>
        <?php $opt_arr = array("Front For Distribution","Side - Left for Distrubtion","Side - Right for Distribution","Both Side For Distribution"); 
                            ?>
            <select name="PDUDA" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['PDUDA']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 

    <div class="form-group">
        <label> Transformer Maintainence Access</label>
        <?php $opt_arr = array("Rear","Front"); 
                            ?>
            <select name="TMA" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['TMA']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 

    <div class="form-group">
        <label> PDU Color</label>
        <?php $opt_arr = array("RAL 7035","RAL 3001","RAL 5005","RAL 2000","RAL 5012","RAL 9005","RAL 9003"); 
                            ?>
            <select name="PDU" class="form-control selectpicker" required>
                <option value=" " ></option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['PDU']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div> 
    
    

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>

<script>



 $(document).ready(function() {

    $("#IST_FRAME").css("display", "none");
    $('#IST_YES').click(function() {  
    
      $("#IST_FRAME").css("display", "block");
    });
    $('#IST_NO').click(function() {  
        $("#IST_FRAME").css("display", "none");
    });
});


 </script>   
