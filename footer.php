<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of #main and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package Fluida
 */

?>	<style>

	#footer  {
   position:relative;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #100e17;

}


	</style>
		<?php cryout_absolute_bottom_hook(); ?>

		
	</div><!-- #main -->

  <!-- Other elements here -->
  <div id="copyright">
	<footer id="footer" role="contentinfo" <?php cryout_schema_microdata( 'footer' );?>>
		<?php cryout_master_footer_hook(); ?>
	</footer>
  </div>

	</div><!-- site-wrapper -->
	<?php wp_footer(); ?>
</body>
</html>
