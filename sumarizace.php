<script>
	$(function() {
		$('#go_edit').on('click', function() {
			sessionStorage.setItem('load_order', 1);

			// Obnovit stránku, celý formulář se vyplní z cache (podle nastavení prohlížeče) nebo z localStorage
			document.location.reload(false);
			return false;
		});

		$('#go_new').on('click', function() {
			// Obnovit stránku bez použití cache, z localStorage se vyplní jen údaje o uživateli
			document.location.reload(true);
			return false;
		});

		$('#summary').submit(function() {
			$(this).ajaxSubmit({
				error: function(response, status) {
					$('#sumarizace').html('<div class="thanks">Objednávku se nepodařilo odeslat, chyba na straně serveru, na odstranění se pracuje.</div>');
				},
				success: function(response, status, XHR) {
					$('#sumarizace').html('<div class="thanks">Děkujeme za odeslání objednávky. Na Váš e-mail přijde potvrzení s přiděleným číslem objednávky.</div><div class="ui-submit ui-btn ui-shadow ui-btn-corner-all ui-btn-up-c" id="novobj" data-theme="c" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-disabled="false" aria-disabled="false"><p><span class="ui-btn-inner"><span class="ui-btn-text">zpět na úvodní stranu</span></span><input type="button" value="nová objednávka" id="go_new" class="button ui-btn-hidden" name="zpet"></p></div>');
					$(document).on('click', '#go_new', function() {document.location.reload(true);
			return false;});

					// Objednávka byla úspěšně odeslána, uložíme si do localStorage její údaje pro případné použití později
					localStorage.setItem('last_submitted_user_data', localStorage.getItem('user_data'));
					localStorage.setItem('last_submitted_order_data', localStorage.getItem('order_data'));
				}
			});

			return false;
		});
	});
</script>
<div class="blokramecek" id="sumarizace">
	<form id="summary" name="summary" method="post" action="http://ferda.gicz.cz/submit.php" data-ajax="true" data-rel="external">
		<?php require 'tabulka.php'; ?>
		<input type="hidden" name="_post" value="<?php echo base64_encode(serialize($_POST)); ?>" />
		<input type="hidden" name="_data" value="<?php echo base64_encode(serialize($data)); ?>" />
		<div data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="c" data-disabled="false" class="ui-submit ui-btn ui-shadow ui-btn-corner-all ui-btn-up-c" aria-disabled="false">
			<p>
				<span class="ui-btn-inner">
					<span class="ui-btn-text">Upravit objednávku</span>
				</span>
				<input type="submit" value="Upravit objednávku" id="go_edit" class="button ui-btn-hidden" name="submit" data-disabled="false">
			</p>
		</div>
		<div data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="c" data-disabled="false" class="ui-submit ui-btn ui-shadow ui-btn-corner-all ui-btn-up-c" aria-disabled="false" style="margin:10px 0 10px 0;">
			<p>
				<span class="ui-btn-inner">
					<span class="ui-btn-text">Odeslat objednávku</span>
				</span>
				<input type="submit" value="Odeslat objednávku" id="submit" class="button ui-btn-hidden" name="submit" data-disabled="false">
			</p>
		</div>
		<div class="ui-submit ui-btn ui-shadow ui-btn-corner-all ui-btn-up-c" id="novobj" data-theme="c" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-disabled="false" aria-disabled="false"><p><span class="ui-btn-inner"><span class="ui-btn-text">Nová objednávka</span></span><input type="button" value="nová objednávka" id="go_new" class="button ui-btn-hidden" name="zpet"></p></div>
</form>
</div>
