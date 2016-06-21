    <?php if( is_page() || is_singular() ){
        include('includes/brand-bar.php');
    } ?>
    <footer class="site-footer">
        <a href="http://facebook.com/TrustyGOPC" target="_blank"><img src="/wp-content/uploads/2016/06/Facebook-Square.png" class="social"  width="50px" height="50px"/></a>
        <a href="http://twitter.com/TrustyGOPC" target="_blank"><img src="/wp-content/uploads/2016/06/Twitter-square.png" class="social" width="50px" height="50px"/></a>
        <a href="http://flickr.com/photos/mulepics" target="_blank"><img src="/wp-content/uploads/2016/06/Flickr-square.png" class="social" width="50px" height="50px"/></a>
        <a href="http://www.youtube.com/gopc" target="_blank"><img src="/wp-content/uploads/2016/06/Youtube-square.png" class="social" width="50px" height="50px"/></a>
        <a href="http://instagram.com/trustygopc" target="_blank"><img src="/wp-content/uploads/2016/06/Instagram-square.png" class="social" width="50px" height="50px"/></a>
        <a href="http://pinterest.com/TrustyGOPC/" target="_blank"><img src="/wp-content/uploads/2016/06/Pinterest-square.png" class="social" width="50px" height="50px"/></a>

        <p>Copyright &copy; <?php echo date("Y"); ?>. All Rights Reserved.</p>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
