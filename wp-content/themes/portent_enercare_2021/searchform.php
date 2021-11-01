<?php
/**
 * Search form
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/
?>
<!--
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<button type="submit" class="search-submit"><?php echo enercare_icon( array( 'icon' => 'search', 'title' => 'Submit' ) );?></button>
	<label>
		<span class="screen-reader-text">Search for</span>
		<input type="search" class="search-field" placeholder="Search&hellip;" value="<?php echo get_search_query(); ?>" name="addsearch addsearch-searchfield" id="searchfield" title="Search for" />
	</label>
</form>
-->
<div id="searchfield" class="search-field"></div>
<section id="scrollable" style="max-height: 300px; max-width: 700px; overflow: auto;">
  <div id="autocomplete"></div>
</section>
