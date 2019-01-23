<?php
          if(empty($_POST)===false)
            {
            $my_file = 'form_builder.php';
            $handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);

            fwrite($handle,"<?php");
             
             /*Table creation dynamically */
             fwrite($handle,"\n\n"); 
             $new_data="\n"."CREATE TABLE w_4_form (";
             fwrite($handle, $new_data);          
             $new_data= " id int(11) PRIMARY KEY AUTO_INCREMENT, ";
             fwrite($handle, $new_data); 
             foreach ($_POST as $key => $value) 
                     {
                       if($value=="i")
                       {
                        $new_data = $key." int NULL, ";
                        fwrite($handle, $new_data); 
                       }
                       else if($value=="1")
                       {
                       	$new_data = $key." tinyint NULL,";
                        fwrite($handle, $new_data); 
                       }
                       else if($value=="v")
                       {
                        $new_data = $key." varchar(255) NULL,";
                        fwrite($handle, $new_data); 
                       }
                       else if($value=="ty")
                       {
                        $new_data = $key." tinyint NULL, ";
                        fwrite($handle, $new_data); 
                       }
                       else if ($value=="true")
                       {
                       	$new_data = $key." tinyint NULL,";
                        fwrite($handle, $new_data); 
                       }
                       else if ($value=="d")
                       {
                       	$new_data = $key." date NULL,";
                        fwrite($handle, $new_data); 
                       }
                       else if ($value=="t")
                       {
                       	$new_data = $key." time NULL, ";
                        fwrite($handle, $new_data); 
                       }
                       else if ($value=="tx")
                       {
                       	$new_data = $key." text NULL,";
                        fwrite($handle, $new_data); 
                       }
                       else if ($value=="dt")
                       {
                       	$new_data = $key." datetime NULL,";
                        fwrite($handle, $new_data); 
                       }
                       else if ($value=="du")
                       {
                       	$new_data = $key." double NULL,";
                        fwrite($handle, $new_data); 
                       }
                       else
                       {
                       	$new_data = $key."  date NULL, ";
                        fwrite($handle, $new_data);
                       }
                       
                     } 
             $new_data=")";
             /*Note:  v = varchar , on = tinyint (radiobutton) , true = tinyint (checkbox) , d = date , t = time tx = text , dt = datetime , du = double , else part for int  */

             fwrite($handle, $new_data);          
             fwrite($handle,"\n\n"); 

             /*form validation in codeigniter .....*/
             foreach ($_POST as $key => $value) 
                     {
                     $new_data = "\n".'$this->form_validation->set_rules("'.$key.'",'.'"'.$key.'"'.',"required");';
                     fwrite($handle, $new_data);  
                     }

             fwrite($handle,"\n\n");
             /*server side error dispaly in codeigniter */
             foreach ($_POST as $key => $value) 
                     {
                     $new_data = "\n".'<span class="error"><?php echo form_error('.'"'.$key.'"'.'); ?></span>';
                     fwrite($handle, $new_data);  
                     }

             fwrite($handle,"\n\n");
             /* set server side error message in codeigniter */
             foreach ($_POST as $key => $value) 
                     {
                     $new_data = "\n".'$this->form_validation->set_message("'.$key.'"'.',"Enter digits only");';
                     fwrite($handle, $new_data);  
                     }

             fwrite($handle,"\n\n");
             /*set_value in codeigniter*/ 
             foreach ($_POST as $key => $value) 
                     {  
                     $new_data = "\n".'value="<?php echo set_value('.'"'.$key.'"'.'); ?>"'; 
                     fwrite($handle, $new_data);  
                     }  
             fwrite($handle,"\n\n");
             /*formation of form data in array format..... */
             foreach ($_POST as $key => $value) 
                     {
                     $new_data = "\n".'"'.$key.'"=>$_POST['.'"'.$key.'"'.'],';
                     fwrite($handle, $new_data);  
                     }
              /*formation of blank data format..... */

              foreach ($_POST as $key => $value) 
                {
                if($value==1){
                $new_data ='$'.$key.'=';
                fwrite($handle, $new_data); 
                 } 
                }

             foreach ($_POST as $key => $value) 
                {
                if($value==1){  
                $new_data = "\n".'if(!empty($_POST['.'"'.$key.'"'.'])){'.'$'.$key.'=$_POST['.'"'.$key.'"'.'];}';
                fwrite($handle, $new_data);  
                }
                }       
             fwrite($handle,"?>");


            }
?>  


  
<!-- <form method="post">

<input type="text" name="name">
<input type="text" name="email">
<input type="text" name="contact">
<input type="text" name="address">
<input type="text" name="country">
<input type="radio" name="sex" value="1">
<input type="radio" name="sex" value="1">

<button type="submit">test</button> -->

<form class="form-horizontal" method="post"  role="form">
                      <div class="form-group">
                        <div class="col-md-12">
                          <p>Checklists keep track of paperwork and tasks needed at the start of employment. Incomplete items will appear on a report as a reminder.</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12"> <u> <a href="#" style="color: blue;">Learn more about staff employment checklists</a></u> </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <div class="col-md-2"></div>
                          <div class="col-md-1">
                            <p>Not Required</p>
                          </div>
                          <div class="col-md-3">
                            <p>Date Completed</p>
                          </div>
                          <div class="col-md-4">
                            <p>Note</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">BCI </label>
                        <div class="col-md-1">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="is_bci" value="1" placeholder="BCI Only">
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <input type="text" class="form-control custom_datepicker" placeholder="MM/DD/YYYY" readonly name="bci_date"  />
                        </div>
                        <div class="col-md-7">
                          <input type="text" name="bci_note" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">TB</label>
                        <div class="col-md-1">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" value="1" name="is_tb">
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="tb_date" class="form-control custom_datepicker" placeholder="MM/DD/YYYY" readonly />
                        </div>
                        <div class="col-md-7">
                          <input type="text" name='tb_note' class="form-control" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">CPR / FA</label>
                        <div class="col-md-1">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" value="1" name="is_cpr" />
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="cpr_date" class="form-control custom_datepicker" placeholder="MM/DD/YYYY" readonly />
                        </div>
                        <div class="col-md-7">
                          <input type="text" class="form-control"  name="cpr_note" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">Annual Review</label>
                        <div class="col-md-1">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" value="1" name="is_annual_review">
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="annual_review_date" class="form-control custom_datepicker" placeholder="MM/DD/YYYY" readonly />
                        </div>
                        <div class="col-md-7">
                          <input type="text" class="form-control" name="annual_review_note" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">90 Day Review</label>
                        <div class="col-md-1">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" value="1" name="is_90_day">
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="review_90_day_date" class="form-control custom_datepicker" placeholder="MM/DD/YYYY" readonly />
                        </div>
                        <div class="col-md-7">
                          <input type="text" class="form-control" name="note_90_day" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">Driver's License</label>
                        <div class="col-md-1">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" value="1" name="is_dl">
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="dl_date" class="form-control custom_datepicker" placeholder="MM/DD/YYYY" readonly />
                        </div>
                        <div class="col-md-7">
                          <input type="text" name="dl_note" class="form-control" placeholder=""/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">STNA</label>
                        <div class="col-md-1">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" value="1" name="is_stna">
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="stna_date" class="form-control custom_datepicker" placeholder="MM/DD/YYYY" readonly />
                        </div>
                        <div class="col-md-7">
                          <input type="text" class="form-control" name="stna_note" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">Auto Insurance</label>
                        <div class="col-md-1">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" value="1" name="is_auto_insurance">
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="auto_insurance_date" class="form-control custom_datepicker" placeholder="MM/DD/YYYY" readonly />
                        </div>
                        <div class="col-md-7">
                          <input type="text" class="form-control" name="auto_insurance_note" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2">LPN / RN Licens </label>
                        <div class="col-md-1">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" value="1" name="is_lpn">
                            </label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="lpn_date" class="form-control custom_datepicker" placeholder="MM/DD/YYYY" readonly />
                        </div>
                        <div class="col-md-7">
                          <input type="text" class="form-control"  name="lpn_note" />
                        </div>
                      </div>
                      <br>

                      <div class="form-group">
                <div class="row">
                  <div class="space">
                    <div class="button-footer">
                      <div class="footer-button">
                        <button type="Update" class="btn btn-primary btn-block">Update</button>
                        <br>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>


</form>    

