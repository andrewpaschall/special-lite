<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Special-Lite
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<div class="grid-x grid-padding-x connect-section">
			<div class="grid-container">
			<h3>Connect With Us</h3>
			<h4>Stay up to date with the latest and greatest from Special&#8209;Lite. Sign up for our&nbsp;newsletter!</h4>
			<?php if( get_theme_mod( 'enable_signup', 'show' ) == 'show' ) : ?>
				<div style="text-align: center;">
					<form method="POST" action="https://special-lite.activehosted.com/proc.php" id="_form_5_" class="_form _form_5 _inline-form _inline-style _dark" novalidate>
					<input type="hidden" name="u" value="5" />
					<input type="hidden" name="f" value="5" />
					<input type="hidden" name="s" />
					<input type="hidden" name="c" value="0" />
					<input type="hidden" name="m" value="0" />
					<input type="hidden" name="act" value="sub" />
					<input type="hidden" name="v" value="2" />
					<div class="_form-content">
						<div class="_form_element _x36227399">
								<input type="text" name="email" placeholder="Type your email" required/>

									<button id="_form_5_submit" class="_submit button large pill" type="submit">
										SIGN UP NOW
									</button>
						</div>
						<div class="_clear-element">
						</div>
					</div>
					<div class="_form-thank-you" style="display:none; text-align: left; font-weight: bold; line-height: 3.5em;">
					</div>
					</form>
				</div>
				<script type="text/javascript">
					window.cfields = [];
					window._show_thank_you = function(id, message, trackcmp_url, email) {
					var form = document.getElementById('_form_' + id + '_'), thank_you = form.querySelector('._form-thank-you');
					form.querySelector('._form-content').style.display = 'none';
					thank_you.innerHTML = message;
					thank_you.style.display = 'block';
					const vgoAlias = typeof visitorGlobalObjectAlias === 'undefined' ? 'vgo' : visitorGlobalObjectAlias;
					var visitorObject = window[vgoAlias];
					if (email && typeof visitorObject !== 'undefined') {
						visitorObject('setEmail', email);
						visitorObject('update');
					} else if (typeof(trackcmp_url) != 'undefined' && trackcmp_url) {
						// Site tracking URL to use after inline form submission.
						_load_script(trackcmp_url);
					}
					if (typeof window._form_callback !== 'undefined') window._form_callback(id);
					};
					window._show_error = function(id, message, html) {
					var form = document.getElementById('_form_' + id + '_'), err = document.createElement('div'), button = form.querySelector('button'), old_error = form.querySelector('._form_error');
					if (old_error) old_error.parentNode.removeChild(old_error);
					err.innerHTML = message;
					err.className = '_error-inner _form_error _no_arrow';
					var wrapper = document.createElement('div');
					wrapper.className = '_form-inner';
					wrapper.appendChild(err);
					button.parentNode.insertBefore(wrapper, button);
					document.querySelector('[id^="_form"][id$="_submit"]').disabled = false;
					if (html) {
						var div = document.createElement('div');
						div.className = '_error-html';
						div.innerHTML = html;
						err.appendChild(div);
					}
					};
					window._load_script = function(url, callback) {
					var head = document.querySelector('head'), script = document.createElement('script'), r = false;
					script.type = 'text/javascript';
					script.charset = 'utf-8';
					script.src = url;
					if (callback) {
						script.onload = script.onreadystatechange = function() {
						if (!r && (!this.readyState || this.readyState == 'complete')) {
							r = true;
							callback();
						}
						};
					}
					head.appendChild(script);
					};
					(function() {
					if (window.location.search.search("excludeform") !== -1) return false;
					var getCookie = function(name) {
						var match = document.cookie.match(new RegExp('(^|; )' + name + '=([^;]+)'));
						return match ? match[2] : null;
					}
					var setCookie = function(name, value) {
						var now = new Date();
						var time = now.getTime();
						var expireTime = time + 1000 * 60 * 60 * 24 * 365;
						now.setTime(expireTime);
						document.cookie = name + '=' + value + '; expires=' + now + ';path=/';
					}
						var addEvent = function(element, event, func) {
						if (element.addEventListener) {
						element.addEventListener(event, func);
						} else {
						var oldFunc = element['on' + event];
						element['on' + event] = function() {
							oldFunc.apply(this, arguments);
							func.apply(this, arguments);
						};
						}
					}
					var _removed = false;
					var form_to_submit = document.getElementById('_form_5_');
					var allInputs = form_to_submit.querySelectorAll('input, select, textarea'), tooltips = [], submitted = false;

					var getUrlParam = function(name) {
						var regexStr = '[\?&]' + name + '=([^&#]*)';
						var results = new RegExp(regexStr, 'i').exec(window.location.href);
						return results != undefined ? decodeURIComponent(results[1]) : false;
					};

					for (var i = 0; i < allInputs.length; i++) {
						var regexStr = "field\\[(\\d+)\\]";
						var results = new RegExp(regexStr).exec(allInputs[i].name);
						if (results != undefined) {
						allInputs[i].dataset.name = window.cfields[results[1]];
						} else {
						allInputs[i].dataset.name = allInputs[i].name;
						}
						var fieldVal = getUrlParam(allInputs[i].dataset.name);

						if (fieldVal) {
						if (allInputs[i].dataset.autofill === "false") {
							continue;
						}
						if (allInputs[i].type == "radio" || allInputs[i].type == "checkbox") {
							if (allInputs[i].value == fieldVal) {
							allInputs[i].checked = true;
							}
						} else {
							allInputs[i].value = fieldVal;
						}
						}
					}

					var remove_tooltips = function() {
						for (var i = 0; i < tooltips.length; i++) {
						tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
						}
						tooltips = [];
					};
					var remove_tooltip = function(elem) {
						for (var i = 0; i < tooltips.length; i++) {
						if (tooltips[i].elem === elem) {
							tooltips[i].tip.parentNode.removeChild(tooltips[i].tip);
							tooltips.splice(i, 1);
							return;
						}
						}
					};
					var create_tooltip = function(elem, text) {
						var tooltip = document.createElement('div'), arrow = document.createElement('div'), inner = document.createElement('div'), new_tooltip = {};
						if (elem.type != 'radio' && elem.type != 'checkbox') {
						tooltip.className = '_error';
						arrow.className = '_error-arrow';
						inner.className = '_error-inner';
						inner.innerHTML = text;
						tooltip.appendChild(arrow);
						tooltip.appendChild(inner);
						elem.parentNode.appendChild(tooltip);
						} else {
						tooltip.className = '_error-inner _no_arrow';
						tooltip.innerHTML = text;
						elem.parentNode.insertBefore(tooltip, elem);
						new_tooltip.no_arrow = true;
						}
						new_tooltip.tip = tooltip;
						new_tooltip.elem = elem;
						tooltips.push(new_tooltip);
						return new_tooltip;
					};
					var resize_tooltip = function(tooltip) {
						var rect = tooltip.elem.getBoundingClientRect();
						var doc = document.documentElement, scrollPosition = rect.top - ((window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0));
						if (scrollPosition < 40) {
						tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _below';
						} else {
						tooltip.tip.className = tooltip.tip.className.replace(/ ?(_above|_below) ?/g, '') + ' _above';
						}
					};
					var resize_tooltips = function() {
						if (_removed) return;
						for (var i = 0; i < tooltips.length; i++) {
						if (!tooltips[i].no_arrow) resize_tooltip(tooltips[i]);
						}
					};
					var validate_field = function(elem, remove) {
						var tooltip = null, value = elem.value, no_error = true;
						remove ? remove_tooltip(elem) : false;
						if (elem.type != 'checkbox') elem.className = elem.className.replace(/ ?_has_error ?/g, '');
						if (elem.getAttribute('required') !== null) {
						if (elem.type == 'radio' || (elem.type == 'checkbox' && /any/.test(elem.className))) {
							var elems = form_to_submit.elements[elem.name];
							if (!(elems instanceof NodeList || elems instanceof HTMLCollection) || elems.length <= 1) {
							no_error = elem.checked;
							}
							else {
							no_error = false;
							for (var i = 0; i < elems.length; i++) {
								if (elems[i].checked) no_error = true;
							}
							}
							if (!no_error) {
							tooltip = create_tooltip(elem, "Please select an option.");
							}
						} else if (elem.type =='checkbox') {
							var elems = form_to_submit.elements[elem.name], found = false, err = [];
							no_error = true;
							for (var i = 0; i < elems.length; i++) {
							if (elems[i].getAttribute('required') === null) continue;
							if (!found && elems[i] !== elem) return true;
							found = true;
							elems[i].className = elems[i].className.replace(/ ?_has_error ?/g, '');
							if (!elems[i].checked) {
								no_error = false;
								elems[i].className = elems[i].className + ' _has_error';
								err.push("Checking %s is required".replace("%s", elems[i].value));
							}
							}
							if (!no_error) {
							tooltip = create_tooltip(elem, err.join('<br/>'));
							}
						} else if (elem.tagName == 'SELECT') {
							var selected = true;
							if (elem.multiple) {
							selected = false;
							for (var i = 0; i < elem.options.length; i++) {
								if (elem.options[i].selected) {
								selected = true;
								break;
								}
							}
							} else {
							for (var i = 0; i < elem.options.length; i++) {
								if (elem.options[i].selected && !elem.options[i].value) {
								selected = false;
								}
							}
							}
							if (!selected) {
							elem.className = elem.className + ' _has_error';
							no_error = false;
							tooltip = create_tooltip(elem, "Please select an option.");
							}
						} else if (value === undefined || value === null || value === '') {
							elem.className = elem.className + ' _has_error';
							no_error = false;
							tooltip = create_tooltip(elem, "This field is required.");
						}
						}
						if (no_error && elem.name == 'email') {
						if (!value.match(/^[\+_a-z0-9-'&=]+(\.[\+_a-z0-9-']+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i)) {
							elem.className = elem.className + ' _has_error';
							no_error = false;
							tooltip = create_tooltip(elem, "Enter a valid email address.");
						}
						}
						if (no_error && /date_field/.test(elem.className)) {
						if (!value.match(/^\d\d\d\d-\d\d-\d\d$/)) {
							elem.className = elem.className + ' _has_error';
							no_error = false;
							tooltip = create_tooltip(elem, "Enter a valid date.");
						}
						}
						tooltip ? resize_tooltip(tooltip) : false;
						return no_error;
					};
					var needs_validate = function(el) {
							if(el.getAttribute('required') !== null){
								return true
							}
							if(el.name === 'email' && el.value !== ""){
								return true
							}
							return false
					};
					var validate_form = function(e) {
						var err = form_to_submit.querySelector('._form_error'), no_error = true;
						if (!submitted) {
						submitted = true;
						for (var i = 0, len = allInputs.length; i < len; i++) {
							var input = allInputs[i];
							if (needs_validate(input)) {
							if (input.type == 'text') {
								addEvent(input, 'blur', function() {
								this.value = this.value.trim();
								validate_field(this, true);
								});
								addEvent(input, 'input', function() {
								validate_field(this, true);
								});
							} else if (input.type == 'radio' || input.type == 'checkbox') {
								(function(el) {
								var radios = form_to_submit.elements[el.name];
								for (var i = 0; i < radios.length; i++) {
									addEvent(radios[i], 'click', function() {
									validate_field(el, true);
									});
								}
								})(input);
							} else if (input.tagName == 'SELECT') {
								addEvent(input, 'change', function() {
								validate_field(this, true);
								});
							} else if (input.type == 'textarea'){
								addEvent(input, 'input', function() {
								validate_field(this, true);
								});
							}
							}
						}
						}
						remove_tooltips();
						for (var i = 0, len = allInputs.length; i < len; i++) {
						var elem = allInputs[i];
						if (needs_validate(elem)) {
							if (elem.tagName.toLowerCase() !== "select") {
							elem.value = elem.value.trim();
							}
							validate_field(elem) ? true : no_error = false;
						}
						}
						if (!no_error && e) {
						e.preventDefault();
						}
						resize_tooltips();
						return no_error;
					};
					addEvent(window, 'resize', resize_tooltips);
					addEvent(window, 'scroll', resize_tooltips);
					window._old_serialize = null;
					if (typeof serialize !== 'undefined') window._old_serialize = window.serialize;
					_load_script("//d3rxaij56vjege.cloudfront.net/form-serialize/0.3/serialize.min.js", function() {
						window._form_serialize = window.serialize;
						if (window._old_serialize) window.serialize = window._old_serialize;
					});
					var form_submit = function(e) {
						e.preventDefault();
						if (validate_form()) {
						// use this trick to get the submit button & disable it using plain javascript
						document.querySelector('#_form_5_submit').disabled = true;
								var serialized = _form_serialize(document.getElementById('_form_5_'));
						var err = form_to_submit.querySelector('._form_error');
						err ? err.parentNode.removeChild(err) : false;
						_load_script('https://special-lite.activehosted.com/proc.php?' + serialized + '&jsonp=true');
						}
						return false;
					};
					addEvent(form_to_submit, 'submit', form_submit);
					})();

				</script>
			<?php endif ?>
			<?php if( get_theme_mod( 'enable_social', 'show' ) == 'show' ){
							wp_nav_menu( array(
								'theme_location' => 'menu-9',
								'menu_id'        => 'Social Networks',
								'menu_class' => 'menu horizontal social-links',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							) );
						} ?>
			</div>
		</div>
		<div class="grid-x grid-padding-x links-section">
			<div class="medium-6 large-3 cell">
				<div class="footer-logo"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 404 94.5"><defs><style>.cls-1{fill:none;}.cls-2{fill:#d49f0f;}.cls-3{clip-path:url(#clip-path);}.cls-4,.cls-5{fill:#fff;}.cls-5{fill-rule:evenodd;}</style><clipPath id="clip-path"><path class="cls-1" d="M43.6,1.5,1.5,43.6a5.31,5.31,0,0,0,0,7.4L43.6,93a5.19,5.19,0,0,0,7.3,0h0L93,51a5.31,5.31,0,0,0,0-7.4L50.9,1.5a5.19,5.19,0,0,0-7.3,0h0"/></clipPath></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-2" d="M50.9,1.5,93,43.6A5.31,5.31,0,0,1,93,51L50.9,93a5.31,5.31,0,0,1-7.4,0L1.5,51a5.31,5.31,0,0,1,0-7.4L43.6,1.5a5.19,5.19,0,0,1,7.3,0h0"/><g class="cls-3"><path class="cls-4" d="M82.8,79.7H55.2a6.06,6.06,0,0,1-6.1-6.1h0V31.2H61.2V67.6H82.7V79.7ZM39.3,67.2H4V55H33.2V21.6a6.06,6.06,0,0,1,6.1-6.1H61.5V27.6H45.4V61.1a6.06,6.06,0,0,1-6.1,6.1Z"/><path class="cls-2" d="M82.8,74.1H55.2a.47.47,0,0,1-.5-.5h0V31.2h1v42H82.8ZM39.3,61.6H4v-1H38.8v-39a.47.47,0,0,1,.5-.5H61.5v1H39.8v39a.47.47,0,0,1-.5.5Z"/></g><path class="cls-4" d="M391,35.4a6.5,6.5,0,1,1,6.5,6.5h0a6.49,6.49,0,0,1-6.5-6.5h0m11.5,0a5,5,0,1,0-5,5,4.82,4.82,0,0,0,5-4.7v-.3m-1.9,3.2H399l-1.5-2.9h-1v2.9H395V31.9h3.2c1.6,0,2.6.3,2.6,2.1a1.59,1.59,0,0,1-1.8,1.8Zm-2.4-3.8c.8,0,1.2-.2,1.2-1s-.9-.7-1.5-.7h-1.5v1.7Z"/><path class="cls-4" d="M101.8,52.1V63.2h5.7V60.7a9,9,0,0,0,7.2,3.2,11.57,11.57,0,0,0,11.9-11.1v-.7a10,10,0,0,0-3.7-7.9c-2.4-1.8-5.1-2.6-8-3.4s-6.1-1.6-6.1-5.3c0-2.9,2.3-4.7,5.1-4.7a4.87,4.87,0,0,1,4.9,4.7v.1h6.4V25.8h-5.5v2.1A8.08,8.08,0,0,0,113,25c-6,0-11.3,4.6-11.3,10.8a9.91,9.91,0,0,0,4.1,8.2,21.34,21.34,0,0,0,7.4,3.2c2.9.8,6.4,1.8,6.4,5.5,0,3.2-2.4,5.1-5.5,5.1a5.46,5.46,0,0,1-5.6-5.3v-.4Z"/><path class="cls-5" d="M131.2,67.6h-3.6v6h13.6v-6h-3.6V59.4a11.66,11.66,0,0,0,9.5,4.4,14.35,14.35,0,0,0-.3-28.7,10.28,10.28,0,0,0-9.2,4.7V35.4h-10v6h3.5V67.6ZM146,57.8a8.5,8.5,0,1,1,8.5-8.5v.1a8.41,8.41,0,0,1-8.5,8.4"/><path class="cls-5" d="M184.2,55.1a7.91,7.91,0,0,1-6.8,3.4,8.66,8.66,0,0,1-8.4-6.7h22.7l.2-2.3a14.35,14.35,0,0,0-14.4-15c-8.4,0-14.6,6.7-14.6,15a14.68,14.68,0,0,0,14.5,14.7h.2a14.33,14.33,0,0,0,13.2-9ZM169,46.8a8.65,8.65,0,0,1,8.2-6.6,9,9,0,0,1,8.8,6.6Z"/><path class="cls-4" d="M215.4,53.9a7.61,7.61,0,0,1-6.7,3.9,8.52,8.52,0,0,1-8.5-8.3v-.2a8.28,8.28,0,0,1,8.1-8.5h.2a9.1,9.1,0,0,1,4,1,8.91,8.91,0,0,1,3,2.8h6V35.2H216V38a10.6,10.6,0,0,0-8-3.5c-8,0-14.1,7.1-14.1,14.9a14.68,14.68,0,0,0,28.6,4.5Z"/><path class="cls-5" d="M233.6,35.3h-10v6h3.5V57.4h-3.7v6h13.7v-6h-3.6Zm0-9.5h-6.4v6.8h6.4Z"/><path class="cls-5" d="M260.7,63.3h10v-6h-3.5v-16h3.5v-6h-10v4a10,10,0,0,0-8.7-4.7,14.83,14.83,0,0,0-14.7,14.9,14.58,14.58,0,0,0,14.4,14.6,10.57,10.57,0,0,0,9-4.5Zm-8.4-5.5a8.5,8.5,0,1,1,.2,0h-.2"/><polygon class="cls-4" points="283 25.8 273 25.8 273 31.8 276.6 31.8 276.6 57.3 272.7 57.3 272.7 63.3 286.6 63.3 286.6 57.3 283 57.3 283 25.8"/><rect class="cls-4" x="288.6" y="46.4" width="13.4" height="6.3"/><polygon class="cls-4" points="303.9 63.3 331.3 63.3 331.3 52 324.2 52 324.2 56.9 315.2 56.9 315.2 31.8 319.2 31.8 319.2 25.8 303.9 25.8 303.9 31.8 308 31.8 308 57.3 303.9 57.3 303.9 63.3"/><path class="cls-5" d="M343.2,35.3H333.1v6h3.6V57.4h-3.6v6h13.7v-6h-3.6Zm0-9.5h-6.4v6.8h6.4Z"/><polygon class="cls-4" points="355.1 41.3 359.9 41.3 359.9 35.3 355.1 35.3 355.1 25.8 348.7 25.8 348.7 35.3 345.2 35.3 345.2 41.3 348.7 41.3 348.7 63.3 359.9 63.3 359.9 57.3 355.1 57.3 355.1 41.3"/><path class="cls-5" d="M382.2,55.1a7.91,7.91,0,0,1-6.8,3.4,8.66,8.66,0,0,1-8.4-6.7h22.7l.2-2.3a14.35,14.35,0,0,0-14.4-15,14.85,14.85,0,0,0-.1,29.7h.2a14.22,14.22,0,0,0,13.2-9ZM367,46.8a8.65,8.65,0,0,1,8.2-6.6,9,9,0,0,1,8.8,6.6Z"/></g></g></svg></div>
				<div class="contact">
					<div class="address">
						<div>
							860 S. Williams Street<br>
							Decatur, MI 49045
						</div>
					</div>
					<a href="tel:+18008216531" title="Special-Lite Phone Number">800.821.6531</a>
				</div>
			</div>
			<div class="medium-6 large-3 cell">
				<nav>
					<h4 id="navLabel1"><?php echo get_theme_mod( 'column_1_label', '' ); ?></h4>
					<small>
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'Footer Menu 1',
								'menu_class' => 'menu vertical',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							) );
						?>
					</small>
				</nav>
			</div>
			<div class="medium-6 large-3 cell">
				<nav>
					<h4 id="navLabel2"><?php echo get_theme_mod( 'column_2_label', '' ); ?></h4>
					<small>
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-3',
								'menu_id'        => 'Footer Menu 2',
								'menu_class' => 'menu vertical',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							) );
						?>
					</small>
				</nav>
			</div>
			<div class="medium-6 large-3 cell">
				<nav>
					<h4 id="navLabel3"><?php echo get_theme_mod( 'column_3_label', '' ); ?></h4>
					<small>
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-4',
								'menu_id'        => 'Footer Menu 3',
								'menu_class' => 'menu vertical',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							) );
						?>
					</small>
				</nav>
			</div>
		</div>
		<div class="cell legalese" style="display: flex; justify-content: center;">
			<nav>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-8',
						'menu_id'        => 'legalese',
						'menu_class' => 'menu horizontal',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					) );
				?>
			</nav>
			<p>&copy<?php echo date("Y")?> Special-Lite</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
