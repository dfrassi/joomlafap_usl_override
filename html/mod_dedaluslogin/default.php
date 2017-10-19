<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_login
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive'); 
$urllogin = $params->get('urllogin');
$urlsmartcard = $params->get('urlsmartcard');

$urlok = $params->get('urlok');
$urlko = $params->get('urlko');
$urlok = base64_encode($urlok);
$urlko = base64_encode($urlko);


$redirecturi = $params->get('redirecturi');

if ($redirecturi) {
	
	$questourl = JURI::root();
	$u =JURI::getInstance();
	//$questourl.="?".$u->getQuery();
	$questourl = JURI::current();
	
	$urlok = base64_encode($questourl);
}

$href_smartcard = JRoute::_($urlsmartcard."?urlko=".$urlko."&amp;urlok=".$urlok);
$href_cedolino = JRoute::_($urllogin."?urlko=".$urlko."&amp;urlok=".$urlok);



?>


<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>



<?php if ($type == 'logout') : ?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
<?php if ($params->get('greeting')) : ?>
	<div class="login-greeting">
	<?php if($params->get('name') == 0) : {
		echo ("Ciao ".JText::sprintf(htmlspecialchars($user->get('name'))));
	} else : {
		echo ("Ciao ".JText::sprintf(htmlspecialchars($user->get('name'))));
	} endif; ?>
	</div>
<?php endif; ?>
	<div class="logout-button">
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGOUT'); ?>" />
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	<div style="margin-top:10px;"/>
</form>
<?php else : ?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form" >
	<?php if ($params->get('pretext')): ?>
		<div class="pretext"><p><?php echo $params->get('pretext'); ?></p></div>
	<?php endif; ?>
	<fieldset class="userdata">
		<p class="pretext">
			
			
			
			<a title="Accesso speciale" onclick="toggle_visibility('login-tradizionale');" style="margin-left:20px;color:transparent;background-color:transparent;" href="#bottom"><img alt="speciale" src="<?php echo JURI::base();?>modules/mod_dedaluslogin/images/group_key.png"/></a>
			
		</p>
		
		<div id="login-tradizionale" style="float:right;
		padding-top:20px;
		text-align:center;
		display:none;
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 41.5%;
		top: 20%;
		margin-left:auto;
		margin-right:auto;
		width: 270px; /* Full width */
		height: 230px; /* Full width */
		overflow: auto; /* Enable scroll if needed */
		background-color: #E0C079; /* Fallback color */
		-moz-box-shadow:5px 5px 2px #333333;
		-webkit-box-shadow:5px 5px 2px #333333;
		box-shadow:5px 5px 2px #333333;
		border-radius: 10px; 
		-moz-border-radius: 10px; /* firefox */
		-webkit-border-radius: 10px; /* safari, chrome */
		" >
			<div id="form-login-username" class="control-group" style="margin-left:20px;width:230px;color:black;">
			 <!--aggiunta class .close colore pulsante di chiusura -->per <div class="input-prepend"><div style="text-align:right;" class="close"><a onclick="toggle_visibility('login-tradizionale');" href="#">[x] chiudi</a></div>
          <div class="controls">
                <?php if (!$params->get('usetext')) : ?>
                   
                        <span class="add-on">
                            <span class="icon-user hasTooltip" title="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>"></span>
                            <label for="modlgn-username"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME'); ?></label>
                        </span>
                        <input id="modlgn-username" type="text" name="username" class="input-small" tabindex="0" size="18" title="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>" />
                    </div>
                <?php else: ?>
                    <label for="modlgn-username"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?></label>
                    <input id="modlgn-username" type="text" name="username" class="input-small" tabindex="0" size="18" title="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>" />
                <?php endif; ?>
            </div>
        </div>
        <div id="form-login-password" class="control-group" style="margin-left:20px;width:230px;color:black;">
            <div class="controls">
                <?php if (!$params->get('usetext')) : ?>
                    <div class="input-prepend">
                        <span class="add-on">
                            <span class="icon-lock hasTooltip" title="<?php echo JText::_('JGLOBAL_PASSWORD') ?>">
                            </span>
                                <label for="modlgn-passwd"><?php echo JText::_('JGLOBAL_PASSWORD'); ?>
                            </label>
                        </span>
                        <input id="modlgn-passwd" type="password" name="password" class="input-small" tabindex="0" size="18" title="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" />
                    </div>
                <?php else: ?>
                    <label for="modlgn-passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
                    <input id="modlgn-passwd" type="password" name="password" class="input-small" tabindex="0" size="18" title="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" />
                <?php endif; ?>
            </div>
        </div>
	<div style="clear:both;"/>
		<div id="form-login-submit" style="margin:0;padding:0;padding-top:20px;padding-right:0;">
            <div class="controls">
                <button type="submit" tabindex="0" name="Submit" class="btn btn-primary"><?php echo JText::_('JLOGIN') ?></button>
             	<a title="Accedi all'area riservata tramite Smartcard Carta Operatore" style="color:transparent;background-color:transparent;margin-top:-5px;" href="<?php echo($href_smartcard);?>"><img alt="smartcard" style="color:white;" src="<?php echo JURI::base();?>modules/mod_dedaluslogin/images/entra_cert.png"/></a>
		 </div>
        </div>
		  <input type="hidden" name="option" value="com_users" />
        <input type="hidden" name="task" value="user.login" />
        <input type="hidden" name="return" value="<?php echo $return; ?>" />
        <?php echo JHtml::_('form.token'); ?>
    
    <?php if ($params->get('posttext')) : ?>
        <div class="posttext">
            <p><?php echo $params->get('posttext'); ?></p>
        </div>
    <?php endif; ?>
		</div>
	</fieldset>
</form>
<?php endif; ?>
