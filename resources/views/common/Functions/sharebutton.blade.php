<div class="social box">
    <h3>@lang('static.actions.shareThis') :</h3>&nbsp;

    <a class="facebook"
        onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]={{ $title }}&amp;p[url]={{ url()->current() }}&amp;&p[images][0]={{ $image }}', 'sharer', 'toolbar=0,status=0,width=700,height=500');"
        target="_blank" href="javascript: void(0)"><i class="fab fa-2x fa-facebook-square"></i></a>&nbsp;
    <a class="twitter"
        href="https://twitter.com/intent/tweet?url={{ url()->current() }}&image={{ $image }}&title={{ $title }}"
        target="_blank" ><i class="fab fa-2x fa-twitter-square"></i></a>&nbsp;
    <a class="whatsapp"
        target="_blank"
        href="https://api.whatsapp.com/send?phone={{ settings('phoneNumb') }}&text={{ $title }}%20{{ url()->current() }}">
        <i class="fab fa-2x fa-whatsapp"></i></a>&nbsp;
    <a class="linkedin"
        target="_blank"
        href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}"
        ><i class="fab fa-2x fa-linkedin"></i></a>&nbsp;
</div>
