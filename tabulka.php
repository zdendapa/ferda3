<style type="text/css">
.tabulka {
	font-size: 14px;
}
</style>
<table width="100%" cellpadding="5" cellspacing="0" class="tabulka">
	<col width="90" />
	<col width="84" />
	<tr>
		<th colspan="2" class="nadpistabulky" style="font-size: 24px">Přehled objednávky 
		  <input name="obj_cislo" id="obj_cislo" value="<?php if (isset($cislo_objednavky)) {echo 'č. '.$cislo_objednavky;} ?>" size="5" hidden="hidden" class="tabulkainputy" style="border:none; color:#FFFFFF; font-weight:bold; font-size:16px; background:none;"/> </th>
  </tr>
	<tr>
		<td width="30%" >Jméno:
	  </td>
		<td width="70%" ><input name="jmeno" type="text"  id="jmeno" style="background:none; border:none; text-align:left;" value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>" readonly="readonly" class="tabulkainputy" /></td>
	</tr>
	<tr class="tabulka">
		<td >Příjmení:
	  </td>
		<td ><input name="prijmeni" type="text"  id="prijmeni"  style="background:none; border:none; text-align:left;" value="<?php echo htmlspecialchars($_POST['surname'], ENT_QUOTES); ?>" readonly="readonly" class="tabulkainputy" /></td>
	</tr>
	<tr>
		<td >Adresa:
	  </td>
		<td ><input name="adresa" type="text"  id="adresa"  style="background:none; border:none; text-align:left;" value="<?php echo htmlspecialchars($_POST['street'], ENT_QUOTES); ?>" readonly="readonly"  class="tabulkainputy"  /></td>
	</tr>
	<tr>
		<td >PSČ:
	  </td>
		<td ><input name="PSC" type="text"  id="PSC"  style="background:none; border:none; text-align:left;" value="<?php echo htmlspecialchars($_POST['zip'], ENT_QUOTES); ?>" readonly="readonly" class="tabulkainputy"  /></td>
	</tr>
	<tr>
		<td >Město:
	  </td>
		<td ><input name="mesto" type="text"  id="mesto"  style="background:none; border:none; text-align:left;" value="<?php echo htmlspecialchars($_POST['city'], ENT_QUOTES); ?>" readonly="readonly"  class="tabulkainputy" /></td>
	</tr>
	<tr>
		<td >e-mail: 
	  </td>
		<td ><input name="e-mail" type="text"  id="e-mail" style="background:none; border:none; text-align:left;" value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>"  class="tabulkainputy" /></td>
	</tr>
	<tr>
		<td >Telefon:
	  </td>
		<td ><input name="telefon" type="text"   id="telefon" style="background:none; border:none; text-align:left;" value="<?php echo htmlspecialchars($_POST['phone'], ENT_QUOTES); ?>" size="13" readonly="readonly"  class="tabulkainputy" /></td>
	</tr>
<?php if (isset($_POST['note']) AND $_POST['note'] !== ''): ?>
	<tr>
		<td >Trvalá objednávka:
	  </td>
		<td ><input name="trvala_objednavka" type="text"  id="trvala_objednavka"  style="background:none; border:none; text-align:left;" value="<?php echo htmlspecialchars($_POST['note'], ENT_QUOTES); ?>" size="4" readonly="readonly"  class="tabulkainputy" /></td>
	</tr>
	<tr>
	  <td >Poznámka:
	  </td>
	  <td ><input name="poznamka" type="text"  id="poznamka"  style="background:none; border:none; text-align:left;" value="<?php echo htmlspecialchars($_POST['poznamka'], ENT_QUOTES); ?>" readonly="readonly"  class="tabulkainputy" /></td>
  </tr>
<?php endif; ?>
</table>  
<table width="100%" cellpadding="5" cellspacing="0" class="tabulka">
	<col width="90" />
	<col width="84" />
    	<tr class="vycet">
		<th width="70%" align="center" >vybraná piva</th>
		<th width="30%" align="center" >počet kusů</th>
	</tr>
<?php foreach ($data as $item):
	if ( ! $item['count']) continue; ?>
		<tr class="tabulkainputyvycet" >
			<td >
			  <?php echo $item['name']; ?></td>
			<td align="center" ><?php echo $item['count']; ?></td>
		</tr>
<?php endforeach; ?>
	<tr class="vycet">
	  <td bgcolor="#00a852" >cena za piva </td>
	  <td align="center" nowrap="nowrap" bgcolor="#00a852" ><input name="piva_celkem" type="text"  id="piva_celkem"  style="background:none; border:none; text-align: right;" value="<?php echo number_format((int) $_POST['celkova_cena'] - (int) $_POST['obaly_celkem'], 2, ',', ' '); ?>" size="8" readonly="readonly"  class="tabulkainputyvycet" />
      Kč</td>
  </tr>
	<tr class="vycet">
	  <td bgcolor="#00a852" >cena za obaly </td>
	  <td align="center" nowrap="nowrap" bgcolor="#00a852"><input name="obaly_celkem" type="text"  id="obaly_celkem"  style="background:none; border:none; text-align: right;" value="<?php echo number_format((int) $_POST['obaly_celkem'], 2, ',', ' '); ?>" size="8" readonly="readonly"  class="tabulkainputyvycet"  />
      Kč</td>
  </tr>
	<tr class="vycet">
	  <td bgcolor="#00a852" >celková cena </td>
	  <td align="center" nowrap="nowrap" bgcolor="#00a852" ><input name="celkova_cena" type="text"  id="celkova_cena"  style="background:none; border:none; text-align: right;" value="<?php echo number_format((int) $_POST['celkova_cena'], 2, ',', ' '); ?>" size="8" readonly="readonly"  class="tabulkainputyvycet" />
      Kč</td>
  </tr>
</table>
<textarea name="pivo_ks" readonly="readonly" style="background:none; border:none; width:100%; color:#FFFFFF; visibility:hidden; resize:none;" ><?php foreach ($data as $item): if ( ! $item['count']) continue; ?><?php echo $item['name']; ?> / <?php echo $item['count']; ?> ks <?php echo "\n"; ?><?php endforeach; ?>
	    </textarea>