(function ($) {
// vertical align (parent relative)
$.fn.vAlign = function() {
	return this.each(function(i) {
		var ah = $(this).height();
		var ph = $(this).parent().height();
		var mh = Math.ceil((ph-ah) / 2);
		$(this).css('margin-top', mh);
	});
};
// vertical align (window relative)
$.fn.vAlignWin = function() {
	return this.each(function(i) {
		var ah = $(this).height();
		var ph = $(window).height();
		var mh = (ph - ah) / 2;
		if(mh>0) {
		  $(this).css('margin-top', mh);
		} else {
		  $(this).css('margin-top', 0);
		}
	});
};
})(jQuery);