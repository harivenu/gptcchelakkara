!function(a){var i={};function n(e){if(i[e])return i[e].exports;var t=i[e]={i:e,l:!1,exports:{}};return a[e].call(t.exports,t,t.exports,n),t.l=!0,t.exports}n.m=a,n.c=i,n.d=function(e,t,a){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var a=Object.create(null);if(n.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)n.d(a,i,function(e){return t[e]}.bind(null,i));return a},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=1)}([function(e,t,a){},function(e,t,a){"use strict";a.r(t);a(0);function i(e,t){for(var a=0;a<t.length;a++){var i=t[a];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var n=function(){function a(e,t){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,a),this.params=e,this.callbackLoaded=t,this.loaded=!1,this.buildDOM()}return function(e,t,a){t&&i(e.prototype,t),a&&i(e,a)}(a,[{key:"getDOM",value:function(){return this.imageDOM}},{key:"getDimensions",value:function(){return this.isLoaded?{width:this.image.naturalWidth,height:this.image.naturalHeight,ratio:this.image.naturalWidth/this.image.naturalHeight}:{width:0,height:0,ratio:1}}},{key:"update",value:function(e,t){!0===(1<arguments.length&&void 0!==t&&t)?this.imageDOM.classList.add("transition"):this.imageDOM.classList.remove("transition"),"horizontal"===this.params.mode?this.imageDOM.style.width="".concat(e,"%"):this.imageDOM.style.height="".concat(e,"%")}},{key:"buildDOM",value:function(){var e=this;if(this.imageDOM=document.createElement("div"),this.imageDOM.className="h5p-image-juxtaposition-image h5p-image-juxtaposition-".concat(this.params.position),this.imageDOM.setAttribute("draggable","false"),this.image=new Image,this.image.onload=function(){e.image.setAttribute("width",""),e.image.setAttribute("height",""),e.isLoaded=!0,e.callbackLoaded()},this.image.src=this.params.image.src,this.image.alt=this.params.image.alt||"",this.image.title=this.params.image.title||"",this.label=this.params.label||!1,this.image.setAttribute("draggable","false"),this.image.setAttribute("unselectable","on"),this.image.setAttribute("onselectstart","return false;"),this.imageDOM.appendChild(this.image),this.params.label&&""!==this.params.label){var t=document.createElement("div");t.className="h5p-image-juxtaposition-label",t.setAttribute("unselectable","on"),t.setAttribute("onselectstart","return false;"),t.setAttribute("onmousedown","return false;"),t.setAttribute("aria-hidden","true"),t.innerHTML=this.params.label,this.imageDOM.appendChild(t)}}}]),a}();function r(e,t){for(var a=0;a<t.length;a++){var i=t[a];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var o=function(){function o(e,t){var i=this;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,o),this.params=e,this.callbackUpdate=t,this.controller=document.createElement("div"),this.controller.className="h5p-image-juxtaposition-controller",this.controller.style.backgroundColor=this.params.color,this.controller.setAttribute("draggable","false"),this.controller.setAttribute("tabindex",0),this.controller.setAttribute("role","slider"),this.controller.setAttribute("aria-valuemin",0),this.controller.setAttribute("aria-valuemax",100),this.controller.setAttribute("aria-orientation",this.params.mode);var a=document.createElement("div");a.className="h5p-image-juxtaposition-control",a.style.backgroundColor=this.params.color,a.setAttribute("draggable","false"),a.appendChild(this.controller);var n=document.createElement("div");n.className="h5p-image-juxtaposition-arrow h5p-image-juxtaposition-left",n.style.borderColor="horizontal"===this.params.mode?"transparent ".concat(this.params.color," transparent transparent"):"transparent transparent ".concat(this.params.color," transparent"),n.setAttribute("draggable","false");var r=document.createElement("div");r.className="h5p-image-juxtaposition-arrow h5p-image-juxtaposition-right",r.style.borderColor="horizontal"===this.params.mode?"transparent transparent transparent ".concat(this.params.color):"".concat(this.params.color," transparent transparent transparent"),r.setAttribute("draggable","false"),this.handle=document.createElement("div"),this.handle.className="h5p-image-juxtaposition-handle",this.handle.setAttribute("draggable","false"),this.handle.appendChild(n),this.handle.appendChild(a),this.handle.appendChild(r),this.handle.addEventListener("keydown",function(e){var t=(e=e||window.event).which||e.keyCode,a=parseFloat(i.handle.style.left||i.handle.style.top);switch(t){case 35:e.preventDefault(),i.callbackUpdate(100);break;case 36:e.preventDefault(),i.callbackUpdate(0);break;case 37:case 38:e.preventDefault(),i.callbackUpdate(Math.max(0,a-1));break;case 39:case 40:e.preventDefault(),i.callbackUpdate(Math.min(100,a+1))}})}return function(e,t,a){t&&r(e.prototype,t),a&&r(e,a)}(o,[{key:"getDOM",value:function(){return this.handle}},{key:"update",value:function(e,t){!0===(1<arguments.length&&void 0!==t&&t)?this.handle.classList.add("transition"):this.handle.classList.remove("transition"),"horizontal"===this.params.mode?this.handle.style.left="".concat(e,"%"):this.handle.style.top="".concat(e,"%");var a=50<parseInt(e,10)?this.params.ariaValueTextAfter:this.params.ariaValueTextBefore;this.controller.setAttribute("aria-valuetext",a)}}]),o}();function s(e,t){for(var a=0;a<t.length;a++){var i=t[a];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var l=function(){function a(e,t){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,a),this.params=e,this.callbackLoaded=t,this.isSliding=!1,this.imagesLoaded=0,this.buildDOM()}return function(e,t,a){t&&s(e.prototype,t),a&&s(e,a)}(a,[{key:"buildDOM",value:function(){var t=this;this.slider=document.createElement("div"),this.slider.className="h5p-image-juxtaposition-slider",this.slider.classList.add("h5p-image-juxtaposition-"+this.params.mode),this.slider.setAttribute("draggable","false"),this.params.container.appendChild(this.slider),this.firstImage=new n({image:this.params.images[0],label:this.params.images[0].label,mode:this.params.mode,position:"left"},function(){t.imagesLoaded++,t.handleImageLoaded()}),this.slider.appendChild(this.firstImage.getDOM()),this.secondImage=new n({image:this.params.images[1],label:this.params.images[1].label,mode:this.params.mode,position:"right"},function(){t.imagesLoaded++,t.handleImageLoaded()}),this.slider.appendChild(this.secondImage.getDOM()),this.handle=new o({ariaValueTextAfter:this.buildAriaValueText(this.params.images[1].label,this.params.images[1].alt),ariaValueTextBefore:this.buildAriaValueText(this.params.images[0].label,this.params.images[0].alt),color:this.params.color,mode:this.params.mode},function(e){t.update(e)}),this.slider.appendChild(this.handle.getDOM())}},{key:"update",value:function(e,t){var a=1<arguments.length&&void 0!==t&&t,i=this.extractPosition(e).toFixed(2),n=100-i;i<0||100<i||n<0||100<n||(this.firstImage.update(i,a),this.secondImage.update(n,a),this.handle.update(i,a))}},{key:"resize",value:function(e){var t,a,i=0;a=e?(this.imageRatio<=e.width/e.height?(a=(t=e.height)*this.imageRatio,i=(e.width-a)/2):t=(a=e.width)/this.imageRatio,"".concat(a,"px")):(t=(a=window.innerWidth-2)/this.imageRatio,"100%"),this.params.container&&(this.params.container.style.width=a,this.params.container.style.height="".concat(t,"px"),this.params.container.style.paddingLeft="".concat(i,"px"))}},{key:"handleImageLoaded",value:function(){if(!(this.imagesLoaded<2)){var e=[this.firstImage.getDimensions(),this.secondImage.getDimensions()];e[0].ratio!==e[1].ratio&&console.warn("Make sure that both images have the same aspect ratio."),this.imageRatio=e[0].ratio,this.params.container.style.width=e[0].width,this.addEventListeners(),this.update(this.params.startingPosition,!1),this.callbackLoaded()}}},{key:"buildAriaValueText",value:function(e,t){var a=0<arguments.length&&void 0!==e?e:"",i=1<arguments.length&&void 0!==t?t:"";return""===a?i:"".concat(a,". ").concat(i)}},{key:"extractPosition",value:function(e){if("string"==typeof e||"number"==typeof e)return parseInt(e,10);var t=this.slider.getBoundingClientRect(),a={top:t.top+document.body.scrollTop,left:t.left+document.body.scrollLeft},i="horizontal"===this.params.mode?this.slider.offsetWidth:this.slider.offsetHeight;return(("horizontal"===this.params.mode?this.getPageX(e):this.getPageY(e))-("horizontal"===this.params.mode?a.left:a.top))/i*100}},{key:"getPageX",value:function(e){return e.pageX?e.pageX:e.touches?e.touches[0].pageX:e.clientX+document.body.scrollLeft+document.documentElement.scrollLeft}},{key:"getPageY",value:function(e){return e.pageY?e.pageY:e.touches?e.touches[0].pageY:e.clientY+document.body.scrollTop+document.documentElement.scrollTop}},{key:"addEventListeners",value:function(){var t=this;this.slider.addEventListener("mousedown",function(e){e=e||window.event,t.update(e,!0),t.isSliding=!0}),window.addEventListener("mousemove",function(e){(e=e||window.event).preventDefault(),!0===t.isSliding&&t.update(e,!1)}),this.slider.addEventListener("touchstart",function(e){(e=e||window.event).preventDefault(),e.stopPropagation(),t.update(e,!0)}),this.slider.addEventListener("touchmove",function(e){(e=e||window.event).preventDefault(),e.stopPropagation(),t.update(e,!1)}),window.addEventListener("mouseup",function(e){(e=e||window.event).preventDefault(),e.stopPropagation(),t.isSliding=!1})}}]),a}();function c(e,t){for(var a=0;a<t.length;a++){var i=t[a];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var d=function(){function r(e){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,r),this.classNameBase=e,this.container=document.createElement("div"),this.container.classList.add("".concat(this.classNameBase,"-container")),this.spinnerElement=document.createElement("div"),this.spinnerElement.classList.add(e);var t=document.createElement("div");t.classList.add("".concat(this.classNameBase,"-circle-head")),this.spinnerElement.appendChild(t);var a=document.createElement("div");a.classList.add("".concat(this.classNameBase,"-circle-neck-upper")),this.spinnerElement.appendChild(a);var i=document.createElement("div");i.classList.add("".concat(this.classNameBase,"-circle-neck-lower")),this.spinnerElement.appendChild(i);var n=document.createElement("div");n.classList.add("".concat(this.classNameBase,"-circle-body")),this.spinnerElement.appendChild(n),this.container.appendChild(this.spinnerElement)}return function(e,t,a){t&&c(e.prototype,t),a&&c(e,a)}(r,[{key:"getDOM",value:function(){return this.container}},{key:"show",value:function(){this.container.classList.remove("".concat(this.classNameBase,"-none"))}},{key:"hide",value:function(){this.container.classList.add("".concat(this.classNameBase,"-none"))}}]),r}();function u(e){return(u="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function h(e,t){for(var a=0;a<t.length;a++){var i=t[a];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var m=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e)}return function(e,t,a){t&&h(e.prototype,t),a&&h(e,a)}(e,null,[{key:"extend",value:function(e){for(var t=1;t<arguments.length;t++)for(var a in arguments[t])arguments[t].hasOwnProperty(a)&&("object"===u(e[a])&&"object"===u(arguments[t][a])?this.extend(e[a],arguments[t][a]):e[a]=arguments[t][a]);return e}}]),e}();function p(e){return(p="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function f(e,t){return!t||"object"!==p(t)&&"function"!=typeof t?function(e){if(void 0!==e)return e;throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}(e):t}function g(e){return(g=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function b(e,t){return(b=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}var v=function(){function i(e,t,a){var n;return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,i),(n=f(this,g(i).call(this,"image-juxtaposition"))).params=m.extend({title:"",imageBefore:{imageBefore:void 0,labelBefore:""},imageAfter:{imageAfter:void 0,labelAfter:""},behavior:{startingPosition:50,sliderOrientation:"horizontal",sliderColor:"#f3f3f3"}},e),n.contentId=t,n.contentData=a,Element.prototype.matches||(Element.prototype.matches=Element.prototype.msMatchesSelector||Element.prototype.webkitMatchesSelector),Element.prototype.closest||(Element.prototype.closest=function(e){var t=this;do{if(t.matches(e))return t;t=t.parentElement||t.parentNode}while(null!==t&&1===t.nodeType);return null}),n.on("exitFullScreen",function(){n.trigger("resize")}),n.registerDomElements=function(){var t=document.createElement("div");if(t.classList.add("h5p-image-juxtaposition-container"),n.spinner=new d("h5p-image-juxtaposition-spinner"),t.appendChild(n.spinner.getDOM()),n.params.title&&(n.title=document.createElement("div"),n.title.classList.add("h5p-image-juxtaposition-title"),n.title.classList.add("h5p-image-juxtaposition-title-none"),n.title.innerHTML=n.params.title,t.appendChild(n.title)),void 0===n.params.imageBefore.imageBefore||void 0===n.params.imageAfter.imageAfter){var e=document.createElement("div");e.classList.add("h5p-image-juxtaposition-missing-images"),e.innerHTML="I really need two background images :)",t.appendChild(e)}else{var a=document.createElement("div");a.classList.add("h5p-image-juxtaposition-juxtapose"),t.appendChild(a);var i=new l({container:a,images:[{src:H5P.getPath(n.params.imageBefore.imageBefore.params.file.path,n.contentId),alt:n.params.imageBefore.imageBefore.params.alt,title:n.params.imageBefore.imageBefore.params.title,label:n.params.imageBefore.labelBefore},{src:H5P.getPath(n.params.imageAfter.imageAfter.params.file.path,n.contentId),alt:n.params.imageAfter.imageAfter.params.alt,title:n.params.imageAfter.imageAfter.params.title,label:n.params.imageAfter.labelAfter}],startingPosition:n.params.behavior.startingPosition+"%",mode:n.params.behavior.sliderOrientation,color:n.params.behavior.sliderColor},function(){n.handleLoaded()});n.on("resize",function(){n.containerH5P=t.closest(".h5p-image-juxtaposition");var e=n.containerH5P.classList.contains("h5p-fullscreen")||n.containerH5P.classList.contains("h5p-semi-fullscreen")?{height:window.innerHeight-n.titleHeight,width:window.innerWidth}:void 0;i.resize(e)})}n.setContent(t)},n.handleLoaded=function(){n.spinner.hide(),n.title?(n.title.classList.remove("h5p-image-juxtaposition-title-none"),setTimeout(function(){var e=window.getComputedStyle(n.title),t=parseFloat(e.marginTop)+parseFloat(e.marginBottom);n.titleHeight=Math.ceil(n.title.offsetHeight+t)},0)):n.titleHeight=0,n.trigger("resize")},n.getTitle=function(){var e;return n.contentData&&n.contentData.metadata&&(e=n.contentData.metadata.title),e=e||i.DEFAULT_DESCRIPTION,H5P.createTitle(e)},n}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&b(e,t)}(i,H5P.Question),i}();v.DEFAULT_DESCRIPTION="Image Juxtaposition";var y=v;H5P=H5P||{},H5P.ImageJuxtaposition=y}]);