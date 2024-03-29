<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/materialize.min.js"></script>
<script src="../js/chart.min.js"></script>
<script src="../js/init.js"></script>
<script>
  $(document).ready(function() {
    $('.button-collapse').sideNav();
    $('.modal').modal();

    $('select').material_select();

    $('.datepicker').pickadate({
      format: 'dd/mm/yy'
    });

    $('.tooltipped').tooltip();
    $('.collapsible').collapsible();

    setTimeout(function(){
      $('#msgBox').hide();
    }, 5000);
  });
</script>
</body>
</html>
