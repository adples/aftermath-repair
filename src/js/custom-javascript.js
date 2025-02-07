//modernizr-mq
!function(e,n,t){function o(e){var n=u.className,t=Modernizr._config.classPrefix||"";if(p&&(n=n.baseVal),Modernizr._config.enableJSClass){var o=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(o,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),p?u.className.baseVal=n:u.className=n)}function a(e,n){return typeof e===n}function s(){var e,n,t,o,s,i,r;for(var l in f)if(f.hasOwnProperty(l)){if(e=[],n=f[l],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(o=a(n.fn,"function")?n.fn():n.fn,s=0;s<e.length;s++)i=e[s],r=i.split("."),1===r.length?Modernizr[r[0]]=o:(!Modernizr[r[0]]||Modernizr[r[0]]instanceof Boolean||(Modernizr[r[0]]=new Boolean(Modernizr[r[0]])),Modernizr[r[0]][r[1]]=o),d.push((o?"":"no-")+r.join("-"))}}function i(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):p?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function r(){var e=n.body;return e||(e=i(p?"svg":"body"),e.fake=!0),e}function l(e,t,o,a){var s,l,d,f,c="modernizr",p=i("div"),m=r();if(parseInt(o,10))for(;o--;)d=i("div"),d.id=a?a[o]:c+(o+1),p.appendChild(d);return s=i("style"),s.type="text/css",s.id="s"+c,(m.fake?m:p).appendChild(s),m.appendChild(p),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(n.createTextNode(e)),p.id=c,m.fake&&(m.style.background="",m.style.overflow="hidden",f=u.style.overflow,u.style.overflow="hidden",u.appendChild(m)),l=t(p,e),m.fake?(m.parentNode.removeChild(m),u.style.overflow=f,u.offsetHeight):p.parentNode.removeChild(p),!!l}var d=[],f=[],c={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){f.push({name:e,fn:n,options:t})},addAsyncTest:function(e){f.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=c,Modernizr=new Modernizr;var u=n.documentElement,p="svg"===u.nodeName.toLowerCase(),m=function(){var n=e.matchMedia||e.msMatchMedia;return n?function(e){var t=n(e);return t&&t.matches||!1}:function(n){var t=!1;return l("@media "+n+" { #modernizr { position: absolute; } }",function(n){t="absolute"==(e.getComputedStyle?e.getComputedStyle(n,null):n.currentStyle).position}),t}}();c.mq=m,Modernizr.addTest("mediaqueries",m("only all")),s(),o(d),delete c.addTest,delete c.addAsyncTest;for(var h=0;h<Modernizr._q.length;h++)Modernizr._q[h]();e.Modernizr=Modernizr}(window,document);

jQuery(function( $ ) {
	$(window).scroll(function() {
		if ($(document).scrollTop() > 175) {
			$('.navbar-reveal').addClass('affix');
		} else {
			$('.navbar-reveal').removeClass('affix');
		}
	}).scroll();
});

jQuery(function( $ ) {
	$(window).resize(function(){
		if(Modernizr.mq('(min-width: 768px)')){
			if( $('.resize').length ) {
				$('.resize').each(function(){
					var x = $(this).attr('data-img-full');
					var y = 'url(' + x + ')';
					$(this).css('background-image', y);
				});
			}
		}
		else{
			if( $('.resize').length ) {
				$('.resize').each(function(){
					var x = $(this).attr('data-img-md');
					var y = 'url(' + x + ')';
					$(this).css('background-image', y);
				});
			}
		}
	}).resize();
});

jQuery(function( $ ) {
	if( $('.project-carousel').length ) {
		Fancybox.bind("[data-fancybox]");
	}
});

jQuery(function( $ ) {
	$('.collapse').on('hide.bs.collapse', function() {
  		$(this).parent().find('.fa').removeClass('fa-minus').addClass('fa-plus');
		$(this).parent().removeClass('active-panel');
	});
	
	$('.collapse').on('show.bs.collapse', function() {
		  $(this).parent().find('.fa').removeClass('fa-plus').addClass('fa-minus');
		  $(this).parent().addClass('active-panel');
	});
});


jQuery(function( $ ) {
	if(window.location.hash.startsWith("#tabs")){
		const hash = window.location.hash;
		$(hash).tab('show');
		$('html, body').animate({
		  scrollTop: $('#service-section').offset().top - 150
		}, 1000);
	}
});

