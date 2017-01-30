<?php
	//echo $lang;
	$template_path = base_url()."assets/cc/";
	$ln = $this->uri->segment(1);
	//echo $ln;die;
	if(!$ln || $ln == ""){	$ln = "es"; }
?>
<div class="tab-pane active" id="tab_default_1">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-login">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6 panel_one">
              <a href="#" class="active" id="login-form-link">ROUND TRIP</a>
            </div>
            <div class="col-xs-6 panel_two">
              <a href="#" id="register-form-link">ONE WAY</a>
            </div>
          </div>
        </div>
        <p>* The return route must be from same points as the go from other points please make another reservation.</p>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12 clear-pad-RL">
              <form id="login-form" action="" method="post" role="form" style="display: block;" class="validateForm">
                <div class="form-bottom ribbon-down mar-down">
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label>Your trip start at:</label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <select name="start_from1" class="form-control validate[required]" onchange="addPlaceInput(this);" data-errormessage-value-missing="This field is required." style="height: 45px;">
                      <option value="" selected="selected">From</option>
                      <option value="city">Barcelona City</option>
                      <option value="airport">Barcelona Airport</option>
                    </select>
                    <input type="hidden" name="zone" value="" id="zone" />
                    <input type="hidden" name="collaborators_id" value="" id="collaborators_id" />
                    <input type="hidden" name="collaborator_address_id" value="" id="collaborator_address_id" />
                    <input type="hidden" name="bcnarea_address_id" value="" id="bcnarea_address_id" /> 
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <input type="text" name="from" placeholder="From" class="form-control" id="from">
                  </div>
                  <div class="form-group col-sm-2 clear-pad-form">
                    <input type="text" name="postal_code" placeholder="Postal Code" class="form-control" id="postal_code">
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <select name="start_from1" class="form-control validate[required]" onchange="addPlaceInput(this);" data-errormessage-value-missing="This field is required." style="height: 45px;">
                      <option value="" selected="selected">Day and Landing Time</option>
                      <option value="city">Barcelona City</option>
                      <option value="airport">Barcelona Airport</option>
                    </select>
                    <input type="hidden" name="zone" value="" id="zone" />
                    <input type="hidden" name="collaborators_id" value="" id="collaborators_id" />
                    <input type="hidden" name="collaborator_address_id" value="" id="collaborator_address_id" />
                    <input type="hidden" name="bcnarea_address_id" value="" id="bcnarea_address_id" /> 
                  </div>
                </div>
                <div class="form-bottom ribbon-down mar-down">
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label>Your trip ends at:</label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <select name="start_from1" class="form-control validate[required]" onchange="addPlaceInput(this);" data-errormessage-value-missing="This field is required." style="height: 45px;">
                      <option value="" selected="selected">To</option>
                      <option value="city">Barcelona City</option>
                      <option value="airport">Barcelona Airport</option>
                    </select>
                    <input type="hidden" name="zone" value="" id="zone" />
                    <input type="hidden" name="collaborators_id" value="" id="collaborators_id" />
                    <input type="hidden" name="collaborator_address_id" value="" id="collaborator_address_id" />
                    <input type="hidden" name="bcnarea_address_id" value="" id="bcnarea_address_id" /> 
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <select name="start_from1" class="form-control validate[required]" onchange="addPlaceInput(this);" data-errormessage-value-missing="This field is required." style="height: 45px;">
                      <option value="" selected="selected">Day and Flight Time</option>
                      <option value="city">Barcelona City</option>
                      <option value="airport">Barcelona Airport</option>
                    </select>
                    <input type="hidden" name="zone" value="" id="zone" />
                    <input type="hidden" name="collaborators_id" value="" id="collaborators_id" />
                    <input type="hidden" name="collaborator_address_id" value="" id="collaborator_address_id" />
                    <input type="hidden" name="bcnarea_address_id" value="" id="bcnarea_address_id" /> 
                  </div>
                </div>
                <div class="form-bottom ribbon-down mar-down">
                  <div class="form-group col-sm-1 clear-pad-form">
                    <label>people:</label>
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <select name="start_from1" class="form-control validate[required]" onchange="addPlaceInput(this);" data-errormessage-value-missing="This field is required." style="height: 45px;">
                      <option value="" selected="selected">Adults</option>
                      <option value="city">Barcelona City</option>
                      <option value="airport">Barcelona Airport</option>
                    </select>
                    <input type="hidden" name="zone" value="" id="zone" />
                    <input type="hidden" name="collaborators_id" value="" id="collaborators_id" />
                    <input type="hidden" name="collaborator_address_id" value="" id="collaborator_address_id" />
                    <input type="hidden" name="bcnarea_address_id" value="" id="bcnarea_address_id" /> 
                  </div>
                  <div class="form-group col-sm-3 clear-pad-form">
                    <select name="start_from1" class="form-control validate[required]" onchange="addPlaceInput(this);" data-errormessage-value-missing="This field is required." style="height: 45px;">
                      <option value="" selected="selected">Child(under 5)</option>
                      <option value="city">Barcelona City</option>
                      <option value="airport">Barcelona Airport</option>
                    </select>
                    <input type="hidden" name="zone" value="" id="zone" />
                    <input type="hidden" name="collaborators_id" value="" id="collaborators_id" />
                    <input type="hidden" name="collaborator_address_id" value="" id="collaborator_address_id" />
                    <input type="hidden" name="bcnarea_address_id" value="" id="bcnarea_address_id" /> 
                  </div>
                </div>
                <button type="button" class="btn" style="float:right" id="firstbutton">BOOK NOW</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
