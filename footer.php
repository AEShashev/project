
  </div>
</div>


</body>
<style>
    footer p{
        float: right;
        margin-right: 15px;
    }
</style>
<footer>
    <p>My Best Trade © 2019</p> 
    <p>Телефон психологической поддержки: 880005553535</p>
</footer>

</html>
<script>
    $(document).ready(function(){
        var url = window.location.href;
        url = (url.substr(url.indexOf('project/') - 1));
        $('.nav-link[href="'+url+'"]').addClass('active');
    });
</script>
