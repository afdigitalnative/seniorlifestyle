<?php

/**
 * The main Front (Home) Page template file
 *
 * This is for whatever static page is set for the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Senior_Lifestyle_Child
 */

get_header();
?>

<?php

$featured_img = get_post_thumbnail_id(get_the_ID(), 'full');
$background_img = wp_get_attachment_url($featured_img);


?>

<!-- Start Hero Section -->
<section class="home-hero">
	<div class="hero-background" style="background-image: url('<?php echo $background_img; ?>');">
		<!-- Backgrond Image Elemeent -->
	</div>
	<div class="container">
		<div class="hero-content">
			<h1 class="h2"><?php echo get_the_title(); ?></h1>
			<?php the_content(); ?>
			<svg class="d-none d-md-block" width="348px" height="348px" viewBox="0 0 348 348" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
			  <g id="squares" transform="translate(0.5 0.5)" opacity="0.45282915">
				<path d="M0 0L150 0L150 150L0 150L0 0Z" id="Rectangle" fill="none" fill-rule="evenodd" stroke="#177E89" stroke-width="1" />
				<path d="M97 100L247 100L247 250L97 250L97 100Z" id="Rectangle-Copy" fill="none" fill-rule="evenodd" stroke="#177E89" stroke-width="1" />
				<path d="M197 0L347 0L347 150L197 150L197 0Z" id="Rectangle-Copy-2" fill="none" fill-rule="evenodd" stroke="#177E89" stroke-width="1" />
				<path d="M0 197L150 197L150 347L0 347L0 197Z" id="Rectangle-Copy-4" fill="none" fill-rule="evenodd" stroke="#177E89" stroke-width="1" />
				<path d="M197 197L347 197L347 347L197 347L197 197Z" id="Rectangle-Copy-3" fill="none" fill-rule="evenodd" stroke="#177E89" stroke-width="1" />
			  </g>
			</svg>
		</div>
	</div>
</section>
<!-- End Hero Section -->

<!-- Start Choose your path Section -->
<section class="choose-your-path">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title-with-line line-white m-show">
					<h2>Choose Your Path</h2>
				</div>
			</div>
			<div class="col-md-7 col-path">
				<div class="row item-path">
					<div class="col-md-3 col-icon d-none d-md-block">
						<div class="wrap-icon" style="background-color: #177e89;">
							<svg width="76px" height="65px" viewBox="0 0 76 65" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
							  <g id="loved-one-icon">
								<path d="M70.4199 65L67.0943 65L67.0943 59.7719C67.0554 59.6266 67.0382 59.4749 67.0425 59.3168C67.0749 58.4302 67.8626 57.7273 68.7582 57.7273C70.8407 57.7273 72.1334 56.6633 72.1334 54.9498L72.1744 38.2657C72.1744 31.0891 69.4056 28.2902 62.299 28.2902L55.0565 28.2902C50.6864 28.2902 48.237 29.5166 46.0185 32.8133C44.0546 35.736 38.299 44.6005 38.2969 44.6026L35.5 42.8207C35.5 42.8207 41.2793 33.9243 43.2518 30.9887C46.1134 26.7327 49.534 25 55.0565 25L62.299 25C71.1817 25 75.5 29.3393 75.5 38.2678L75.459 54.9519C75.459 57.9965 73.4563 60.2612 70.4199 60.8637L70.4199 65Z" id="Fill-1" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
								<path d="M47.4629 65L47.4472 48.6587L42.9497 55.296L40.5 53.3484L47.7369 42.6727C48.1251 42.0982 48.811 41.8591 49.4318 42.0833C50.0566 42.3032 50.4783 42.9332 50.4783 43.6444L50.5 64.9957L47.4629 65Z" id="Fill-4" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
								<path d="M68.9789 62C68.9616 62 68.9424 62 68.9232 61.9974C68.1291 61.9586 67.5 61.0784 67.5 60.0067C67.5 59.4398 67.6803 58.891 67.993 58.513C68.3056 58.1351 68.7199 57.9461 69.1419 58.0134C69.9322 58.1351 70.5555 59.0851 70.4961 60.1543C70.4385 61.1975 69.7499 62 68.9789 62" id="Fill-6" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
								<path d="M59.5021 6.26552C55.7887 6.26552 52.7662 9.28735 52.7662 13C52.7662 16.7148 55.7887 19.7345 59.5021 19.7345C63.2134 19.7345 66.2338 16.7148 66.2338 13C66.2338 9.28735 63.2134 6.26552 59.5021 6.26552M59.5021 23C53.9871 23 49.5 18.5139 49.5 13C49.5 7.48612 53.9871 3 59.5021 3C65.015 3 69.5 7.48612 69.5 13C69.5 18.5139 65.015 23 59.5021 23" id="Fill-8" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
								<path d="M29.895 65L26.5689 64.9957L26.5905 43.2604C26.5905 42.4866 27.1366 41.8194 27.9028 41.6553C28.6733 41.4933 29.4439 41.8791 29.7676 42.5825L35.1938 54.4083C35.9471 56.2202 37.4666 56.3395 38.5457 55.9047C39.9983 55.3228 40.5314 54.0673 39.9422 52.6242L31.2461 31.6924C29.9986 27.9175 27.0373 26.2847 21.6068 26.2847L14.1107 26.2847C6.70966 26.2847 3.82606 29.1879 3.82606 36.6398L3.86923 53.8669C3.86923 55.6532 5.26354 56.8063 7.42408 56.8063C8.34139 56.8063 9.08603 57.5396 9.08603 58.4476L9.08603 64.9979L5.75997 64.9979L5.75997 59.9291C2.65622 59.3088 0.543168 56.9513 0.543168 53.8712L0.5 36.644C0.5 27.4613 4.95274 23 14.1107 23L21.6068 23C28.5158 23 32.6901 25.4726 34.3671 30.5606L43.0201 51.3837C44.3021 54.5085 42.9445 57.6867 39.7954 58.9485C36.6572 60.1976 33.439 58.842 32.1418 55.7086L29.9079 50.8444L29.895 65Z" id="Fill-10" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
								<path d="M18 3.33103C14.046 3.33103 10.8314 6.5475 10.8314 10.5032C10.8314 14.4547 14.046 17.669 18 17.669C21.954 17.669 25.1686 14.4547 25.1686 10.5032C25.1686 6.5475 21.954 3.33103 18 3.33103M18 21C12.2106 21 7.5 16.2899 7.5 10.5032C7.5 4.7123 12.2106 0 18 0C23.7894 0 28.5 4.7123 28.5 10.5032C28.5 16.2899 23.7894 21 18 21" id="Fill-13" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
								<path d="M36.476 17.1614C35.496 17.1614 34.6581 17.6087 34.1799 18.3862C33.6759 19.2109 33.6974 20.2141 34.2424 21.1353C35.3 22.916 38.1518 25.1727 39.9267 26.4365C41.708 25.0599 44.603 22.6678 45.7037 21.1148C46.5135 19.9741 46.0871 18.934 45.8674 18.538C45.3935 17.6887 44.478 17.1614 43.4764 17.1614C42.617 17.1614 41.8265 17.5451 41.3139 18.2118C40.9994 18.618 40.504 18.8601 39.9741 18.8601C39.4464 18.8601 38.9488 18.618 38.6343 18.2118C38.1217 17.5451 37.3355 17.1614 36.476 17.1614M39.9741 30C39.6467 30 39.3193 29.9077 39.0371 29.723C38.8023 29.5712 33.2882 25.9502 31.3539 22.6903C30.2295 20.7886 30.2145 18.5852 31.3151 16.7922C32.3878 15.0442 34.3178 14 36.476 14C37.7404 14 38.966 14.3898 39.9762 15.0812C40.9865 14.3898 42.2099 14 43.4764 14C45.708 14 47.7478 15.1714 48.7989 17.0568C49.8436 18.9299 49.7143 21.1086 48.4543 22.8852C46.5415 25.5789 41.2126 29.5056 40.9865 29.6718C40.6892 29.8892 40.3338 30 39.9741 30" id="Fill-16" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
							  </g>
							</svg>
						</div>
					</div>
					<div class="col-md-9 col-path-content">
						<div class="path-heading">
							<div class="col-icon d-block d-md-none">
								<div class="wrap-icon" style="background-color: #177e89;">
									<svg width="76px" height="65px" viewBox="0 0 76 65" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
									  <g id="loved-one-icon">
										<path d="M70.4199 65L67.0943 65L67.0943 59.7719C67.0554 59.6266 67.0382 59.4749 67.0425 59.3168C67.0749 58.4302 67.8626 57.7273 68.7582 57.7273C70.8407 57.7273 72.1334 56.6633 72.1334 54.9498L72.1744 38.2657C72.1744 31.0891 69.4056 28.2902 62.299 28.2902L55.0565 28.2902C50.6864 28.2902 48.237 29.5166 46.0185 32.8133C44.0546 35.736 38.299 44.6005 38.2969 44.6026L35.5 42.8207C35.5 42.8207 41.2793 33.9243 43.2518 30.9887C46.1134 26.7327 49.534 25 55.0565 25L62.299 25C71.1817 25 75.5 29.3393 75.5 38.2678L75.459 54.9519C75.459 57.9965 73.4563 60.2612 70.4199 60.8637L70.4199 65Z" id="Fill-1" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
										<path d="M47.4629 65L47.4472 48.6587L42.9497 55.296L40.5 53.3484L47.7369 42.6727C48.1251 42.0982 48.811 41.8591 49.4318 42.0833C50.0566 42.3032 50.4783 42.9332 50.4783 43.6444L50.5 64.9957L47.4629 65Z" id="Fill-4" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
										<path d="M68.9789 62C68.9616 62 68.9424 62 68.9232 61.9974C68.1291 61.9586 67.5 61.0784 67.5 60.0067C67.5 59.4398 67.6803 58.891 67.993 58.513C68.3056 58.1351 68.7199 57.9461 69.1419 58.0134C69.9322 58.1351 70.5555 59.0851 70.4961 60.1543C70.4385 61.1975 69.7499 62 68.9789 62" id="Fill-6" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
										<path d="M59.5021 6.26552C55.7887 6.26552 52.7662 9.28735 52.7662 13C52.7662 16.7148 55.7887 19.7345 59.5021 19.7345C63.2134 19.7345 66.2338 16.7148 66.2338 13C66.2338 9.28735 63.2134 6.26552 59.5021 6.26552M59.5021 23C53.9871 23 49.5 18.5139 49.5 13C49.5 7.48612 53.9871 3 59.5021 3C65.015 3 69.5 7.48612 69.5 13C69.5 18.5139 65.015 23 59.5021 23" id="Fill-8" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
										<path d="M29.895 65L26.5689 64.9957L26.5905 43.2604C26.5905 42.4866 27.1366 41.8194 27.9028 41.6553C28.6733 41.4933 29.4439 41.8791 29.7676 42.5825L35.1938 54.4083C35.9471 56.2202 37.4666 56.3395 38.5457 55.9047C39.9983 55.3228 40.5314 54.0673 39.9422 52.6242L31.2461 31.6924C29.9986 27.9175 27.0373 26.2847 21.6068 26.2847L14.1107 26.2847C6.70966 26.2847 3.82606 29.1879 3.82606 36.6398L3.86923 53.8669C3.86923 55.6532 5.26354 56.8063 7.42408 56.8063C8.34139 56.8063 9.08603 57.5396 9.08603 58.4476L9.08603 64.9979L5.75997 64.9979L5.75997 59.9291C2.65622 59.3088 0.543168 56.9513 0.543168 53.8712L0.5 36.644C0.5 27.4613 4.95274 23 14.1107 23L21.6068 23C28.5158 23 32.6901 25.4726 34.3671 30.5606L43.0201 51.3837C44.3021 54.5085 42.9445 57.6867 39.7954 58.9485C36.6572 60.1976 33.439 58.842 32.1418 55.7086L29.9079 50.8444L29.895 65Z" id="Fill-10" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
										<path d="M18 3.33103C14.046 3.33103 10.8314 6.5475 10.8314 10.5032C10.8314 14.4547 14.046 17.669 18 17.669C21.954 17.669 25.1686 14.4547 25.1686 10.5032C25.1686 6.5475 21.954 3.33103 18 3.33103M18 21C12.2106 21 7.5 16.2899 7.5 10.5032C7.5 4.7123 12.2106 0 18 0C23.7894 0 28.5 4.7123 28.5 10.5032C28.5 16.2899 23.7894 21 18 21" id="Fill-13" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
										<path d="M36.476 17.1614C35.496 17.1614 34.6581 17.6087 34.1799 18.3862C33.6759 19.2109 33.6974 20.2141 34.2424 21.1353C35.3 22.916 38.1518 25.1727 39.9267 26.4365C41.708 25.0599 44.603 22.6678 45.7037 21.1148C46.5135 19.9741 46.0871 18.934 45.8674 18.538C45.3935 17.6887 44.478 17.1614 43.4764 17.1614C42.617 17.1614 41.8265 17.5451 41.3139 18.2118C40.9994 18.618 40.504 18.8601 39.9741 18.8601C39.4464 18.8601 38.9488 18.618 38.6343 18.2118C38.1217 17.5451 37.3355 17.1614 36.476 17.1614M39.9741 30C39.6467 30 39.3193 29.9077 39.0371 29.723C38.8023 29.5712 33.2882 25.9502 31.3539 22.6903C30.2295 20.7886 30.2145 18.5852 31.3151 16.7922C32.3878 15.0442 34.3178 14 36.476 14C37.7404 14 38.966 14.3898 39.9762 15.0812C40.9865 14.3898 42.2099 14 43.4764 14C45.708 14 47.7478 15.1714 48.7989 17.0568C49.8436 18.9299 49.7143 21.1086 48.4543 22.8852C46.5415 25.5789 41.2126 29.5056 40.9865 29.6718C40.6892 29.8892 40.3338 30 39.9741 30" id="Fill-16" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
									  </g>
									</svg>
								</div>
							</div>					
							<h3 class="h4"><?php if(get_field('loved_one_title')) echo get_field('loved_one_title'); ?></h3>
						</div>
						<p><?php if(get_field('loved_one_description')) echo get_field('loved_one_description'); ?></p>
						
						<?php if(get_field('loved_one_link')): $loved_one_link = get_field('loved_one_link'); ?>
							<a href="<?php echo $loved_one_link['url']; ?>" class="btn-small btn-primary-lightblue">
								<?php echo $loved_one_link['title']; ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="row item-path">
					<div class="col-md-3 col-icon d-none d-md-block">
						<div class="wrap-icon" style="background-color: #084C61;">
							<svg width="60px" height="65px" viewBox="0 0 60 65" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
							  <g id="myself-icon">
								<path d="M21.5205 65L18.5813 64.7302L20.2759 44.2675C17.3271 41.725 5.60648 30.5062 1.11624 9.49178C0.528386 7.30157 -0.605186 3.07615 3.31253 0.855739C4.62227 0.114931 6.74389 -0.392361 8.77168 0.400786C10.3744 1.02886 11.575 2.33735 12.2432 4.18333C12.3103 4.40074 16.0308 16.765 24.5 25.0044L22.4971 27.2812C13.4323 18.464 9.6142 5.73138 9.45527 5.19389C9.12401 4.286 8.53616 3.61968 7.74151 3.30765C6.70368 2.90504 5.47436 3.15466 4.71227 3.58747C3.44274 4.30613 3.03488 5.22006 3.97506 8.73084C8.78891 31.2429 22.5526 42.2161 22.6924 42.3228C23.1022 42.6449 23.3281 43.1683 23.2822 43.7058L21.5205 65Z" id="Fill-1" fill="#E9E7EE" fill-rule="evenodd" stroke="none" />
								<path d="M58.7768 65L55.5909 64.8152L56.3118 53.445C56.3387 44.5324 53.9504 40.2828 47.5 37.849L48.6683 35C56.3947 37.9146 59.5349 43.2868 59.4997 53.5424L58.7768 65Z" id="Fill-4" fill="#E9E7EE" fill-rule="evenodd" stroke="none" />
								<path d="M40.999 5.09309C34.71 5.09309 29.5933 10.2114 29.5933 16.5C29.5933 22.7886 34.71 27.9069 40.999 27.9069C47.29 27.9069 52.4067 22.7886 52.4067 16.5C52.4067 10.2114 47.29 5.09309 40.999 5.09309M40.999 31C33.0038 31 26.5 24.4967 26.5 16.5C26.5 8.50332 33.0038 2 40.999 2C48.9962 2 55.5 8.50332 55.5 16.5C55.5 24.4967 48.9962 31 40.999 31" id="Fill-6" fill="#E9E7EE" fill-rule="evenodd" stroke="none" />
								<path d="M45.9237 65L43.5 64.7151L44.0763 56L46.5 56.287L45.9237 65Z" id="Fill-8" fill="#E9E7EE" fill-rule="evenodd" stroke="none" />
							  </g>
							</svg>
						</div>
					</div>
					<div class="col-md-9 col-path-content">
						<div class="path-heading">
							<div class="col-icon d-block d-md-none">
								<div class="wrap-icon" style="background-color: #084C61;">
									<svg width="60px" height="65px" viewBox="0 0 60 65" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
									  <g id="myself-icon">
										<path d="M21.5205 65L18.5813 64.7302L20.2759 44.2675C17.3271 41.725 5.60648 30.5062 1.11624 9.49178C0.528386 7.30157 -0.605186 3.07615 3.31253 0.855739C4.62227 0.114931 6.74389 -0.392361 8.77168 0.400786C10.3744 1.02886 11.575 2.33735 12.2432 4.18333C12.3103 4.40074 16.0308 16.765 24.5 25.0044L22.4971 27.2812C13.4323 18.464 9.6142 5.73138 9.45527 5.19389C9.12401 4.286 8.53616 3.61968 7.74151 3.30765C6.70368 2.90504 5.47436 3.15466 4.71227 3.58747C3.44274 4.30613 3.03488 5.22006 3.97506 8.73084C8.78891 31.2429 22.5526 42.2161 22.6924 42.3228C23.1022 42.6449 23.3281 43.1683 23.2822 43.7058L21.5205 65Z" id="Fill-1" fill="#E9E7EE" fill-rule="evenodd" stroke="none" />
										<path d="M58.7768 65L55.5909 64.8152L56.3118 53.445C56.3387 44.5324 53.9504 40.2828 47.5 37.849L48.6683 35C56.3947 37.9146 59.5349 43.2868 59.4997 53.5424L58.7768 65Z" id="Fill-4" fill="#E9E7EE" fill-rule="evenodd" stroke="none" />
										<path d="M40.999 5.09309C34.71 5.09309 29.5933 10.2114 29.5933 16.5C29.5933 22.7886 34.71 27.9069 40.999 27.9069C47.29 27.9069 52.4067 22.7886 52.4067 16.5C52.4067 10.2114 47.29 5.09309 40.999 5.09309M40.999 31C33.0038 31 26.5 24.4967 26.5 16.5C26.5 8.50332 33.0038 2 40.999 2C48.9962 2 55.5 8.50332 55.5 16.5C55.5 24.4967 48.9962 31 40.999 31" id="Fill-6" fill="#E9E7EE" fill-rule="evenodd" stroke="none" />
										<path d="M45.9237 65L43.5 64.7151L44.0763 56L46.5 56.287L45.9237 65Z" id="Fill-8" fill="#E9E7EE" fill-rule="evenodd" stroke="none" />
									  </g>
									</svg>
								</div>
							</div>
							<h3 class="h4"><?php if(get_field('myself_title')) echo get_field('myself_title'); ?></h3>
						</div>	
						<p><?php if(get_field('myself_description')) echo get_field('myself_description'); ?></p>
						
						<?php if(get_field('myself_link')): $myself_link = get_field('myself_link'); ?>
							<a href="<?php echo $myself_link['url']; ?>" class="btn-small btn-primary-navy">
								<?php echo $myself_link['title']; ?>
							</a>
						<?php endif; ?>
					</div>
				</div>				
				
			</div>
			<div class="col-md-5 col-form">
				<div class="col-form-inner">
					<div class="h3">Explore Our Communities</div>
					<p>See the senior living communities and services near you to find the perfect fit for you or your loved ones.</p>
					<form id="form-loc-quiz" method="get" action="<?php echo bloginfo('url'); ?>/find-community">
						<div class="form-row align-items-center">
							<div class="col-auto">
								<label for="place">City State, or Zip</label>
								<input type="text" name="place" class="form-control mb-2" id="place" placeholder="Search city, state, or zip">
							</div>
							<div class="col-auto mt-3">
								<label for="select-lifestyle">Living Options</label>
								<select id="select-lifestyle" class="form-control mb-2" name="select-lifestyle">
									<option value="">All Lifestyles</option>
									<option value="Affordable Senior Housing">AH - Affordable Housing</option>
									<option value="Assisted Living">AL - Assisted Living</option>
									<option value="Independent Living">IL - Independent Living</option>
									<option value="Memory Care">MC - Memory Care</option>
									<option value="Short-Term Care">ST - Short-Term Care</option>
									<option value="Skilled Nursing">SN - Skilled Nursing</option>
								</select>
							</div>
							<div class="col-auto text-center text-md-left mt-3">
								<button type="submit" class="btn btn-primary-navy btn-small"><i class="far fa-map-pin"></i>&nbsp;&nbsp;Find a Community</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Choose your path Section -->


<!-- Start fullfilling Section -->
<section class="fulfilling-life">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="section-title-with-line line-primary-yellow m-show">
					<h2><?php if(get_field('fulfilling_title')) echo get_field('fulfilling_title') ?></h2>
				</div>
				<p><?php if(get_field('fulfilling_description')) echo get_field('fulfilling_description') ?></p>
			</div>
		</div>
	</div>
	
	<div class="section-background" style="background-image: url('<?php if(get_field('fulfilling_image')) echo get_field('fulfilling_image') ?>');">
		<!-- Backgrond Image Elemeent -->
	</div>	
</div>
<!-- End fulfilling Section -->	

<!-- Start Services Section -->
<section class="section-page-blurbs">
	<div class="container">
		<div class="section-title-with-line line-primary-yellow m-show">
			<h2>Our Services</h2>
		</div>
		
		<?php
		
		if( have_rows('page_blurb_repeater') ):

			while( have_rows('page_blurb_repeater') ): the_row();
				// vars
				$blurb_image = get_sub_field ('blurb_image');
				$blurb_icon = get_sub_field ('blurb_icon');
				$blurb_title = get_sub_field ('blurb_title');
				$blurb_content = get_sub_field ('blurb_content');
				$button_label = get_sub_field ('button_label');
				$button_url = get_sub_field ('button_url');
				$background_color_scheme = get_sub_field('background_color_scheme');
				
				$is_odd = get_row_index() % 2;
				$row_class = ( (get_row_index() % 2) == 0 ) ? 'content-left' : '';
				$id = str_replace(' ', '-', $blurb_title);
				
				$get_default_content = get_field($blurb_icon, 'option');
				$default_img = $get_default_content[$blurb_icon . '_image'];
				$render_default_img = wp_get_attachment_image($default_img, '', "");

				$image = $render_default_img ? $render_default_img : '<img src="' . $blurb_image['url'] . '" alt="' . $blurb_image['alt'] . '" />';
		?>

		<div class="page-blurbs page-blurbs-alt-3 <?php echo $background_color_scheme; ?>" id="<?php echo strtolower($id); ?>">
			<div class="row <?php echo $row_class; ?>">
				<div class="col-md-5 col-image">
					<a href="<?= $button_url ?>" target="_blank">
						<?php echo $image; ?>
					</a>
				</div>

				<div class="col-md-7 col-content">
					<div class="content-container">
						<h3>
							<?php if($blurb_icon): ?>
							<span class="lo-card-icon">
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icon_' . $blurb_icon . '.svg'; ?>" width="40" height="40" />                  
							</span>							
							<?php endif; ?>
							<a href="<?= $button_url ?>" title="<?= $blurb_title ?>" target="_blank"><?= $blurb_title ?></a>
						</h3>
						<?= $blurb_content ?>
						<a class="btn-primary-lightblue btn-small btn-outline" href="<?= $button_url ?>" target="_blank"><?= $button_label ?></a>
					</div>
				</div>
			</div>
		</div>

		<?php
				endwhile;
			endif;
			wp_reset_postdata();

		?>
	</div>
	
	<div class="show-all-lifestyle">
		<h3>Which Lifestyle Option Is the Best Fit?</h3>
		<div class="wrap-button">
			<a href="/senior-living-and-care-options/" class="btn btn-primary-lightblue btn-outline">See all levels of care</a>
		</div>
	</div>
</section>
<!-- End Services Section -->

<!-- Start Callout Box -->
<?php get_template_part('template-parts/components/callout-box'); ?>
<!-- End Section Callout Box -->


<!-- Start Testimonial Section -->
<section class="home-testimonial">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="section-title-with-line line-white m-show">
					<h2><?php if(get_field('testimonials_section_title')) echo get_field('testimonials_section_title'); ?></h2>
				</div>
				<p class="pl-3 pl-md-0"><?php if(get_field('testimonials_section_description')) echo get_field('testimonials_section_description'); ?></p>
			</div>
			<div class="col-md-7">
				<?php            
					echo do_shortcode("[testimonials-slider section='front-page' icon=false ratings=false]"); 
				?>			
			</div>
		</div>
	</div>
</section>
<!-- End Testimonial Section -->

<!-- Start Resources Section -->
<section class="resources-section">
    <div class="container">
		<div class="row">
			<div class="col-md-4 col-lg-3">
				<div class="section-title-with-line line-primary-yellow m-show">
					<h2>
						Resources
						<div class="text-center svg">
							<svg width="88px" height="88px" viewBox="0 0 88 88" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
							  <g id="squares" transform="translate(1.5 1.5)">
								<path d="M0 85L49 85L49 34L0 34L0 85Z" id="Stroke-6" fill="none" fill-rule="evenodd" stroke="#FFC857" stroke-width="3" />
								<path d="M36 49L85 49L85 0L36 0L36 49Z" id="Stroke-7" fill="none" fill-rule="evenodd" stroke="#FFC857" stroke-width="3" />
							  </g>
							</svg>
						</div>						
					</h2>
				</div>
			</div>
			<div class="col-md-8 col-lg-9">
				<div class="events-inner-container row">
					<div class="col-md-12 row side-container">
					<?php if (have_rows('ebook_section')) : ?>
						<?php while (have_rows('ebook_section')) : the_row(); 
							$ebook_heading = get_sub_field('ebook_header');
							$ebook_cover = get_sub_field('ebook_cover');
							$ebook_link_label = get_sub_field('ebook_link_label');
							$ebook_link = get_sub_field('ebook_link');
						?>
						
						<h4 class="text-left guide-box d-none d-md-block"><?php echo $ebook_heading ?></h4>
						<div class="row">
							<div class="col-md-6 col-guide-box">
								<h4 class="text-left guide-box d-block d-md-none"><?php echo $ebook_heading ?></h4>
								<div class="guide-box">
									<div class="main-wrapper">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/<?php echo $ebook_cover ?>" alt="<?php echo $ebook_heading ?>">
										<div class="my-3 d-block">
											<?php if($ebook_link): ?>
												<a href="<?php echo $ebook_link ?>" class="btn btn-primary-lightblue" target="_blank"><i class="fal fa-arrow-alt-to-bottom" style="margin-right: 10px;"></i><?php echo $ebook_link_label ?></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<?php endwhile; ?>
							<?php endif; ?>
							<?php 
							$resources = get_field('resource_links');
							if ($resources) : 
							?>
								<div class="col-md-6 px-0 mt-4 mt-md-0">
									<div id="resources_column" class="link-box">
										<div class="link-box-wrapper">
											<h4>Other Resources</h4>
											<?php while (have_rows('resource_links')) : the_row(); ?>
												<?php
												$resource_link = get_sub_field('link');
												$resource_text = get_sub_field('text');
												?>
												<a href="<?php echo $resource_link ?>" target="_blank"><?php echo $resource_text ?></a>
											<?php endwhile; ?>
											
											<a href="/resources/" class="btn btn-primary-navy btn-small" target="_blank">See More</a>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
<!-- End Resources Section -->

<!-- Start Careers Section -->
<section class="section-careers">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="section-title-with-line m-show">
					<h3 class="h2"><?php if(get_field('careers_title')) echo get_field('careers_title'); ?></h3>
				</div>				
			</div>
			<div class="col-md-8 px-4 px-md-3">
				<p><?php if(get_field('careers_description')) echo get_field('careers_description'); ?></p>
				<h4 class="mt-5"><?php if(get_field('careers_sub_title')) echo get_field('careers_sub_title'); ?></h4>
				<p><?php if(get_field('careers_mission_description')) echo get_field('careers_mission_description'); ?></p>
				
				<a href="<?php if(get_field('careers_link')) echo get_field('careers_link'); ?>" class="mt-4 btn btn-small btn-primary-purple" target="_blank">Learn More</a>
			</div>
		</div>
	</div>
</section>
<!-- End Careers Section -->

<?php
get_footer();
