/* global wp, pwsL10n, wc_password_strength_meter_params */
jQuery( function( $ ) {

	/**
	 * Password Strength Meter class.
	 */
	var wc_password_strength_meter = {

		/**
		 * Initialize strength meter actions.
		 */
		init: function() {
			$( document.body )
				.on( 'keyup change', 'form.register #reg_password, form[name="registerform"] #user_password, form.checkout #account_password, form.edit-account #password_1, form.lost_reset_password #password_1', this.strengthMeter )
				.on( 'keyup change', 'form.register #confirm_password, form.checkout #confirm_password, form.edit-account #password_2, form.lost_reset_password #password_2', this.confirmCheck );
			$( 'form.checkout #createaccount' ).change();
		},

		/**
		 * Strength Meter.
		 */
		strengthMeter: function() {
			var wrapper    = $( 'form.register, form[name="registerform"], form.checkout, form.edit-account, form.lost_reset_password' ),
				submit     = $( 'input[type="submit"]', wrapper ),
				field      = $( '#reg_password, #user_password, #account_password, #password_1', wrapper ),
				strength   = 1,
				fieldValue = field.val();

			wc_password_strength_meter.includeMeter( wrapper, field );

			strength = wc_password_strength_meter.checkPasswordStrength( wrapper, field );

			if ( fieldValue.length > 0 && strength < wc_password_strength_meter_params.min_password_strength && ! wrapper.is( 'form.checkout' ) ) {
				submit.attr( 'disabled', 'disabled' ).addClass( 'disabled' );
			} else {
				submit.removeAttr( 'disabled', 'disabled' ).removeClass( 'disabled' );
			}
		},

		/**
		 * Include meter HTML.
		 *
		 * @param {Object} wrapper
		 * @param {Object} field
		 */
		includeMeter: function( wrapper, field ) {
			var meter = wrapper.find( '.woocommerce-password-strength' );

			if ( '' === field.val() ) {
				meter.remove();
				$( document.body ).trigger( 'wc-password-strength-removed' );
			} else if ( 0 === meter.length ) {
				field.after( '<div class="woocommerce-password-strength" aria-live="polite"></div>' );
				$( document.body ).trigger( 'wc-password-strength-added' );
			}
		},

		/**
		 * Check password strength.
		 *
		 * @param {Object} field
		 *
		 * @return {Int}
		 */
		checkPasswordStrength: function(wrapper, field)
		{
			var meter     = wrapper.find('.woocommerce-password-strength'),
				hint      = wrapper.find('.woocommerce-password-hint'),
				confirm   = wrapper.find('input#password_2'),
				submit    = wrapper.find('button[type=submit]'),
				hint_html = '<small class="woocommerce-password-hint">' + wc_password_strength_meter_params.i18n_password_hint + '</small>',
				strength  = wp.passwordStrength.meter(field.val(), wp.passwordStrength.userInputBlacklist(), (confirm.length > 0) ? confirm.val() : null),
				error     = '';

			meter.removeClass('short bad good strong');
			hint.remove();

			submit.attr('disabled', 'disabled');

			if(strength < wc_password_strength_meter_params.min_password_strength)
			{
				error = ' - ' + wc_password_strength_meter_params.i18n_password_error;
			}

			switch(strength)
			{
				case 0:
				{
					meter.addClass('short').html(pwsL10n['short'] + error);
					meter.after(hint_html);
				}

				break;

				case 1:
				{
					meter.addClass('bad').html(pwsL10n.bad + error);
					meter.after(hint_html);
				}

				break;

				case 2:
				{
					meter.addClass('bad').html(pwsL10n.bad + error);
					meter.after(hint_html);
				}

				break;

				case 3:
				{
					meter.addClass('good').html(pwsL10n.good + error);
				}

				break;

				case 4:
				{
					meter.addClass('strong').html(pwsL10n.strong + error);
				}

				break;

				case 5:
				{
					meter.addClass('mismatch').html(pwsL10n.mismatch);
				}

				break;
			}

			if(strength >= 3 && strength < 5 && !(field.length > 0 && confirm.length > 0 && field.val() !== confirm.val()))
			{
				submit.removeAttr('disabled');
			}

			return strength;
		},

		confirmCheck: function()
		{
			var wrapper    = $( 'form.register, form.checkout, form.edit-account, form.lost_reset_password' ),
				field      = $( '#reg_password, #account_password, #password_1', wrapper );

			field.trigger('change');
		}
	};

	wc_password_strength_meter.init();
});
