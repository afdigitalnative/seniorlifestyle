<?php
/**
 * Template Name: Financial Calculator
 *
 * @package Senior_Lifestyle_Child
 *
 */

// get only the states with properties
 include get_stylesheet_directory() . '/includes/states_array.php';

 $community_states = $wpdb->get_results("SELECT DISTINCT meta_value
                               FROM wp_postmeta
                               WHERE meta_key = 'general_information_community_address_state'
                               ORDER BY meta_value");

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    			<div class="calculator-content-container">
						<?php the_content(); ?>
					</div>
				<?php endwhile; endif; ?>
            	<div class="calc-calculator-wrapper">
                <table id="budget-calculator">
                    <thead>
                    <tr>
                        <th class="monthly-expenses">Monthly Expenses</th>
                        <th class="monthly-present">Your Current Home</th>
                        <th class="monthly-sls">Senior Lifestyle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="odd">
                        <td class="monthly-expenses">Monthly Mortgage/Rent <div class="tooltip">? <span class="tooltiptext">Monthly housing, rent etc.</span></div></td>
                        <td data-title="Your Current Home" class="monthly-present">$&nbsp;<input class="bc-present-home" name="mm-or-rp-present-home" type="number"></td>
                        <td data-title="Senior Lifestyle" class="monthly-sls">$&nbsp;<input id="slc-cost" class="bc-sls" name="mm-or-rp-sls" type="number"></td>
                    </tr>
                    <tr class="even">
                        <td class="monthly-expenses">Utilities <div class="tooltip">? <span class="tooltiptext">Electricity, water/sewer, natural gas, garbage, etc.</span></div></td>
                        <td data-title="Your Current Home" class="monthly-present">$&nbsp;<input class="bc-present-home" name="utilities" type="number"></td>
                        <td data-title="Senior Lifestyle" class="monthly-sls pad-left">Included</td>
                    </tr>
                    <tr class="odd">
                        <td class="monthly-expenses">Phone/Cable <div class="tooltip">? <span class="tooltiptext">Land line, Data plan, satellite TV, cable bill, streaming subscriptions, etc.</span></div></td>
                        <td data-title="Your Current Home" class="monthly-present">$&nbsp;<input class="bc-present-home" name="phone" type="number"></td>
                        <td data-title="Senior Lifestyle" class="monthly-sls pad-left">Included</td>
                    </tr>
                    <tr class="even">
                        <td class="monthly-expenses">Property Tax/Homeowner’s Insurance/HOA Fee</td>
                        <td data-title="Your Current Home" class="monthly-present">$&nbsp;<input class="bc-present-home" name="property-expenses" type="number"></td>
                        <td data-title="Senior Lifestyle" class="monthly-sls pad-left">Included</td>
                    </tr>
                    <tr class="odd">
                        <td class="monthly-expenses">Property Maintenance <div class="tooltip">? <span class="tooltiptext">Routine maintenance, landscaping, seasonal maintenance, etc.</span></div></td>
                        <td data-title="Your Current Home" class="monthly-present">$&nbsp;<input class="bc-present-home" name="maintenance" type="number"></td>
                        <td data-title="Senior Lifestyle" class="monthly-sls pad-left">Included</td>
                    </tr>
                    <tr class="even">
                        <td class="monthly-expenses">Vehicle/Transportation Costs <div class="tooltip">? <span class="tooltiptext">Car payment, car insurance, gas, bus fare, cab fare, etc.</span></div></td>
                        <td data-title="Your Current Home" class="monthly-present">$&nbsp;<input class="bc-present-home" name="vehicle" type="number"></td>
                        <td data-title="Senior Lifestyle" class="monthly-sls pad-left">Included</td>
                    </tr>
                    <tr class="odd">
                        <td class="monthly-expenses">Food/Groceries <div class="tooltip">? <span class="tooltiptext">Dining in, dining out, food delivery, etc.</span></div></td>
                        <td data-title="Your Current Home" class="monthly-present">$&nbsp;<input class="bc-present-home" name="food" type="number"></td>
                        <td data-title="Senior Lifestyle" class="monthly-sls pad-left">Included</td>
                    </tr>
                    <tr class="even">
                        <td class="monthly-expenses">Medical/Wellness <div class="tooltip">? <span class="tooltiptext">Cost of medications, health insurance, prescription drugs, gym membership, etc.</span></div></td>
                        <td data-title="Your Current Home" class="monthly-present">$&nbsp;<input class="bc-present-home" name="medical" type="number"></td>
                        <td data-title="Senior Lifestyle" class="monthly-sls pad-left">Included</td>
                    </tr>
                    <!--
                    <tr class="no-print">
                        <td colspan="4" align="right" valign="top"><input class="btn-brown right-item btn-calculate" type="button" value="Calculate"></td>
                    </tr>
                    -->
                    <tr>
                        <td colspan="4" class="p-0">
                            <div id="container-options">
                            <h2>Select a Community near you to Compare</h2>
                            <select id="select-property-states" class="sl-select">
                                <option value="">Select State</option>
                                <?php for($i=0;$i<sizeof($community_states);$i++){
                                    if(isset($states[trim($community_states[$i]->meta_value)])){
                                    ?>
                                <option value="<?= trim($community_states[$i]->meta_value) ?>"><?= $states[trim($community_states[$i]->meta_value)] ?></option>
                                <?php }} ?>
                            </select>
                            <select id="select-property-cities">
                                <option>Select City/Metro</option>
                            </select>
                            <select id="select-property" class="sl-select"></select>
                            </div>
                        </td>
                    </tr>
                    <tr class="even calc-total">
                        <td class="monthly-expenses">Total Monthly Expenses</td>
                        <td data-title="Your Current Home" id="monthly-present">$0</td>
                        <td data-title="Senior Lifestyle" id="monthly-sls" class="pad-left">$0</td>
                    </tr>
                    </tbody>
                </table>
        
            </div>
            <?php get_template_part( 'template-parts/about/horizontal-card-alt' ); ?>
        </div><!-- container -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
