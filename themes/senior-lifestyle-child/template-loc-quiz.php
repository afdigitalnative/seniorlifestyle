<?php
/**
 * Template Name: Lifestyle Quiz Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_Child
 */

get_header();
global $post;


?>

<div id="primary" class="content-area lifestyle-quiz">
    <main id="main" class="site-main pb-0" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div class="row">
						<div class="col-md-12">
							<div class="section-title-with-line line-primary-light <?php echo $loc_color_scheme; ?>">
								<h1 class="h2"><?php echo get_the_title(); ?></h1>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="typeform-widget" style="width: 100%; height: 600px;" data-url="https://form.typeform.com/to/URkK5Vaq" data-transparency="50" data-hide-headers="true"></div>
							<script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm", b="https://embed.typeform.com/"; if(!gi.call(d,id)) { js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>						
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="line-divide">
								<svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
								  <defs>
									<filter id="filter_1">
									  <feColorMatrix in="SourceGraphic" type="matrix" values="0 0 0 0 0.03137255 0 0 0 0 0.29803923 0 0 0 0 0.38039216 0 0 0 1 0" />
									</filter>
								  </defs>
								  <g id="Group">
									<g id="1-isolated" filter="url(#filter_1)">
									  <path d="M5.54006 1.29022C4.57917 1.29022 3.6411 1.84985 3.15068 2.71206C2.77431 3.37345 2.35517 4.77654 3.758 6.73124C5.56002 9.24557 4.78447 12.5391 3.62684 15.1257C6.88017 11.9581 9.63736 8.6672 9.47769 5.7646C9.395 4.27314 8.55387 2.95841 6.90868 1.74007C6.5095 1.4482 6.03618 1.29022 5.54006 1.29022ZM1.07209 19.3939L0 18.5183C0.0541745 18.446 5.4146 11.4413 2.57472 7.47831C1.24887 5.62537 0.997952 3.65996 1.89326 2.08549C3.03092 0.0692017 5.9649 -0.66448 7.78973 0.687743C9.75142 2.13636 10.7978 3.82062 10.9005 5.69231C11.1514 10.1935 5.86796 15.016 1.20895 19.2681L1.07209 19.3939L1.07209 19.3939Z" transform="translate(19.39392 1.2121277)" id="Fill-9467" fill="#777776" stroke="none" />
									  <path d="M13.8144 6.01794C15.2266 6.01794 16.4569 6.38087 17.4679 7.09829C18.3639 7.73413 19.2438 8.05486 20.0783 8.05486C21.4237 8.05486 22.2929 7.21083 22.6567 6.42307C23.0418 5.58467 22.9669 4.67593 22.4534 3.98945C21.1508 2.24793 19.7199 1.40672 18.0724 1.40672C15.0928 1.40672 11.6881 4.22296 8.68447 7.24741C10.2304 6.57781 12.0518 6.01794 13.8144 6.01794ZM0 14.5455L4.62441 9.54036C8.34212 5.51433 13.4373 0 18.0724 0C20.1265 0 21.9532 1.04941 23.5045 3.1201C24.3417 4.23703 24.4754 5.70283 23.8602 7.0364C22.7048 9.54036 19.5086 10.2353 16.7217 8.26306C15.9354 7.70881 14.9564 7.42465 13.8144 7.42465C9.96026 7.42465 5.52575 10.5785 5.48028 10.6095L0 14.5455L0 14.5455Z" transform="translate(14.54541 9.69696)" id="Fill-9468" fill="#777776" stroke="none" />
									  <path d="M6.33772 1.39847C4.75187 1.39847 3.04051 4.70444 2.07645 7.60486C4.59214 6.72383 7.74389 5.18552 8.21451 3.68916C8.30293 3.40387 8.35997 2.95356 7.83516 2.33264C7.3132 1.71172 6.80834 1.39847 6.33772 1.39847ZM0 9.69697L0.319453 8.50548C0.553339 7.63283 2.70394 0 6.33772 0C7.25615 0 8.12894 0.481073 8.93613 1.44042C9.82604 2.49486 9.7747 3.4682 9.57789 4.09751C8.61953 7.15735 1.96521 9.13758 1.20936 9.35295L0 9.69697L0 9.69697Z" transform="translate(30.302979 0)" id="Fill-9469" fill="#777776" stroke="none" />
									  <path d="M4.24936 3.62116C7.32353 6.7861 10.5152 9.48344 13.3517 9.48344C14.9382 9.48344 16.3297 8.63945 17.6091 6.90871C18.1219 6.21299 18.1967 5.28917 17.8121 4.44233C17.4488 3.64112 16.5808 2.78858 15.2373 2.78858C14.4014 2.78858 13.5253 3.11362 12.6306 3.75517C11.6423 4.46514 10.4565 4.82441 9.10501 4.82441C7.44105 4.82441 5.72902 4.28551 4.24936 3.62116ZM13.3517 10.9091C8.95544 10.9091 4.26538 5.75678 0.12286 1.20895L0 1.07209L0.873376 0C0.91611 0.0342156 5.29367 3.39875 9.10501 3.39875C10.1867 3.39875 11.1215 3.12218 11.8854 2.57473C14.6684 0.575963 17.8601 1.28309 19.0113 3.82075C19.6256 5.16941 19.4947 6.65494 18.6587 7.78691C17.131 9.85981 15.3468 10.9091 13.3517 10.9091L13.3517 10.9091Z" transform="translate(19.39392 19.393951)" id="Fill-9470" fill="#777776" stroke="none" />
									  <path d="M7.30641 8.69336C8.45946 11.3709 9.28909 14.8723 7.44984 17.4723C6.06618 19.4276 6.47959 20.8266 6.85081 21.4846C7.58483 22.7953 9.41002 23.3169 10.5546 22.4583C12.2055 21.2252 13.0492 19.877 13.1335 18.3336C13.2995 15.2923 10.4112 11.7828 7.30641 8.69336ZM9.20754 24.2424C7.74513 24.2424 6.33335 23.4079 5.61058 22.1159C4.72751 20.5404 4.975 18.577 6.28272 16.726C9.08942 12.7538 3.99068 5.55572 3.93725 5.4835L0 0L5.00874 4.62487C9.14004 8.44459 14.7956 13.6713 14.5369 18.4058C14.43 20.3264 13.3838 22.0437 11.4265 23.5095C10.7853 23.991 10.0175 24.2424 9.20754 24.2424L9.20754 24.2424Z" transform="translate(15.757568 14.545441)" id="Fill-9471" fill="#777776" stroke="none" />
									  <path d="M2.08875 2.07059C3.05622 4.85989 4.76469 8.27094 6.3697 8.27094C6.69126 8.27094 7.01841 8.12834 7.36514 7.83458C8.45285 6.91907 8.31863 6.29162 8.27389 6.08913C7.96072 4.63743 5.0499 3.04599 2.08875 2.07059ZM6.3697 9.69697C2.86608 9.69697 0.59279 2.07629 0.34393 1.20927L0 0L1.19397 0.31943C1.98249 0.530481 8.9254 2.47843 9.63843 5.78111C9.8034 6.54831 9.69995 7.71765 8.25712 8.93262C7.65594 9.44029 7.02121 9.69697 6.3697 9.69697L6.3697 9.69697Z" transform="translate(30.302979 30.30304)" id="Fill-9472" fill="#777776" stroke="none" />
									  <path d="M7.28225 4.25753C4.02607 7.41729 1.26888 10.7026 1.4314 13.5979C1.51409 15.0857 2.35237 16.3971 4.00041 17.6124C4.39674 17.9035 4.87006 18.0585 5.36618 18.0585C6.32707 18.0585 7.26799 17.5029 7.75556 16.6402C8.13193 15.9831 8.55107 14.5835 7.14824 12.6337C5.34907 10.1257 6.12177 6.83769 7.28225 4.25753ZM5.36618 19.3939L5.36618 19.3939C4.54501 19.3939 3.76661 19.1402 3.11651 18.6621C1.15768 17.2171 0.111251 15.5371 0.00860494 13.6674C-0.242309 9.17747 5.04113 4.36437 9.703 0.120194L9.83415 0L10.9091 0.873408C10.8549 0.945525 5.49164 7.93279 8.33438 11.8858C9.66022 13.7368 9.90829 15.6973 9.01583 17.2678C8.2802 18.5606 6.84885 19.3939 5.36618 19.3939L5.36618 19.3939Z" transform="translate(9.6970215 19.393951)" id="Fill-9473" fill="#777776" stroke="none" />
									  <path d="M4.11758 2.33488C2.78506 2.33488 1.9258 3.10632 1.56623 3.82633C1.18552 4.59262 1.25954 5.42321 1.76717 6.05064C3.05474 7.64237 4.47186 8.41124 6.10049 8.41124C9.04314 8.41124 12.4062 5.83464 15.3752 3.07546C13.8497 3.6849 12.0519 4.19662 10.3096 4.19662C8.91359 4.19662 7.6974 3.8649 6.69801 3.20918C5.80967 2.62803 4.94247 2.33488 4.11758 2.33488ZM6.10049 9.69697C4.06735 9.69697 2.26158 8.73782 0.730767 6.84522C-0.0994122 5.82435 -0.228962 4.48462 0.376487 3.26575C1.52129 0.977154 4.67808 0.342004 7.43566 2.1446C8.21296 2.65375 9.18062 2.91089 10.3096 2.91089C14.1273 2.91346 18.503 0.0282861 18.5479 0L19.3939 0.977154C15.7163 4.65691 10.6797 9.69697 6.10049 9.69697L6.10049 9.69697Z" transform="translate(1.2121582 19.393951)" id="Fill-9474" fill="#777776" stroke="none" />
									  <path d="M7.62018 2.0915C5.10693 2.97228 1.95182 4.51015 1.48397 6.00888C1.39268 6.29408 1.33563 6.74426 1.86053 7.365C2.38258 7.98574 2.88751 8.29891 3.36106 8.29891C4.94433 8.29891 6.65882 4.99388 7.62018 2.0915ZM3.36106 9.69697C2.44249 9.69697 1.5667 9.21324 0.762229 8.25696C-0.127822 7.20282 -0.0793253 6.22698 0.120366 5.59505C1.07888 2.53888 7.73144 0.559225 8.49027 0.343924L9.69697 0L9.37747 1.19115C9.14639 2.06354 6.99544 9.69697 3.36106 9.69697L3.36106 9.69697Z" transform="translate(0 30.30304)" id="Fill-9475" fill="#777776" stroke="none" />
									  <path d="M6.04224 1.42528C4.45574 1.42528 3.06422 2.26905 1.78487 4.00219C1.27206 4.69772 1.19728 5.61845 1.58189 6.46792C1.94512 7.26608 2.81316 8.12124 4.15928 8.12124C4.99259 8.12124 5.86864 7.79628 6.76338 7.15205C7.7516 6.44226 8.93747 6.08309 10.2889 6.08309C11.9502 6.08309 13.6622 6.62185 15.1446 7.28888C12.0704 4.12476 8.87871 1.42528 6.04224 1.42528ZM18.5232 10.9091C18.4778 10.8777 14.0976 7.50837 10.2889 7.50837C9.20723 7.50837 8.27242 7.78773 7.50855 8.33218C6.38946 9.13604 5.26235 9.54652 4.15928 9.54652C4.15928 9.54652 4.15928 9.54652 4.15661 9.54652C2.51669 9.54652 1.06908 8.60584 0.382663 7.08934C-0.231638 5.73818 -0.100765 4.25304 0.735218 3.12136C2.26296 1.04901 4.0471 0 6.04224 0C10.4385 0 15.1312 5.15951 19.2738 9.70615L19.3939 9.83728L18.5232 10.9091L18.5232 10.9091Z" transform="translate(1.2121582 9.69696)" id="Fill-9476" fill="#777776" stroke="none" />
									  <path d="M4.87972 1.32201C4.43244 1.32201 4.00572 1.47801 3.64841 1.76621C2.13949 2.98775 1.36831 4.32034 1.29377 5.8433C1.13953 8.84692 3.77951 12.3132 6.61742 15.3697C5.56349 12.7257 4.80517 9.26467 6.48632 6.69468C7.75105 4.76454 7.37317 3.37907 7.03386 2.72599C6.59429 1.87462 5.746 1.32201 4.87972 1.32201ZM8.71758 19.3939C3.82321 14.4972 -0.210019 10.0949 0.00848 5.77456C0.106162 3.87614 1.06242 2.17603 2.85153 0.727107C3.43762 0.253827 4.13939 0 4.87972 0C6.21641 0 7.50684 0.824937 8.16748 2.10729C8.97464 3.66198 8.74843 5.60269 7.55311 7.43236C4.98254 11.364 9.64813 18.4738 9.69697 18.5452L8.71758 19.3939L8.71758 19.3939Z" transform="translate(10.909058 1.2121277)" id="Fill-9477" fill="#777776" stroke="none" />
									  <path d="M3.32727 1.42644C3.00571 1.42644 2.67856 1.56624 2.33183 1.86008C1.24412 2.77586 1.37834 3.4035 1.42308 3.60605C1.73625 5.05817 4.64707 6.65294 7.60822 7.62577C6.64075 4.83565 4.93228 1.42644 3.32727 1.42644ZM9.69697 9.69697L8.503 9.3803C7.71448 9.16633 0.771566 7.22066 0.0585403 3.91702C-0.106434 3.14674 -0.00297568 1.97705 1.43985 0.761721C2.04103 0.253907 2.67576 0 3.32727 0C6.83089 0 9.10418 7.62007 9.35304 8.48734L9.69697 9.69697L9.69697 9.69697Z" id="Fill-9478" fill="#777776" stroke="none" />
									</g>
								  </g>
								</svg>
							</div>
						</div>
						<div class="col-md-7 pr-3 pr-md-5">
							<?php the_content(); ?>
							<a href="/senior-living-and-care-options" class="btn-primary-navy">Explore Your Lifestyle Options</a>
						</div>
						<div class="col-md-5 mt-5 mt-md-0">
							<div class="text-back-wrap">
								<?php if(get_field('quiz_note')) echo get_field('quiz_note'); ?>
							</div>
						</div>
					</div>

                </article>

			</div><!-- container -->
			
		<?php
			get_template_part( 'template-parts/components/find-community' );
		?>
		
        <?php endwhile; ?>		
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
