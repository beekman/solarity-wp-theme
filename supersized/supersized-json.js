jQuery(function ($) {
	jQuery.supersized({
		// Functionality
		slideshow: 1, // Slideshow on/off
		autoplay: 1, // Slideshow starts playing automatically
		start_slide: 1, // Start slide (0 is random)
		stop_loop: 0, // Pauses slideshow on last slide
		random: 0, // Randomize slide order (Ignores start slide)
		slide_interval: 7000, // Length between transitions
		transition: 1, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		transition_speed: 1500, // Speed of transition
		new_window: 0, // Image links open in new window/tab
		pause_hover: 0, // Pause slideshow on hover
		keyboard_nav: 1, // Keyboard navigation on/off
		performance: 1, // 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
		image_protect: 1, // Disables image dragging and right click with Javascript

		// Size & Position
		min_width: 0, // Min width allowed (in pixels)
		min_height: 0, // Min height allowed (in pixels)
		vertical_center: 1, // Vertically center background
		horizontal_center: 1, // Horizontally center background
		fit_always: 0, // Image will never exceed browser width or height (Ignores min. dimensions)
		fit_portrait: 0, // Portrait images will not exceed browser height
		fit_landscape: 0, // Landscape images will not exceed browser width

		// Components
		slide_links: 'blank', // Individual links for each slide (Options: false, 'num', 'name', 'blank')
		thumb_links: 0, // Individual thumb links for each slide
		thumbnail_navigation: 0, // Thumbnail navigation
		slides: [
			{ // Slideshow Images
				image: 'http://erskinesolarart.net/wp-content/uploads/2015/12/Natures-Rainbow-light-art-1200x856.jpg',
				title: 'ABOUT: NATURE\'S MOST BEAUTIFUL LIGHT, Corvallis, Oregon, USA',
				url: '/what-is-solar-environmental-art'
			}, {
				image: 'http://erskinesolarart.net/wp-content/uploads/2015/12/CROMOS-train-1200x856.jpg',
				title: 'TRANSPORTATION: CROMOS, Milan Central Station, Milan, Italy',
				url: '/category/type/transportation'
			}, {
				image: 'http://erskinesolarart.net/wp-content/uploads/2015/12/healing-light-1200x856.jpg',
				title: 'HEALTHCARE: HEALING LIGHT, Eisenhower Luci Curci Cancer Center, California, USA',
				url: '/category/type/healthcare'
			}, {
				image: 'http://erskinesolarart.net/wp-content/uploads/2015/12/ecstasy-of-santa-lucia-1200x856.jpg',
				title: 'SPIRITUAL: Ever changing art made from Sunlight, prisms and architecture. THE ECSTASY OF SANTA LUCIA, Church of Santa Lucia de Ocon, La Rioja, Spain',
				url: '/category/type/spiritual'
			}, {
				image: 'http://erskinesolarart.net/wp-content/uploads/2015/12/sun-painting-lafayette-library-1200x856.jpg',
				title: 'LIBRARIES: SUN PAINTING, Lafayette Library, California, USA',
				url: '/category/type/libraries'
			}, {
				image: 'http://erskinesolarart.net/wp-content/uploads/2015/11/Environmental-performance-art-1200x856.jpg',
				title: 'CLIMATE CHANGE: SECRETS OF THE SUN: MILLENNIAL MEDITATIONS, Erskine Studio, Venice, California, USA',
				url: '/category/type/climate-change-sustainability'
			}, {
				image: 'http://erskinesolarart.net/wp-content/uploads/2015/11/Library-solar-public-art-1200x856.jpg',
				title: 'LIBRARIES: MAGIC CARPET, Fontana Library, California, USA',
				url: '/category/type/libraries'
			}, {
				image: 'http://erskinesolarart.net/wp-content/uploads/2015/11/Light-Sculpture-installation-1200x856.jpg',
				title: 'SHOPPING: 52 WEEKS 4 SEASONS, Moreno Valley, California, USA',
				url: '/category/type/shopping'
			}, {
				image: 'http://erskinesolarart.net/wp-content/uploads/2015/11/Church-rainbow-light-art-1200x856.jpg',
				title: 'SPIRITUAL: THE ECSTASY OF SANTA LUCIA, Church of Santa Lucia de Ocon, Spain',
				url: '/category/type/spiritual'
			}, {
				image: 'http://erskinesolarart.net/wp-content/uploads/2015/11/Prism-Light-art-Rome-1200x856.jpg',
				title: 'ANCIENT ROME: NEW LIGHT ON ROME 2000, Ancient Roman Forum, Rome, Italy',
				url: '/category/type/ancient-rome'

			}, {
				image: 'http://erskinesolarart.net/wp-content/uploads/2015/12/Solar-Public-Light-Art-1200x856.jpg',
				title: 'TRANSPORTATION: CROMOS, Rome Termini Railway Station, Rome, Italy',
				url: '/category/type/transportation'
			}
		]
	});
});
