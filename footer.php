
  </div>
</div>


</body>
</html>
<script>
    $(document).ready(function(){
        var url = window.location.href;
        url = (url.substr(url.indexOf('project/') - 1));
        $('.nav-link[href="'+url+'"]').addClass('active');
    });
</script>