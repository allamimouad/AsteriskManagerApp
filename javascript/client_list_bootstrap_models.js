

$('#modifiyClient').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var client = button.data('client')
  var name = $( '#name'+client ).html();
  var password = $( '#password'+client ).html();
  var transport = $( '#transport'+client ).html();

  var modal = $(this)

  
  modal.find('.modal-title').text('client : ' + name);
  modal.find('#name').prop('value',name);
  modal.find('#password').prop('value',password);
  modal.find('#hiddenid').prop('value',name);
  //modal.find('#name').val(name);
  //modal.find('#password').val(password);

  modal.find('#inlineRadio2').removeAttr('checked');
  modal.find('#inlineRadio1').removeAttr('checked');
  if( $.trim(transport) === "transport-udp") 

  	modal.find('#inlineRadio2').attr('checked', 'checked');
  else 
  	modal.find('#inlineRadio1').attr('checked', 'checked');

})