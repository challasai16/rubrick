!function(e,t,n){"use strict";function i(e,t,n){var i,s;return t||(t=250),function(){var a=n||this,r=Date.now(),o=arguments;i&&r<i+t?(clearTimeout(s),s=setTimeout(function(){i=r,e.apply(a,o)},t)):(i=r,e.apply(a,o))}}function s(e){return RegExp("(^|\\s+)"+e+"(\\s+|$)")}function a(e,n){this.selector=t.querySelector(e),this.options=function e(t,n){for(var i in n)n.hasOwnProperty(i)&&(t[i]=n[i]);return t}(this.defaults,n),this.init()}a.prototype={defaults:{delay:300,sensitivity:20},init:function(n){var a,r=this.options,n=this.selector,o=0;function c(){return a=e.innerHeight}n&&(c(),e.addEventListener("resize",i(c),!1),e.addEventListener("scroll",i(function i(){var c,l=e.pageYOffset,f=t.body.scrollHeight,u=l>r.delay,d=l>o,h=l<o-r.sensitivity,p=l<0||l+a>=f;if(u&&d){var y,v,$,m="sticky-header animated fadeInDown";$=n,y=$,!s(v=m).test(y.className)&&($.className=$.className+" "+m)}else if(!d&&h&&!p||!u){(c=n).className=c.className.replace(s("sticky-header animated fadeInDown")," ")}o=l},100),!1))}},e.headsUp=a}(window,document),new headsUp(".nav-area");