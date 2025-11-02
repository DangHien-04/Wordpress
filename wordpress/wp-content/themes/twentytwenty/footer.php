<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
			<footer id="site-footer" class="header-footer-group">

				<!-- Bootstrap CSS -->
				<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
				<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
				
				<style>
					/* Footer */
				@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
				section {
				    padding: 60px 0;
				}

				section .section-title {
				    text-align: center;
				    color: #007b5e;
				    margin-bottom: 50px;
				    text-transform: uppercase;
				}
				#footer {
				    background: #007b5e !important;
				}
				#footer h5{
					padding-left: 10px;
				    border-left: 3px solid #eeeeee;
				    padding-bottom: 6px;
				    margin-bottom: 20px;
				    color:#ffffff;
				}
				#footer a {
				    color: #ffffff;
				    text-decoration: none !important;
				    background-color: transparent;
				    -webkit-text-decoration-skip: objects;					
				}
				#footer ul.social li{
					padding: 3px 0;
				}
				#footer ul.social li a i {
				    margin-right: 5px;
					font-size:25px;
					-webkit-transition: .5s all ease;
					-moz-transition: .5s all ease;
					transition: .5s all ease;
				}
				#footer ul.social li:hover a i {
					font-size:30px;
					margin-top:-10px;
				}
				#footer ul.social li a,
				#footer ul.quick-links li a{
					color:#ffffff;
				}
				#footer ul.social li a:hover{
					color:#eeeeee;
				}
				#footer ul.quick-links li{
					padding: 3px 0;
					-webkit-transition: .5s all ease;
					-moz-transition: .5s all ease;
					transition: .5s all ease;
				}
				#footer ul.quick-links li:hover{
					padding: 3px 0;
					margin-left:5px;
					font-weight:700;
				}
				#footer ul.quick-links li a i{
					margin-right: 5px;
				}
				#footer ul.quick-links li:hover a i {
				    font-weight: 700;
				}

				/* Add leading arrow for all footer widget links */
				#footer .widget ul{
					list-style: none;
					padding-left: 0;
				}
				#footer .widget ul li{
					list-style: none;
				}
				#footer .widget ul li a{
					position: relative;
					padding-left: 16px;
					font-weight: normal;
					-webkit-transition: .3s all ease;
					-moz-transition: .3s all ease;
					transition: .3s all ease;
				}
				#footer .widget ul li a:before{
					content: "\00bb"; /* » */
					position: absolute;
					left: 0;
					color: #ffffff;
					-webkit-transition: .3s all ease;
					-moz-transition: .3s all ease;
					transition: .3s all ease;
				}
				#footer .widget ul li a:hover{
					color: #eeeeee;
					transform: translateX(5px);
					font-weight: bold;
				}
				#footer .widget ul li a:hover:before{
					color: #eeeeee;
					transform: translateX(-2px);
				}

				/* Hover effect for footer headings */
				#footer h5{
					-webkit-transition: .3s all ease;
					-moz-transition: .3s all ease;
					transition: .3s all ease;
				}

				/* Hover effect for social media icons */
				#footer ul.social li a{
					-webkit-transition: .3s all ease;
					-moz-transition: .3s all ease;
					transition: .3s all ease;
				}
				#footer ul.social li a:hover{
					transform: translateY(-3px);
				}

				@media (max-width:767px){
					#footer h5 {
				    padding-left: 0;
				    border-left: transparent;
				    padding-bottom: 0px;
				    margin-bottom: 10px;
				}
				}

				/* Footer Categories widget styles */
				#footer .widget_categories {
					position: relative;
					background: #fff;
					border: 1px solid #e0e0e0;
					border-radius: 6px;
					padding: 16px 20px 12px;
					box-shadow: 0 2px 8px rgba(0,0,0,0.05);
					color: #333;
				}
				#footer .widget_categories::before{
					content: '';
					position: absolute;
					left: 0; top: 0;
					width: 100%; height: 10px;
					background: repeating-linear-gradient(-45deg, #ededed 0, #ededed 6px, transparent 6px, transparent 12px);
					border-radius: 6px 6px 0 0;
				}
				#footer .widget_categories .widget-title{ display: none; }
				#footer .widget_categories ul{ list-style: none; margin: 10px 0 0; padding: 0; }
				#footer .widget_categories ul li{ position: relative; padding: 12px 0 12px 18px; border-bottom: 1px solid #ebebeb; }
				#footer .widget_categories ul li:last-child{ border-bottom: none; }
				#footer .widget_categories ul li::before{ content:''; position:absolute; left:0; top:50%; transform:translateY(-50%); width:6px; height:6px; border-radius:50%; background:#FFC107; }
				#footer .widget_categories ul li a{ color:#2c6db7 !important; text-decoration: none; padding-left: 0; }
				#footer .widget_categories ul li a:hover{ text-decoration: underline; }
				#footer .widget_categories ul li a:before{ content: none !important; }

				</style>

				<!-- Footer -->
				<section id="footer">
					<div class="container">
						<div class="row text-center text-xs-center text-sm-left text-md-left">
							<!-- Widget Area 1 -->
							<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Danh mục</h5>
					<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
						<?php dynamic_sidebar( 'footer-widget-1' ); ?>
					<?php else : ?>
						
					<?php endif; ?>
				</div>
				
				<!-- Widget Area 2 -->
				<div class="col-xs-12 col-sm-4 col-md-4">
				<h5>Bài viết mới nhất</h5>
					<?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
						<?php dynamic_sidebar( 'footer-widget-2' ); ?>
					<?php else : ?>
						
					<?php endif; ?>
				</div>
				
				<!-- Widget Area 3 -->
				<div class="col-xs-12 col-sm-4 col-md-4">
				<h5>Bình luận mới nhất</h5>
					<?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
						<?php dynamic_sidebar( 'footer-widget-3' ); ?>
					<?php else : ?>
						
					<?php endif; ?>
				</div>
							
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
								<ul class="list-unstyled list-inline social text-center">
									<li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
								</ul>
							</div>
							<hr>
						</div>	
						
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
							<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
							<p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
							</div>
						</div>	
					</div>
				</section>
				<!-- ./Footer -->
			</footer><!-- #site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
