<?php
$this->assign('title', __('Customer') . '/' . __('Add'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customers'), ['controller' => 'Customers', 'action' => 'index']);
$this->Html->addCrumb(__('Create New Customer'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <div class="box box-primary">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="box-title"><?= __('Create New Customer') ?></h3>
          </div>
          <div class="main" style="padding: 10px 20px;">

            <form method="post" accept-charset="utf-8" action="/IS3102_Final/customers/add">
              <div style="display:none;">
                <input type="hidden" name="_method" value="POST">
              </div>
              <div class ="form-group">          
                <div class="input-group" title="Enter Member Identification*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input class = "form-control" type="text" placeholder = "Member Identification*" name="member_identification" required="required" id="member_identification" maxlength="255"> 
                </div>
              </div>
              <div class ="form-group">            
                <div class="input-group" style="z-index: 2;" title="Select Customer Membership Tier*">
                  <span class="input-group-addon"><i class="fa fa-fw fa-tags"></i></span>
                  <input type="hidden" name="cust_membership_tier_id" value="">
                  <select name="cust_membership_tier_id" id="cust_membership_tier_id" class='selectpicker form-control' title = "Select Customer Membership Tier*" data-live-search="true" required="required">
                    <?php foreach ($custMembershipTiers as $custMembershipTier): ?>
                      <option value="<?= $custMembershipTier->id ?>"><?php echo $custMembershipTier->tier_name ?></option>
                    <?php endforeach; ?>
                  </select>
                </div> 
              </div>
              <div class ="form-group">          
                <div class="input-group" title="Enter First Name*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input class = "form-control" type="text" placeholder = "First Name*" name="first_name" required="required" id="first_name" maxlength="255"> 
                </div>
              </div>
              <div class ="form-group">
                <div class="input-group" title="Enter Last Name*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input class = "form-control" type="text" placeholder = "Last Name*" name="last_name" required="required" id="last_name" maxlength="255"> 
                </div>
              </div>
              <div class ="form-group">
                <div class="input-group" title="Enter Email*">
                  <span class="input-group-addon">@</span>
                  <input class = "form-control" type="email" placeholder = "Email*" name="email" required="required" id="email" maxlength="255"> 
                </div>
              </div>
              <div class ="form-group">
                <div class="input-group" title="Enter Contact Number*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input class = "form-control" type="text" placeholder = "Contact Number*" name="contact" required="required" id="contact" maxlength="100"> 
                </div>
              </div>
              <div class ="form-group">            
                <div class="input-group" title="Enter Address*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                  <input class = "form-control" type="text" name="address" placeholder = "Address*" required="required" id="address" maxlength="255">
                </div> 
              </div>
              <div class ="form-group">            
                <div class="input-group" title="Enter Date of Birth*">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
                  <input class = "form-control" type="date" name="dob" placeholder = "Date of Birth*" required="required" id="dob" maxlength="255">
                </div> 
              </div>
              <div class ="form-group">            
                <div class="input-group" title="Enter Preferred Currency" style="z-index: 99999;">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                  <input type="hidden" name="preferred_currency">
                  <select name="preferred_currency" id="preferred_currency" class='selectpicker form-control' title = "Preferred Currency*" data-live-search="true" required="required">
                    <option value="America (United States) Dollars - USD">America (United States) Dollars – USD</option>
                    <option value="Afghanistan Afghanis - AFN">Afghanistan Afghanis – AFN</option>
                    <option value="Albania Leke - ALL">Albania Leke – ALL</option>
                    <option value="Algeria Dinars - DZD">Algeria Dinars – DZD</option>
                    <option value="Argentina Pesos - ARS">Argentina Pesos – ARS</option>
                    <option value="Australia Dollars - AUD">Australia Dollars – AUD</option>
                    <option value="Austria Schillings - ATS">Austria Schillings – ATS</option>

                    <option value="Bahamas Dollars - BSD">Bahamas Dollars – BSD</option>
                    <option value="Bahrain Dinars - BHD">Bahrain Dinars – BHD</option>
                    <option value="Bangladesh Taka - BDT">Bangladesh Taka – BDT</option>
                    <option value="Barbados Dollars - BBD">Barbados Dollars – BBD</option>
                    <option value="Belgium Francs - BEF">Belgium Francs – BEF</option>
                    <option value="Bermuda Dollars - BMD">Bermuda Dollars – BMD</option>

                    <option value="Brazil Reais - BRL">Brazil Reais – BRL</option>
                    <option value="Bulgaria Leva - BGN">Bulgaria Leva – BGN</option>
                    <option value="Canada Dollars - CAD">Canada Dollars – CAD</option>
                    <option value="CFA BCEAO Francs - XOF">CFA BCEAO Francs – XOF</option>
                    <option value="CFA BEAC Francs - XAF">CFA BEAC Francs – XAF</option>
                    <option value="Chile Pesos - CLP">Chile Pesos – CLP</option>

                    <option value="China Yuan Renminbi - CNY">China Yuan Renminbi – CNY</option>
                    <option value="RMB (China Yuan Renminbi) - CNY">RMB (China Yuan Renminbi) – CNY</option>
                    <option value="Colombia Pesos - COP">Colombia Pesos – COP</option>
                    <option value="CFP Francs - XPF">CFP Francs – XPF</option>
                    <option value="Costa Rica Colones - CRC">Costa Rica Colones – CRC</option>
                    <option value="Croatia Kuna - HRK">Croatia Kuna – HRK</option>

                    <option value="Cyprus Pounds - CYP">Cyprus Pounds – CYP</option>
                    <option value="Czech Republic Koruny - CZK">Czech Republic Koruny – CZK</option>
                    <option value="Denmark Kroner - DKK">Denmark Kroner – DKK</option>
                    <option value="Deutsche (Germany) Marks - DEM">Deutsche (Germany) Marks – DEM</option>
                    <option value="Dominican Republic Pesos - DOP">Dominican Republic Pesos – DOP</option>
                    <option value="Dutch (Netherlands) Guilders - NLG">Dutch (Netherlands) Guilders – NLG</option>

                    <option value="Eastern Caribbean Dollars - XCD">Eastern Caribbean Dollars – XCD</option>
                    <option value="Egypt Pounds - EGP">Egypt Pounds – EGP</option>
                    <option value="Estonia Krooni - EEK">Estonia Krooni – EEK</option>
                    <option value="Euro - EUR">Euro – EUR</option>
                    <option value="Fiji Dollars - FJD">Fiji Dollars – FJD</option>
                    <option value="Finland Markkaa - FIM">Finland Markkaa – FIM</option>

                    <option value="France Francs - FRF*">France Francs – FRF*</option>
                    <option value="Germany Deutsche Marks - DEM">Germany Deutsche Marks – DEM</option>
                    <option value="Gold Ounces - XAU">Gold Ounces – XAU</option>
                    <option value="Greece Drachmae - GRD">Greece Drachmae – GRD</option>
                    <option value="Guatemalan Quetzal - GTQ">Guatemalan Quetzal – GTQ</option>
                    <option value="Holland (Netherlands) Guilders - NLG">Holland (Netherlands) Guilders – NLG</option>
                    <option value="Hong Kong Dollars - HKD">Hong Kong Dollars – HKD</option>

                    <option value="Hungary Forint - HUF">Hungary Forint – HUF</option>
                    <option value="Iceland Kronur - ISK">Iceland Kronur – ISK</option>
                    <option value="IMF Special Drawing Right - XDR">IMF Special Drawing Right – XDR</option>
                    <option value="India Rupees - INR">India Rupees – INR</option>
                    <option value="Indonesia Rupiahs - IDR">Indonesia Rupiahs – IDR</option>
                    <option value="Iran Rials - IRR">Iran Rials – IRR</option>

                    <option value="Iraq Dinars - IQD">Iraq Dinars – IQD</option>
                    <option value="Ireland Pounds - IEP*">Ireland Pounds – IEP*</option>
                    <option value="Israel New Shekels - ILS">Israel New Shekels – ILS</option>
                    <option value="Italy Lire - ITL*">Italy Lire – ITL*</option>
                    <option value="Jamaica Dollars - JMD">Jamaica Dollars – JMD</option>
                    <option value="Japan Yen - JPY">Japan Yen – JPY</option>

                    <option value="Jordan Dinars - JOD">Jordan Dinars – JOD</option>
                    <option value="Kenya Shillings - KES">Kenya Shillings – KES</option>
                    <option value="Korea (South) Won - KRW">Korea (South) Won – KRW</option>
                    <option value="Kuwait Dinars - KWD">Kuwait Dinars – KWD</option>
                    <option value="Lebanon Pounds - LBP">Lebanon Pounds – LBP</option>
                    <option value="Luxembourg Francs - LUF">Luxembourg Francs – LUF</option>
                    <option value="Malaysia Ringgits - MYR">Malaysia Ringgits – MYR</option>
                    <option value="Malta Liri - MTL">Malta Liri – MTL</option>
                    <option value="Mauritius Rupees - MUR">Mauritius Rupees – MUR</option>
                    <option value="Mexico Pesos - MXN">Mexico Pesos – MXN</option>
                    <option value="Morocco Dirhams - MAD">Morocco Dirhams – MAD</option>
                    <option value="Netherlands Guilders - NLG">Netherlands Guilders – NLG</option>

                    <option value="New Zealand Dollars - NZD">New Zealand Dollars – NZD</option>
                    <option value="Norway Kroner - NOK">Norway Kroner – NOK</option>
                    <option value="Oman Rials - OMR">Oman Rials – OMR</option>
                    <option value="Pakistan Rupees - PKR">Pakistan Rupees – PKR</option>
                    <option value="Palladium Ounces - XPD">Palladium Ounces – XPD</option>
                    <option value="Peru Nuevos Soles - PEN">Peru Nuevos Soles – PEN</option>

                    <option value="Philippines Pesos - PHP">Philippines Pesos – PHP</option>
                    <option value="Platinum Ounces - XPT">Platinum Ounces – XPT</option>
                    <option value="Poland Zlotych - PLN">Poland Zlotych – PLN</option>
                    <option value="Portugal Escudos - PTE">Portugal Escudos – PTE</option>
                    <option value="Qatar Riyals - QAR">Qatar Riyals – QAR</option>
                    <option value="Romania New Lei - RON">Romania New Lei – RON</option>

                    <option value="Romania Lei - ROL">Romania Lei – ROL</option>
                    <option value="Russia Rubles - RUB">Russia Rubles – RUB</option>
                    <option value="Saudi Arabia Riyals - SAR">Saudi Arabia Riyals – SAR</option>
                    <option value="Silver Ounces - XAG">Silver Ounces – XAG</option>
                    <option selected="selected">"Singapore Dollars - SGD">Singapore Dollars – SGD</option>
                    <option value="Slovakia Koruny - SKK">Slovakia Koruny – SKK</option>

                    <option value="Slovenia Tolars - SIT">Slovenia Tolars – SIT</option>
                    <option value="South Africa Rand - ZAR">South Africa Rand – ZAR</option>
                    <option value="South Korea Won - KRW">South Korea Won – KRW</option>
                    <option value="Spain Pesetas - ESP">Spain Pesetas – ESP</option>
                    <option value="Special Drawing Rights (IMF) - XDR">Special Drawing Rights (IMF) – XDR</option>
                    <option value="Sri Lanka Rupees - LKR">Sri Lanka Rupees – LKR</option>

                    <option value="Sudan Dinars - SDD">Sudan Dinars – SDD</option>
                    <option value="Sweden Kronor - SEK">Sweden Kronor – SEK</option>
                    <option value="Switzerland Francs - CHF">Switzerland Francs – CHF</option>
                    <option value="Taiwan New Dollars - TWD">Taiwan New Dollars – TWD</option>
                    <option value="Thailand Baht - THB">Thailand Baht – THB</option>
                    <option value="Trinidad and Tobago Dollars - TTD">Trinidad and Tobago Dollars – TTD</option>

                    <option value="Tunisia Dinars - TND">Tunisia Dinars – TND</option>
                    <option value="Turkey New Lira - TRY">Turkey New Lira – TRY</option>
                    <option value="United Arab Emirates Dirhams - AED">United Arab Emirates Dirhams – AED</option>
                    <option value="United Kingdom Pounds - GBP">United Kingdom Pounds – GBP</option>
                    <option value="United States Dollars - USD">United States Dollars – USD</option>
                    <option value="Venezuela Bolivares - VEB">Venezuela Bolivares – VEB</option>

                    <option value="Vietnam Dong - VND">Vietnam Dong – VND</option>
                    <option value="Zambia Kwacha - ZMK">Zambia Kwacha – ZMK</option>
                  </select>
                </div> 
              </div>

              <div class ="form-group">            
                <div class="input-group" style="z-index: 0;" title="Select Mailing List">
                  <input type="hidden" name="mailing_list" value="">
                  <label for="mailing-list"><input type="checkbox" name="mailing_list" value="" id="mailing-list">&nbsp;Mailing List</label>
                </div> 
              </div>

              <br>
              <div class ="row">
                <a href="/IS3102_Final/customers/index" class="btn btn-md btn-primary pull-left" style="border-radius: 8px; margin:5px;">Back to Customer Index</a>
                <button class="btn btn-md btn-success pull-right" type="submit" style="border-radius: 8px; margin:5px; ">Save Customer</button>
              </div>
              <br>
            </form>
          </div>
          <!--<div class="box-body">
              <?= $this->Form->create($customer) ?>
              <fieldset>
                  <?php
                      echo $this->Form->input('first_name');
                      echo $this->Form->input('last_name');
                      echo $this->Form->input('username');
                      echo $this->Form->input('password');
                      echo $this->Form->input('email');
                      echo $this->Form->input('contact');
                      echo $this->Form->input('address');
                      echo $this->Form->input(('confirm_password'), array('type'  =>  'password')); 
                      echo $this->Form->input('activation_status');
                      echo $this->Form->input('expiry_date', array('div' => false));
                      echo $this->Form->input('cust_membership_tier_id', ['label' => 'Customer Membership Tier'], ['options' => $custMembershipTiers]);
                      echo $this->Form->input('mailing_list');
                  ?>
              </fieldset>
              <br>
              <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
              <?= $this->Form->end() ?>
            </div>-->
          </div>
        </div>
      </div>
    </section>
