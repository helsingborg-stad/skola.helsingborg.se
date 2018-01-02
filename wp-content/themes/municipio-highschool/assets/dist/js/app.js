var MunicipioHighSchool;

MunicipioHighSchool = MunicipioHighSchool || {};
MunicipioHighSchool.ExampleNamespace = MunicipioHighSchool.Liquid || {};

MunicipioHighSchool.ExampleNamespace.ExampleClass = (function ($) {

	var classVariable = false;

    /**
     * Constructor
     * Should be named as the class itself
     */
	function ExampleClass() {

    }

    /**
     * Method
     */
    ExampleClass.prototype.exampleMethod = function () {

    };

	return new ExampleClass();

})(jQuery);

//
// @name Local link
// @description  Finds link items with outbound links and gives them outbound class
//
MunicipioHighSchool = MunicipioHighSchool || {};
MunicipioHighSchool.Helper = MunicipioHighSchool.Helper || {};

MunicipioHighSchool.Helper.StickyScroll = (function ($) {

    var _stickyElements = [];
    var _isFloatingClass = 'sticky';

    function StickyScroll() {
        $(document).ready(function () {
            this.init();
        }.bind(this));
    }

    StickyScroll.prototype.init = function() {
        var $elements = $('.navbar-sticky');

        $elements.each(function (index, element) {
            var $element = $(element);

            _stickyElements.push({
                element: $element,
                offsetTop: $element.offset().top
            });
        });

        $(window).on('scroll', function () {
            this.scrolling();
        }.bind(this));

        this.scrolling();
    };


    /**
     * Runs when scrolling
     * @return {void}
     */
    StickyScroll.prototype.scrolling = function() {
        var scrollOffset = $(window).scrollTop();
        var navBarHeight = $('#site-header').outerHeight();
        var foldHeight;

        if ($('#site-header + .hero').length > 0) {
            foldHeight = $('#site-header + .hero').outerHeight();
        } else {
            foldHeight = $('#site-header').outerHeight();
        }

        $.each(_stickyElements, function (index, item) {

            if (scrollOffset > (foldHeight)) {

                return this.stick(item.element);
            }

            return this.unstick(item.element);
        }.bind(this));
    };

    /**
     * Makes a element sticky
     * @param  {object} $element jQuery element
     * @return {bool}
     */
    StickyScroll.prototype.stick = function($element) {
        if ($element.hasClass(_isFloatingClass)) {
            return;
        }

        if (!$element.hasClass('navbar-transparent')) {
            this.addAnchor($element);
        }

        $element.addClass(_isFloatingClass);
        return true;
    };

    /**
     * Makes a element non-sticky
     * @param  {object} $element jQuery element
     * @return {bool}
     */
    StickyScroll.prototype.unstick = function($element) {
        if (!$element.hasClass(_isFloatingClass)) {
            return;
        }

        if (!$element.hasClass('navbar-transparent')) {
            this.removeAnchor($element);
        }

        $element.removeClass(_isFloatingClass);
        return true;
    };

    StickyScroll.prototype.addAnchor = function($element) {
        $('<div class="sticky-scroll-anchor"></div>').height($element.outerHeight()).insertBefore($element);
        return true;
    };

    StickyScroll.prototype.removeAnchor = function($element) {
        $element.prev('.sticky-scroll-anchor').remove();
        return true;
    };

    return new StickyScroll();

})(jQuery);

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsImV4YW1wbGVDbGFzcy5qcyIsIm5hdmJhci1zdGlja3kuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQ0RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUN6QkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbInZhciBNdW5pY2lwaW9IaWdoU2Nob29sO1xuIiwiTXVuaWNpcGlvSGlnaFNjaG9vbCA9IE11bmljaXBpb0hpZ2hTY2hvb2wgfHwge307XG5NdW5pY2lwaW9IaWdoU2Nob29sLkV4YW1wbGVOYW1lc3BhY2UgPSBNdW5pY2lwaW9IaWdoU2Nob29sLkxpcXVpZCB8fCB7fTtcblxuTXVuaWNpcGlvSGlnaFNjaG9vbC5FeGFtcGxlTmFtZXNwYWNlLkV4YW1wbGVDbGFzcyA9IChmdW5jdGlvbiAoJCkge1xuXG5cdHZhciBjbGFzc1ZhcmlhYmxlID0gZmFsc2U7XG5cbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvclxuICAgICAqIFNob3VsZCBiZSBuYW1lZCBhcyB0aGUgY2xhc3MgaXRzZWxmXG4gICAgICovXG5cdGZ1bmN0aW9uIEV4YW1wbGVDbGFzcygpIHtcblxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIE1ldGhvZFxuICAgICAqL1xuICAgIEV4YW1wbGVDbGFzcy5wcm90b3R5cGUuZXhhbXBsZU1ldGhvZCA9IGZ1bmN0aW9uICgpIHtcblxuICAgIH07XG5cblx0cmV0dXJuIG5ldyBFeGFtcGxlQ2xhc3MoKTtcblxufSkoalF1ZXJ5KTtcbiIsIi8vXG4vLyBAbmFtZSBMb2NhbCBsaW5rXG4vLyBAZGVzY3JpcHRpb24gIEZpbmRzIGxpbmsgaXRlbXMgd2l0aCBvdXRib3VuZCBsaW5rcyBhbmQgZ2l2ZXMgdGhlbSBvdXRib3VuZCBjbGFzc1xuLy9cbk11bmljaXBpb0hpZ2hTY2hvb2wgPSBNdW5pY2lwaW9IaWdoU2Nob29sIHx8IHt9O1xuTXVuaWNpcGlvSGlnaFNjaG9vbC5IZWxwZXIgPSBNdW5pY2lwaW9IaWdoU2Nob29sLkhlbHBlciB8fCB7fTtcblxuTXVuaWNpcGlvSGlnaFNjaG9vbC5IZWxwZXIuU3RpY2t5U2Nyb2xsID0gKGZ1bmN0aW9uICgkKSB7XG5cbiAgICB2YXIgX3N0aWNreUVsZW1lbnRzID0gW107XG4gICAgdmFyIF9pc0Zsb2F0aW5nQ2xhc3MgPSAnc3RpY2t5JztcblxuICAgIGZ1bmN0aW9uIFN0aWNreVNjcm9sbCgpIHtcbiAgICAgICAgJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgdGhpcy5pbml0KCk7XG4gICAgICAgIH0uYmluZCh0aGlzKSk7XG4gICAgfVxuXG4gICAgU3RpY2t5U2Nyb2xsLnByb3RvdHlwZS5pbml0ID0gZnVuY3Rpb24oKSB7XG4gICAgICAgIHZhciAkZWxlbWVudHMgPSAkKCcubmF2YmFyLXN0aWNreScpO1xuXG4gICAgICAgICRlbGVtZW50cy5lYWNoKGZ1bmN0aW9uIChpbmRleCwgZWxlbWVudCkge1xuICAgICAgICAgICAgdmFyICRlbGVtZW50ID0gJChlbGVtZW50KTtcblxuICAgICAgICAgICAgX3N0aWNreUVsZW1lbnRzLnB1c2goe1xuICAgICAgICAgICAgICAgIGVsZW1lbnQ6ICRlbGVtZW50LFxuICAgICAgICAgICAgICAgIG9mZnNldFRvcDogJGVsZW1lbnQub2Zmc2V0KCkudG9wXG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICB0aGlzLnNjcm9sbGluZygpO1xuICAgICAgICB9LmJpbmQodGhpcykpO1xuXG4gICAgICAgIHRoaXMuc2Nyb2xsaW5nKCk7XG4gICAgfTtcblxuXG4gICAgLyoqXG4gICAgICogUnVucyB3aGVuIHNjcm9sbGluZ1xuICAgICAqIEByZXR1cm4ge3ZvaWR9XG4gICAgICovXG4gICAgU3RpY2t5U2Nyb2xsLnByb3RvdHlwZS5zY3JvbGxpbmcgPSBmdW5jdGlvbigpIHtcbiAgICAgICAgdmFyIHNjcm9sbE9mZnNldCA9ICQod2luZG93KS5zY3JvbGxUb3AoKTtcbiAgICAgICAgdmFyIG5hdkJhckhlaWdodCA9ICQoJyNzaXRlLWhlYWRlcicpLm91dGVySGVpZ2h0KCk7XG4gICAgICAgIHZhciBmb2xkSGVpZ2h0O1xuXG4gICAgICAgIGlmICgkKCcjc2l0ZS1oZWFkZXIgKyAuaGVybycpLmxlbmd0aCA+IDApIHtcbiAgICAgICAgICAgIGZvbGRIZWlnaHQgPSAkKCcjc2l0ZS1oZWFkZXIgKyAuaGVybycpLm91dGVySGVpZ2h0KCk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBmb2xkSGVpZ2h0ID0gJCgnI3NpdGUtaGVhZGVyJykub3V0ZXJIZWlnaHQoKTtcbiAgICAgICAgfVxuXG4gICAgICAgICQuZWFjaChfc3RpY2t5RWxlbWVudHMsIGZ1bmN0aW9uIChpbmRleCwgaXRlbSkge1xuXG4gICAgICAgICAgICBpZiAoc2Nyb2xsT2Zmc2V0ID4gKGZvbGRIZWlnaHQpKSB7XG5cbiAgICAgICAgICAgICAgICByZXR1cm4gdGhpcy5zdGljayhpdGVtLmVsZW1lbnQpO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICByZXR1cm4gdGhpcy51bnN0aWNrKGl0ZW0uZWxlbWVudCk7XG4gICAgICAgIH0uYmluZCh0aGlzKSk7XG4gICAgfTtcblxuICAgIC8qKlxuICAgICAqIE1ha2VzIGEgZWxlbWVudCBzdGlja3lcbiAgICAgKiBAcGFyYW0gIHtvYmplY3R9ICRlbGVtZW50IGpRdWVyeSBlbGVtZW50XG4gICAgICogQHJldHVybiB7Ym9vbH1cbiAgICAgKi9cbiAgICBTdGlja3lTY3JvbGwucHJvdG90eXBlLnN0aWNrID0gZnVuY3Rpb24oJGVsZW1lbnQpIHtcbiAgICAgICAgaWYgKCRlbGVtZW50Lmhhc0NsYXNzKF9pc0Zsb2F0aW5nQ2xhc3MpKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICBpZiAoISRlbGVtZW50Lmhhc0NsYXNzKCduYXZiYXItdHJhbnNwYXJlbnQnKSkge1xuICAgICAgICAgICAgdGhpcy5hZGRBbmNob3IoJGVsZW1lbnQpO1xuICAgICAgICB9XG5cbiAgICAgICAgJGVsZW1lbnQuYWRkQ2xhc3MoX2lzRmxvYXRpbmdDbGFzcyk7XG4gICAgICAgIHJldHVybiB0cnVlO1xuICAgIH07XG5cbiAgICAvKipcbiAgICAgKiBNYWtlcyBhIGVsZW1lbnQgbm9uLXN0aWNreVxuICAgICAqIEBwYXJhbSAge29iamVjdH0gJGVsZW1lbnQgalF1ZXJ5IGVsZW1lbnRcbiAgICAgKiBAcmV0dXJuIHtib29sfVxuICAgICAqL1xuICAgIFN0aWNreVNjcm9sbC5wcm90b3R5cGUudW5zdGljayA9IGZ1bmN0aW9uKCRlbGVtZW50KSB7XG4gICAgICAgIGlmICghJGVsZW1lbnQuaGFzQ2xhc3MoX2lzRmxvYXRpbmdDbGFzcykpIHtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuXG4gICAgICAgIGlmICghJGVsZW1lbnQuaGFzQ2xhc3MoJ25hdmJhci10cmFuc3BhcmVudCcpKSB7XG4gICAgICAgICAgICB0aGlzLnJlbW92ZUFuY2hvcigkZWxlbWVudCk7XG4gICAgICAgIH1cblxuICAgICAgICAkZWxlbWVudC5yZW1vdmVDbGFzcyhfaXNGbG9hdGluZ0NsYXNzKTtcbiAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgfTtcblxuICAgIFN0aWNreVNjcm9sbC5wcm90b3R5cGUuYWRkQW5jaG9yID0gZnVuY3Rpb24oJGVsZW1lbnQpIHtcbiAgICAgICAgJCgnPGRpdiBjbGFzcz1cInN0aWNreS1zY3JvbGwtYW5jaG9yXCI+PC9kaXY+JykuaGVpZ2h0KCRlbGVtZW50Lm91dGVySGVpZ2h0KCkpLmluc2VydEJlZm9yZSgkZWxlbWVudCk7XG4gICAgICAgIHJldHVybiB0cnVlO1xuICAgIH07XG5cbiAgICBTdGlja3lTY3JvbGwucHJvdG90eXBlLnJlbW92ZUFuY2hvciA9IGZ1bmN0aW9uKCRlbGVtZW50KSB7XG4gICAgICAgICRlbGVtZW50LnByZXYoJy5zdGlja3ktc2Nyb2xsLWFuY2hvcicpLnJlbW92ZSgpO1xuICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9O1xuXG4gICAgcmV0dXJuIG5ldyBTdGlja3lTY3JvbGwoKTtcblxufSkoalF1ZXJ5KTtcbiJdfQ==
