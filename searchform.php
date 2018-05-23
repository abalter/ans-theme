<form method="get" id="searchform"   action="<?php bloginfo('home'); ?>/">
  <input type="text" value="&#x1F50D" name="s" id="search-input"
         onfocus="if (this.value == '&#x1F50D'){this.value = '';}else{this.value==this.value;}"
         onfocusout="if (this.value == ''){this.value = '&#x1F50D';}"
         />
  <input type="hidden" id="searchsubmit" />
</form>