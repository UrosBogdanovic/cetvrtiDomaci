<?php
  require_once __DIR__.'/../handler/biblHandler.php';
?>

<script>
  // AJAX Add
  $(function() {
    $('#add_bilb_button').click(function(event) {
      event.preventDefault();
      let form = document.querySelector('#add_bibl_form');
      if (form.reportValidity()) {
        let biblName = $('#bibl_name_textfiled').val();
        $.ajax({
          type: 'POST',
          url: 'handler/biblHandler.php',
          data: {
            "add": biblName
          },
          success: function() {
            $('#bibl').load('components/bibl.php');
            $('#knjiga').load('components/knjiga.php');
          }
        });
      }
    });
  });

 

  // AJAX On edit Click
  $(function() {
    $('.edit-rm').click(function() {
      let rmId = $(this).parent().parent().data('id');
      $.ajax({
        url: 'handler/biblHandler.php',
        data: {
          "edit": rmId
        },
        type: 'POST',
        dataType: "json",
        success: function(data) {
          $('#bibl_name_textfiled').val(data["name"]);
          $('#add_bibl_button').hide();
          $('#update_bibl_button').show();
          $('#update_bibl_button').attr('data-id', data["id"]);
        }
      });
    });
  });
  
  // AJAX Update
  $(function() {
    $('#update_bibl_button').click(function(event) {
      event.preventDefault();
      let form = document.querySelector('#add_bibl_form');
      if (form.reportValidity()) {
        let rmId = $(this).data('id');
        let biblName = $('#bibl_name_textfiled').val();
        $.ajax({
          url: 'handler/biblHandler.php',
          data: {
            "update": rmId, 
            "name": biblName
          },
          type: 'POST',
          success: function() {
            $('#bibl').load('components/rm.php');
            $('#knjiga').load('components/knjiga.php');
          }
        });
      }
    });
  });
</script>

<h1 class="my-3">Biblioteka</h1>
<table id="bibl-table" class="table">
  <thead>
    <tr>
      <th>Naziv biblioteke</th>
      <th>Pokreni</th>
    </tr>
  </thead>
  <?php
    $allBibl = vratiBibl();
    foreach ($allBibl as $bibl) : ?>
    <tr data-id="<?php echo $bibl->getId(); ?>">
    <td>
      <?php echo $bibl->getName(); ?>
    </td>
    <td>
      <button class="btn btn-primary edit-bibl">Izmeni</button>
     
    </td>
  </tr>
  <?php endforeach; ?>
</table>
 

<form id="add_bibl_form">
  <div class="form-inline">
    <input type="text" class="form-control m-2" name="biblName" id="bibl_name_textfiled" 
    placeholder="Dodaj biblioteku" value="" required>
  </div>
  <div class="form-group m-2">
    <button type="submit" name="submit" id="add_bibl_button" class="btn btn-success">Sačuvaj</button>
    <button type="submit" name="submit" id="update_bibl_button" data-id="" 
            class="btn btn-primary" style="display: none;">Ažuriraj</button>
  </div>
</form>

