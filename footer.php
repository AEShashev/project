
  </div>
</div>


</body>
<footer>
<p>My Best Trade © 2019</p> 
</footer>

</html>
<script>
    $(document).ready(function(){
        var url = window.location.href;
        url = (url.substr(url.indexOf('project/') - 1));
        $('.nav-link[href="'+url+'"]').addClass('active');
    });
</script>
