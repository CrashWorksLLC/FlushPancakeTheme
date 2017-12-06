<h1 class="transaction-total text-center">
    <?php echo client_name($invoice["client_id"]); ?>
    <br/>
    <?php echo Currency::format($amount, $invoice['currency_code']); ?>
    <small><?php echo __("invoices:invoicenumber", [$invoice['invoice_number']]) ?></small>
</h1>
<?php if ($fee): ?>
    <p class="transaction-fee">
        <small><?php echo __('transactions:fee_applied', array($gateway, $fee)); ?></small>
    </p>
<?php endif ?>
<form method="post" action="<?php echo $post_url; ?>" id="payment-form" class="notclient_fields">
    <h2><?php echo __('gateways:payment_details'); ?></h2>
    <div class="errors">
        <?php if (isset($errors)) : ?>
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php

foreach ($client_fields as $key => $field) : ?>
        <?php if ($field['type'] == 'hidden') : ?>
            <input type="hidden" <?php if ($use_field_names): ?>name="client_fields[<?php echo $key; ?>]"<?php endif; ?> id="<?php echo $key; ?>" value="<?php echo $field['value']; ?>"/>
        <?php  endif; endforeach;?>
	
	

			<div class="bank-card">
				<div class="CC_side CC_side_front">
					<div class="CC_inner">
						<label class="CC_label CC_label_holder">
							<span class="CC_hint">Holder of card</span>
							<input type="text" class="CC_field" placeholder="Name on card" pattern="[A-Za-z, ]{2,}" name="cc_name" id="cc_name" required>
						</label>
					</div>
					<div class="CC_inner">
						<label class="CC_label CC_label_number">
							<span class="CC_hint">Number of card</span>
							<input type="text" class="CC_field" placeholder="Number on card" onkeyup="$cc.validate(event)" name="cc_number" id="cc_number" required>
							
						</label>
					</div>
					<div class="CC_inner">
						<span class="CC_caption">valid thru</span>
					</div>
					<div class="CC_inner CC_footer">
						<label class="CC_label CC_month">
							<span class="CC_hint">Month</span>
							<input type="text" class="CC_field" placeholder="MM" maxlength="2" pattern="[0-9]{2}" name="cc_exp_m" id="cc_exp_m" required>
						</label>
						<span class="CC_separator">/</span>
						<label class="CC_label CC_year">
							<span class="CC_hint">Year</span>
							<input type="text" class="CC_field" placeholder="YY" maxlength="2" pattern="[0-9]{2}" name="cc_exp_y" id="cc_exp_y" required>
						</label>
						
						<div id="iscard-type" class="card-type"></div>
						<div id="iscard-valid" class=""></div>				
						
					</div>


				</div>
				<div class="CC_side CC_side_back">
					<div class="CC_inner">
						<label class="CC_label CC_cvc">
							<span class="CC_hint">CVC</span>
							<input type="text" class="CC_field" placeholder="CVC" maxlength="3" pattern="[0-9]{3}" name="cc_code" id="cc_code" required>
						</label>
					</div>
				</div>
			</div>
			<div class="payment-card__footer">
				<button class="payment-card__button">Process Payment!</button>
			</div>

</form>

<script src="/third_party/themes/flush/js/creditCardValidator.js" type="text/javascript"></script>