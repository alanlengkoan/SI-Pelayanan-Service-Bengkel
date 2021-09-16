    </div>
    </section>

    <script src="../../assets/admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="../../assets/admin/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="../../assets/admin/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="../../assets/admin/vendor/select2/select2.js"></script>

    <!-- begin:: datatable -->
    <script src="../../assets/admin/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="../../assets/admin/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="../../assets/admin/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
    <!-- end:: datatable -->

    <script src="../../assets/admin/javascripts/theme.js"></script>
    <script src="../../assets/admin/javascripts/theme.custom.js"></script>
    <script src="../../assets/admin/javascripts/theme.init.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
    $content = (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_REQUEST['content'])) ? str_replace('-', '_', $_REQUEST['content']) : $_REQUEST['content'];
    if (file_exists('js/' . $content . '.php')) {
        switch ($content) {
            case $content:
                include_once 'js/' . str_replace('-', '_', $content) . '.php';
                break;
        }
    }
    ?>

    </body>

    </html>