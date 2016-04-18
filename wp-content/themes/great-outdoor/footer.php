    <?php if( is_page() || is_singular() ){
        include('includes/brand-bar.php');
    } ?>
    <footer class="site-footer">
        <p>Copyright &copy; <?php echo date("Y"); ?>. All Rights Reserved.</p>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
