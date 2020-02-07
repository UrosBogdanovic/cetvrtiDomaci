<?php
  require_once __DIR__.'/../handler/knjigaHandler.php';
  require_once __DIR__.'/../handler/biblHandler.php';
?>

<script>
  // Filter za knjige
  $(document).ready(function(){
    $("#knjiga_filter").on("keyup", function() {
      let value = $(this).val().toLowerCase();
      $("#knjiga-table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  
  // AJAX Add
  $(function() {
    $('#add_knjiga_button').click(function(event) {
      event.preventDefault();
      let form = document.querySelector('#add_knjiga_form');
      if (form.reportValidity()) {
        let knjigaName = $('#knjiga_name_textfiled').val();
        let rmId = $('#bibl_select option:selected').val();
        $.ajax({
          type: 'POST',
          url: 'handler/knjigaHandler.php',
          data: {
            "add": knjigaName,
            "rmId": rmId
          },
          success: function() {
            $('#knjiga').load('components/knjiga.php');
          }
        });
      }
    });
  });

  // AJAX Delete
  $(function() {
    $('.delete-knjiga').click(function() {
      let knjigaId = $(this).parent().parent().data('id');
      $.ajax({
        url: 'handler/knjigaHandler.php',
        data: {
          "delete": knjigaId
        },
        type: 'POST',
        success: function() {
          $('#knjiga').load('components/knjiga.php');
        }
      });
    });
  });

  // AJAX On edit Click
  $(function() {
    $('.edit-knjiga').click(function() {
      let knjigaId = $(this).parent().parent().data('id');
      $.ajax({
        url: 'handler/knjigaHandler.php',
        data: {
          "edit": knjigaId
        },
        type: 'POST',
        dataType: "json",
        success: function(data) {
          console.log(data);
          console.log(data["name"]);
          $('#knjiga_name_textfiled').val(data["name"]);
          $('#add_knjiga_button').hide();
          $('#update_knjiga_button').show();
          $('#update_knjiga_button').attr('data-id', data["id"]);
        }
      });
    });
  });

  // AJAX Update
  $(function() {
    $('#update_knjiga_button').click(function(event) {
      event.preventDefault();
      let form = document.querySelector('#add_knjiga_form');
      if (form.reportValidity()) {
        let knjigaId = $(this).data('id');
        let knjigaName = $('#knjiga_name_textfiled').val();
        let rmId = $('#bibl_select option:selected').val();
        $.ajax({
          url: 'handler/knjigaHandler.php',
          data: {
            "update": knjigaId,
            "name": knjigaName,
            "rmId": rmId
          },
          type: 'POST',
          success: function() {
            $('#knjiga').load('components/knjiga.php');
          }
        });
      }
    });
  });
</script>

<h1 class="my-3">Knjiga</h1>
<input id="knjiga_filter" class="form-control" type="text" placeholder="Pretraži">
<table id="knjiga-table" class="table">
  <thead>
    <tr>
      <th>Naziv knjige</th>
      <th>Biblioteka</th>
      <th>Pokreni</th>
    </tr>
  </thead>
  <?php
    $allKnjiga = getAllKnjiga();
    foreach ($allKnjiga as $knjiga) : ?>
    <tr data-id="<?php echo $knjiga->getId(); ?>">
    <td>
      <?php echo $knjiga->getName(); ?>
    </td>
    <td>
    <?php echo $knjiga->getBiblName(); ?>
    </td>
    <td>
      <button class="btn btn-primary edit-knjiga">Izmeni</button>
      <button class="btn btn-danger delete-knjiga">Obriši</button>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

<form id="add_knjiga_form">
  <div class="form-inline">
    <input type="text" class="form-control m-2" name="knjigaName" id="knjiga_name_textfiled" 
    placeholder="Unesi naziv knjige" value="" required>
    <select id="bibl_select" class="custom-select m-2" required>
      <option disabled selected value="">Izaberi biblioteku</option>
      <?php
      $allBibl = vratiBibl();
      foreach ($allBibl as $bibl) : ?>
        <option value="<?php echo $bibl->getId(); ?>"><?php echo $bibl->getName(); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group m-2">
    <button type="submit" name="submit" id="add_knjiga_button" class="btn btn-success">Sačuvaj</button>
    <button type="submit" name="submit" id="update_knjiga_button" data-id="" 
            class="btn btn-primary" style="display: none;">Ažuriraj</button>
  </div>
</form>