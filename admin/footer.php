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

    setTimeout(function(){
      $('#msgBox').hide();
    }, 5000);

    $('#search').on('keyup', function() {
        var value = $(this).val();
        var patt = new RegExp(value, "i");
          $('#myTable').find('tr').each(function() {
            if (!($(this).find('td').text().search(patt) >= 0)) {
              $(this).not('.myHead').hide();
            }
            if (($(this).find('td').text().search(patt) >= 0)) {
              $(this).show();
            }
          });
        });
  });
</script>
</body>
</html>
