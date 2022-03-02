<script src="{{ asset('frontend/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="{{ asset('frontend/js/vendor%2c_bootstrap.min.js%2bjquery.ajaxchimp.min.js%2bparallax.min.js.pagespeed.jc.m3TLRWKW3I.js')}}"></script>
<script>eval(mod_pagespeed_gInw0_vP6G);</script>
<script>eval(mod_pagespeed_f_YTSGg6Cp);</script>
<script>eval(mod_pagespeed_M3KJhta7zI);</script>
<script src="{{ asset('frontend/js/owl.carousel.min.js%2bjquery.magnific-popup.min.js%2bjquery.sticky.js%2bmain.js.pagespeed.jc.sBKppa8gIe.js')}}"></script>
<script>eval(mod_pagespeed_eUbFTV3_NE);</script>
<script>eval(mod_pagespeed_FzQleb9_H4);</script>
<script>eval(mod_pagespeed_OaikVJ4xOx);</script>
<script>eval(mod_pagespeed_KGfwTllkSA);</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date()); 

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"></script>
<script>(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="../../cdn-cgi/zaraz/sd0d9.html?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);
</script>
<script>

  $('.like').on('click',function(){
 
  var id=$(this).attr("data-id");

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
        type: 'POST',
        url: '{{ route("like-add") }}',       
        data: {id:id},      
        success: function (response) {
         
            //  toastr["success"]("Blog Post Successfully");
            // document.getElementById("formblog_data").reset();
            //  $('.blog_add_btn').html('Submit');
            //  $('.blog_add_btn').prop('disabled', false);

            location.reload();    
        },
        error: function (error) {
            // toastr["error"]("Oops! Something Went Wrong ! Try Again <i class=\"fa fa-frown-o\" aria-hidden=\"true\"></i>");
        }
    });
 })
 
</script>

