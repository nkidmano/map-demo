(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	setTimeout(() => {
		const etown = { lat: 10.8020047, lng: 106.6391917 };
		const hutech = { lat: 10.8020999, lng: 106.7124 };
		const lotteCongHoa = { lat: 10.806073, lng: 106.63872 };
		const map = new google.maps.Map(document.getElementById('map'), {
			center: etown,
			zoom: 14
		});
		const marker1 = new google.maps.Marker({ position: etown, map: map });
		const marker2 = new google.maps.Marker({ position: hutech, map: map });
		const marker3 = new google.maps.Marker({ position: lotteCongHoa, map: map });

		google.maps.event.addListener(marker1, 'click', function() {
			map.panTo(marker1.getPosition());
			infowindow.open(map, marker1);
		});

		google.maps.event.addListener(marker2, 'click', function() {
			map.panTo(marker2.getPosition());
			infowindow.open(map, marker2);
		});

		google.maps.event.addListener(marker3, 'click', function() {
			map.panTo(marker3.getPosition());
			infowindow.open(map, marker3);
		});

		document.getElementById('hutech').addEventListener('click', function() {
			map.panTo(marker2.getPosition());
			infowindow.open(map, marker2);
		});

		document.getElementById('lotteCongHoa').addEventListener('click', function() {
			map.panTo(marker3.getPosition());
			infowindow.open(map, marker3);
		});

		document.getElementById('etown').addEventListener('click', function() {
			map.panTo(marker1.getPosition());
			infowindow.open(map, marker1);
		});
	}, 1500);

})( jQuery );
