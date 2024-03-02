<?php
// Add short code calculator app for [calculator]
function calculatorShortcode() {

	$calc_front = '
		<div class="calculator-pasteurisation">
			<form>
				<div class="form-group">
					<label for="time">Holding Time: <em>Minutes</em>
						<div class="form-group--wrap">
							<span id="time-minus"></span><input type="number" name="timeInput" id="time-input" step="1" min="1" max="60" /><span id="time-plus"></span>
						</div>
					</label>
					<input type="range" class="form-control" name="timeSlider" value="1" min="1" max="60" step="1">
				</div>				
				<div class="form-group">
					<label for="temperature">Temperature: <em>&#176;C</em>
						<div class="form-group--wrap">
							<span id="temp-minus"></span><input type="number" name="tempInput" id="temp-input" step="1" min="44" max="100" /><span id="temp-plus"></span>
						</div>
					</label>
					<input type="range" class="form-control" name="tempSlider" value="1" min="44" max="100" step="1">
				</div>
			</form>
			<div class="text-left text-results"> Actual P.U.\'s<div class="totalpu"></div></div>
		</div>
	';
	return $calc_front;
}
add_shortcode('calculator', 'calculatorShortcode');
?>